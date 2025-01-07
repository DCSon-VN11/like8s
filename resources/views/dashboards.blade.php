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
                            <h5 class="font-size-15 text-truncate">{{ $account->username }}</h5>
                            <p class="text-muted mb-0 text-truncate">{{ $account->role }}</p>
                        </div>
                        <div class="col-sm-9">
                            <div class="row pt-sm-3">
                                <div class="col-sm-12 pt-2 font-size-18">
                                    <p class="text-muted mb-2">Ví tiền</p>
                                    <h4 class="mb-0" id="refund_today">
                                        {{ number_format($wallet->balance, 0, ',', '.') }} VNĐ</h4>
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
                                <h4 class="font-size-16 mb-3">Facebook</h4>
                                <p class="text-muted" id="total_order_fb_today">{{ $facebookOrdersToday }} đơn</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="text-center mt-3">
                                <div class="avatar-sm mx-auto mb-3">
                                    <span class="avatar-title rounded-circle bg-pink" style="font-size: 24px">
                                        <i class="fa-brands fa-instagram text-white"></i>
                                    </span>
                                </div>
                                <h4 class="font-size-16 mb-3">Instagram</h4>
                                <p class="text-muted" id="total_order_ig_today">{{ $instagramOrdersToday }} đơn</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="text-center mt-3">
                                <div class="avatar-sm mx-auto mb-3">
                                    <span class="avatar-title rounded-circle bg-black" style="font-size: 24px">
                                        <i class="fa-brands fa-tiktok text-white"></i>
                                    </span>
                                </div>
                                <h4 class="font-size-16 mb-3">Tiktok</h4>
                                <p class="text-muted" id="total_order_tt_today">{{ $tiktokOrdersToday }} đơn</p>
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
                                    <h4 class="mb-0" id="used_today">
                                        {{ number_format($totalAmountToday, 0, ',', '.') }} VNĐ </h4>
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
                                    <h4 class="mb-0" id="used_month">
                                        {{ number_format($totalAmountThisMonth, 0, ',', '.') }} VNĐ</h4>
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
                                    <h4 class="mb-0" id="paid_month">
                                        {{ number_format($totalDepositThisMonth, 0, ',', '.') }} VNĐ</h4>
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
                        <div class="ms-auto d-flex align-items-center">
                            <form method="GET" action="{{ route('dashboard') }}" class="d-flex align-items-center">
                                <!-- Input chọn ngày bắt đầu -->
                                <div class="me-3 d-flex align-items-center">
                                    <label for="start_date">Từ:</label>
                                    <input class="form-control ms-2" type="date" id="start_date"
                                        name="start_date" value="{{ request('start_date', $startDate ?? '') }}">
                                </div>
                                <!-- Input chọn ngày kết thúc -->
                                <div class="me-3 d-flex align-items-center">
                                    <label for="end_date">Đến:</label>
                                    <input class="form-control ms-2" type="date" id="end_date" name="end_date"
                                        value="{{ request('end_date', $endDate ?? '') }}">
                                </div>
                                <!-- Nút lọc -->
                                <button class="btn btn-primary" type="submit">Lọc</button>
                            </form>
                        </div>
                    </div>
                    @if (session('warning'))
                        <div class="thong-bao alert alert-warning mt-3" id="alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const alertWarning = document.getElementById('alert-warning');
                            if (alertWarning) {
                                setTimeout(() => {
                                    alertWarning.style.transition = 'opacity 0.5s';
                                    alertWarning.style.opacity = '0';
                                    setTimeout(() => alertWarning.remove(), 500); // Xóa khỏi DOM sau khi ẩn
                                }, 2000); // 2 giây
                            }
                        });
                    </script>

                    <!-- Biểu đồ -->
                    <div id="chart"></div>
                    <div class="text-center mt-2">
                        <label class="mb-0 px-1 text-primary" id="time_total_used">
                            Dịch vụ đã sử dụng: {{ $totalServicesUsed }}</label>
                        <label class="mb-0 px-1 text-success" id="time_total_pay">
                            Đã nạp: {{ number_format($totalDeposited, 0, ',', '.') }} VNĐ</label>
                        <label class="mb-0 px-1 text-warning" id="time_total_refund">
                            Đã tiêu phí: {{ number_format($totalSpent, 0, ',', '.') }} VNĐ</label>
                    </div>

                </div>
            </div>
        </div>
        <script>
            var options = {
                series: [{
                        name: "Dịch vụ đã sử dụng",
                        data: @json($chartData['services_used'] ?? []),
                    },
                    {
                        name: "Tiền đã nạp",
                        data: @json($chartData['total_deposited'] ?? []),
                    },
                    {
                        name: "Tiền đã tiêu phí",
                        data: @json($chartData['total_spent'] ?? []),
                    },
                ],
                chart: {
                    height: 350,
                    type: "line",
                    toolbar: {
                        show: false,
                    },
                },
                stroke: {
                    width: [3, 3, 3],
                    curve: "smooth",
                },
                xaxis: {
                    categories: @json($chartData['categories'] ?? []),
                },
                grid: {
                    borderColor: "#f1f1f1",
                },
                legend: {
                    position: "top",
                    horizontalAlign: "center",
                },
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
                            <table class="table align-middle table-nowrap mb-0 text-center">
                                <thead class="table-light font-size-15">
                                    <tr>
                                        <th class="align-middle">Nền tảng</th>
                                        <th class="align-middle">Kiểu Dịch vụ</th>
                                        <th class="align-middle">Số đơn</th>
                                        <th class="align-middle">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody id="service_today">
                                    @forelse ($servicesToday as $service)
                                        <tr>
                                            <td>{{ $service['platform'] }}</td>
                                            <td>{{ $service['serviceType'] }}</td>
                                            <td>{{ $service['orderCount'] }}</td>
                                            <td>{{ number_format($service['totalAmount'], 0, ',', '.') }} VND</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-body">Không có dữ liệu</td>
                                        </tr>
                                    @endforelse
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
