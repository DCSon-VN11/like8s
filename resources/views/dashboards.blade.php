@include('header')
@include('pagetitle', ['title' => 'DASHBOARDS', 'titlesm' => 'Dashboards', 'page' => 'Home'])
<div class="dashboard">
    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden border-0">
                <div class="bg-primary-subtle">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p>TLC Dashboard</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="../image/profile-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="avatar-md profile-user-wid mb-sm-3 mb-2" style="margin-top:-25px;">
                                <img src="..//image/logo.svg" alt="" class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-truncate">cson</h5>
                            <p class="text-muted mb-0 text-truncate">user</p>
                        </div>
                        <div class="col-sm-9">
                            <div class="row pt-sm-3">
                                <div class="col-sm-6 pt-2">
                                    <p class="text-muted mb-2">Số dư</p>
                                    <h4 class="mb-0 text">0</h4>
                                </div>
                                <div class="col-sm-6 pt-2">
                                    <p class="text-muted mb-2">Đã hoàn hôm nay</p>
                                    <h4 class="mb-0" id="refund_today">0</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-0 my-3">
                <div class="card-body">
                    <h4 class="card-title mb-4" style="font-size: 15px" id="text_order_today">Sử dụng hôm nay</h4>
                    <div class="row mt-4">
                        <div class="col-md-4 col-12">
                            <div class="text-center mt-3">
                                <div class="avatar-sm mx-auto mb-3">
                                    <span class="avatar-title rounded-circle bg-primary" style="font-size: 24px">
                                        <i class="fa-brands fa-facebook text-white"></i>
                                    </span>
                                </div>
                                <h4 class="font-size-18 mb-3">Facebook</h4>
                                <p class="text-muted" id="total_order_fb_today">0 đơn</p>
                                <p class="text-muted mb-0" id="total_coin_fb_today">0 xu</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="text-center mt-3">
                                <div class="avatar-sm mx-auto mb-3">
                                    <span class="avatar-title rounded-circle bg-pink" style="font-size: 24px">
                                        <i class="fa-brands fa-instagram text-white"></i>
                                    </span>
                                </div>
                                <h4 class="font-size-18 mb-3">Instagram</h4>
                                <p class="text-muted" id="total_order_ig_today">0 đơn</p>
                                <p class="text-muted mb-0" id="total_coin_ig_today">0 xu</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="text-center mt-3">
                                <div class="avatar-sm mx-auto mb-3">
                                    <span class="avatar-title rounded-circle bg-black" style="font-size: 24px">
                                        <i class="fa-brands fa-tiktok text-white"></i>
                                    </span>
                                </div>
                                <h4 class="font-size-18 mb-3">Tiktok</h4>
                                <p class="text-muted" id="total_order_tt_today">0 đơn</p>
                                <p class="text-muted mb-0" id="total_coin_tt_today">0 xu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid border-0">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium" id="text_used_today">Sử dụng hôm nay</p>
                                    <h4 class="mb-0" id="used_today">0</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="fas fa-dollar-sign font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid border-0">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Sử dụng tháng</p>
                                    <h4 class="mb-0" id="used_month">0</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="far fa-chart-bar font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid border-0">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Tổng nạp tháng</p>
                                    <h4 class="mb-0" id="paid_month">0</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="fab fa-amazon-pay font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-0">
                <div class="card-body">
                    <div class="d-sm-flex flex-wrap">
                        <h4 class="card-title mt-1">Thống kê sử dụng</h4>
                        <div class="ms-auto">
                            <a class="form-check form-switch">
                                <input class="form-check-input mt-2" onchange="switchChart(&quot;bar&quot;)"
                                    type="checkbox" checked="" id="flexSwitchCheckChecked">
                                <span class="form-check-label" for="flexSwitchCheckChecked">
                                    <input class="daterange" type="text" name="daterange"
                                        value="01/01/2018 - 01/15/2018">
                                </span>
                            </a>
                        </div>
                    </div>
                    <div id="chart"></div>
                    <div class="text-center mt-2">
                        <label class="mb-0 px-1 text-primary" id="time_total_used">Sử dụng: 0</label>
                        <label class="mb-0 px-1 text-success" id="time_total_pay">Đã nạp: 0</label>
                        <label class="mb-0 px-1 text-warning" id="time_total_refund">Đã hoàn: 0</label>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var options = {
                series: [{
                        name: "Session Duration",
                        data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
                    },
                    {
                        name: "Page Views",
                        data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
                    },
                    {
                        name: "Total Visits",
                        data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
                    }
                ],
                chart: {
                    height: 350,
                    type: "line",
                    toolbar: {
                        show: false // Ẩn toolbar
                    }
                },
                stroke: {
                    width: [3, 3, 3], // Độ dày của đường
                    curve: "smooth", // Làm cho đường cong mượt
                    dashArray: [0, 0, 0] // Loại bỏ nét đứt
                },
                legend: {
                    position: "top", // Hiển thị legend ở trên
                    horizontalAlign: "center",
                    markers: {
                        width: 12,
                        height: 12,
                        radius: 12 // Hình tròn trong legend
                    },
                    itemMargin: {
                        horizontal: 10,
                        vertical: 5
                    }
                },
                markers: {
                    size: 0 // Loại bỏ dấu chấm trên đường
                },
                dataLabels: {
                    enabled: false // Tắt nhãn dữ liệu
                },
                xaxis: {
                    categories: [
                        "01 Jan", "02 Jan", "03 Jan", "04 Jan", "05 Jan", "06 Jan",
                        "07 Jan", "08 Jan", "09 Jan", "10 Jan", "11 Jan", "12 Jan"
                    ]
                },
                grid: {
                    borderColor: "#f1f1f1"
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        </script>
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-0">
                    <div class="card-body">
                        <h4 class="card-title mb-4 font-size-15 fw-bold" id="text_service_today">Sử dụng hôm nay</h4>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light font-size-15">
                                    <tr>
                                        <th class="align-middle">Nền tảng</th>
                                        <th class="align-middle">Dịch vụ</th>
                                        <th class="align-middle">Số đơn</th>
                                        <th class="align-middle">Số lượng</th>
                                        <th class="align-middle">Số Xu</th>
                                    </tr>
                                </thead>
                                <tbody id="service_today">
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">FACEBOOK</a>
                                        </td>
                                        <td>like</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">FACEBOOK</a>
                                        </td>
                                        <td>love</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">FACEBOOK</a>
                                        </td>
                                        <td>care</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">FACEBOOK</a>
                                        </td>
                                        <td>haha</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">FACEBOOK</a>
                                        </td>
                                        <td>wow</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">FACEBOOK</a>
                                        </td>
                                        <td>sad</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">FACEBOOK</a>
                                        </td>
                                        <td>angry</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">FACEBOOK</a>
                                        </td>
                                        <td>follow</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">FACEBOOK</a>
                                        </td>
                                        <td>like_page</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">FACEBOOK</a>
                                        </td>
                                        <td>share</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">FACEBOOK</a>
                                        </td>
                                        <td>like_comment</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">FACEBOOK</a>
                                        </td>
                                        <td>join_group</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">INSTAGRAM</a>
                                        </td>
                                        <td>like</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">INSTAGRAM</a>
                                        </td>
                                        <td>follow</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">INSTAGRAM</a>
                                        </td>
                                        <td>vip_like</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">TIKTOK</a>
                                        </td>
                                        <td>like</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">TIKTOK</a>
                                        </td>
                                        <td>follow</td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            0
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
