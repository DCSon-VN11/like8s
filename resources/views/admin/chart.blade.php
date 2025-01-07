@include('admin/head')

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('admin/sidebar')
        <div class="flex flex-col flex-1 w-full">
            @include('admin/header')
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">

                    @if (session('success'))
                        <div class="thong-bao alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="thong-bao alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="grid gap-6 mb-4 mt-4 md:grid-cols-2">
                        <!-- Lines chart -->
                        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <h4 class="font-semibold text-gray-800 dark:text-gray-300">
                                Doanh thu tháng
                            </h4>
                            <div id="chart"></div>
                        </div>
                        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <h4 class="font-semibold text-gray-800 dark:text-gray-300">
                                Dịch vụ tháng
                            </h4>
                            <div id="chartservice"></div>
                        </div>
                    </div>

                    <script>
                        var dailyOrdersData = @json($dailyOrders);
                        var dailyTransactionsData = @json($dailyTransactions);
                        var platformOrdersData = @json($platformOrders); // Chú ý sửa lại biến dữ liệu dịch vụ
                        // Tách dữ liệu từ dailyServiceData
                        var platformNames = platformOrdersData.map(item => item.platform); // Lấy tên dịch vụ
                        var platformOrders = platformOrdersData.map(item => item.orders); // Lấy số lượng đơn hàng
                        // Lấy ngày hiện tại và tháng hiện tại
                        var today = new Date();
                        var currentMonth = today.getMonth() + 1; // Tháng (1-12)
                        var currentYear = today.getFullYear(); // Năm

                        // Hàm để lấy số ngày trong tháng
                        function getDaysInMonth(year, month) {
                            return new Date(year, month, 0).getDate(); // Lấy số ngày của tháng (1-31)
                        }

                        // Tạo danh sách các ngày từ 1 đến ngày hiện tại (hoặc từ ngày 1 đến ngày cuối cùng trong tháng hiện tại)
                        var orderDates = [];
                        var daysInCurrentMonth = getDaysInMonth(currentYear, currentMonth); // Số ngày trong tháng hiện tại
                        var lastDay = today.getDate(); // Ngày hiện tại

                        // Tạo danh sách ngày (theo định dạng "YYYY-MM-DD" cho so sánh và "MM-DD" cho hiển thị)
                        var orderDatesForComparison = []; // Dùng để so sánh (vẫn giữ đầy đủ ngày, tháng, năm)
                        var displayOrderDates = []; // Dùng để hiển thị (chỉ có ngày và tháng)

                        for (var i = 1; i <= lastDay; i++) {
                            // Tạo ngày đầy đủ "YYYY-MM-DD" cho việc so sánh
                            var fullDate = currentYear + "-" + (currentMonth < 10 ? "0" + currentMonth : currentMonth) + "-" + (i < 10 ?
                                "0" + i : i);
                            orderDatesForComparison.push(fullDate);

                            // Tạo ngày chỉ có "MM-DD" cho việc hiển thị
                            displayOrderDates.push((currentMonth < 10 ? "0" + currentMonth : currentMonth) + "-" + (i < 10 ? "0" + i : i));
                        }

                        // Chuẩn bị dữ liệu cho ApexCharts
                        var orderCounts = [];
                        var transactionAmounts = [];

                        // Duyệt qua các ngày và lấy dữ liệu, dùng ngày đầy đủ để so sánh
                        displayOrderDates.forEach(function(date, index) {
                            var order = dailyOrdersData.find(order => order.date == orderDatesForComparison[index]);
                            var transaction = dailyTransactionsData.find(transaction => transaction.date == orderDatesForComparison[
                                index]);

                            // Nếu không có dữ liệu cho ngày, gán giá trị mặc định là 0
                            orderCounts.push(order ? order.orders : 0);
                            transactionAmounts.push(transaction ? transaction.amount / 1000000 : 0); // Chuyển đổi thành triệu
                        });

                        // Biểu đồ Doanh thu tháng
                        var revenueChartOptions = {
                            chart: {
                                height: 180,
                                type: 'line',
                                toolbar: {
                                    show: false,
                                },
                            },
                            series: [{
                                    name: "Đơn hàng",
                                    data: orderCounts
                                },
                                {
                                    name: "Doanh thu",
                                    data: transactionAmounts
                                }
                            ],
                            xaxis: {
                                categories: displayOrderDates, // Hiển thị ngày dưới dạng "MM-DD"
                                title: {
                                    text: 'Ngày'
                                }
                            },
                            yaxis: [{
                                    title: {
                                        text: 'Số lượng đơn hàng'
                                    }
                                },
                                {
                                    opposite: true,
                                    title: {
                                        text: 'Doanh thu (triệu)'
                                    }
                                }
                            ],
                            grid: {
                                borderColor: "#f1f1f1",
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "center",
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "smooth",
                            }
                        };

                        // Biểu đồ Dịch vụ tháng
                        var serviceChartOptions = {
                            chart: {
                                height: 180,
                                type: 'bar',
                                toolbar: {
                                    show: false,
                                },
                            },
                            series: [{
                                name: "Số lượng đơn hàng",
                                data: platformOrders
                            }],
                            plotOptions: {
                                bar: {
                                    borderRadius: 4,
                                    borderRadiusApplication: 'end',
                                    horizontal: true,
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            xaxis: {
                                categories: platformNames, // Gắn tên dịch vụ làm nhãn trục X
                                title: {
                                    text: 'Số lượng'
                                }
                            }
                        };

                        // Khởi tạo và hiển thị biểu đồ Doanh thu
                        var revenueChart = new ApexCharts(document.querySelector("#chart"), revenueChartOptions);
                        revenueChart.render();

                        // Khởi tạo và hiển thị biểu đồ Dịch vụ
                        var serviceChart = new ApexCharts(document.querySelector("#chartservice"), serviceChartOptions);
                        serviceChart.render();
                    </script>
                    <div class="grid gap-6 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <h4 class="font-semibold text-gray-800 dark:text-gray-300">
                            Doanh thu năm
                        </h4>
                        <div id="revenueChart"></div>
                    </div>
                </div>
                <script>
                    var monthlyOrders = @json($monthlyOrders);
                    var monthlyTransactions = @json($monthlyTransactions);
                    // Tạo danh sách tháng (1 - 12)
                    var months = Array.from({
                        length: 12
                    }, (_, i) => i + 1);
                    // Chuẩn bị dữ liệu cho biểu đồ
                    var orderCount = []; // Số lượng đơn hàng theo tháng
                    var revenueAmounts = []; // Doanh thu theo tháng (tính bằng triệu)
                    months.forEach(function(month) {
                        // Tìm dữ liệu đơn hàng và doanh thu cho tháng hiện tại
                        var orderData = monthlyOrders.find(data => data.month === month);
                        var revenueData = monthlyTransactions.find(data => data.month === month);

                        // Nếu không có dữ liệu, gán giá trị mặc định là 0
                        orderCount.push(orderData ? orderData.orders : 0);
                        revenueAmounts.push(revenueData ? revenueData.amount / 1000000 : 0); // Chuyển đổi thành triệu
                    });
                    var revenueChartOptions = {
                        chart: {
                            height: 200,
                            width: '100%',
                            type: 'line',
                            toolbar: {
                                show: false,
                            },
                        },
                        series: [{
                                name: "Đơn hàng",
                                data: orderCount, // Số lượng đơn hàng theo ngày
                            },
                            {
                                name: "Doanh thu",
                                data: revenueAmounts, // Doanh thu tính bằng triệu
                            }
                        ],
                        xaxis: {
                            categories: orderDates.map(date => date.slice(5)), // Chỉ hiển thị "MM-DD"
                            title: {
                                text: 'Năm'
                            }
                        },
                        yaxis: [{
                                title: {
                                    text: 'Số lượng đơn hàng'
                                }
                            },
                            {
                                opposite: true,
                                title: {
                                    text: 'Doanh thu (triệu)'
                                }
                            }
                        ],
                        grid: {
                            borderColor: "#f1f1f1",
                        },
                        legend: {
                            position: "top",
                            horizontalAlign: "center",
                        },
                        stroke: {
                            width: [3, 3],
                            curve: "smooth",
                        }
                    };

                    // Tạo biểu đồ
                    var revenueChart = new ApexCharts(document.querySelector("#revenueChart"), revenueChartOptions);
                    revenueChart.render();
                </script>
            </main>
        </div>
    </div>
</body>
