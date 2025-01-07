@include('header')
@include('pagetitle', [
    'title' => 'NHẬT KÝ HOẠT ĐỘNG',
    'titlesm' => 'Dashboards',
    'page' => 'Nhật ký hoạt động',
])
<div class="dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                            <!-- Bảng dữ liệu -->
                            <table id="datatable" class="table table-bordered nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Dịch vụ</th>
                                        <th>Số tiền</th>
                                        <th>Ghi chú</th>
                                        <th>Ngày tạo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($sortedData as $index => $order)
                                        <tr>
                                            @if ($order['type'] == '-')
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $order['name'] }}</td>
                                                <td class="text-danger">
                                                    {{ number_format($order['amount'], 0, ',', '.') }} VND</td>
                                                <td>{{ $order['notes'] }}</td>
                                                <td>{{ $order['created_at'] }}</td>
                                            @else
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $order['name'] }}</td>
                                                <td class="text-success">
                                                    {{ number_format($order['amount'], 0, ',', '.') }} VND</td>
                                                <td>{{ $order['notes'] }}</td>
                                                <td>{{ $order['created_at'] }}</td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-body">Không có dữ liệu</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#datatable').DataTable({
                                pageLength: 10, // Số bản ghi hiển thị mặc định
                                lengthMenu: [10, 25, 50, 100], // Các tùy chọn số bản ghi
                                language: {
                                    search: "Tìm kiếm:",
                                    lengthMenu: "Hiển thị _MENU_ bản ghi",
                                    info: "Hiển thị _START_ đến _END_ của _TOTAL_ bản ghi",
                                    paginate: {
                                        previous: "Trước",
                                        next: "Tiếp"
                                    },
                                    emptyTable: "Không có dữ liệu"
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
