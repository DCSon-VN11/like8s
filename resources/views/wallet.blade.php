@include('header')
@include('pagetitle', [
    'title' => 'VÍ TIÈN',
    'titlesm' => 'Ví tiền',
    'page' => 'Nạp tiền',
])
<div class="dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card border-0">
                        <div class="card-body">
                            <h3 class="card-title font-size-17">Ví tiền - Nạp tiền</h3>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#home1"
                                        onclick="window.history.replaceState(null, document.title, '');
    $('#notes_logs_order').css('display','none');
    $('#notes_order_').css('display','block');
    window.history.replaceState(null, null, '?tab=order');"
                                        role="tab" aria-selected="true" tabindex="-1">
                                        <span class="d-block d-sm-none"><i
                                                class="fas fa-hand-holding-medical me-2"></i>Nạp tiền</span>
                                        <span class="d-none d-sm-block font-size-16"><i
                                                class="fas fa-hand-holding-medical me-2"></i>Nạp tiền</span>
                                    </a>
                                </li>
                                <li class="nav-item " role="presentation">
                                    <a class="nav-link "
                                        onclick="loading();getLogsOrder();window.history.replaceState(null, null, '?tab=logs');"
                                        data-bs-toggle="tab" href="#profile1" role="tab" aria-selected="false"
                                        tabindex="-1">
                                        <span class="d-block d-sm-none"><i class="fas fa-tasks me-2"></i>Lịch sử</span>
                                        <span class="d-none d-sm-block font-size-16"><i
                                                class="fas fa-tasks me-2"></i>Lịch sử</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <!-- Tab panes -->
                            <div class="tab-content p-3 mt-3">
                                <div class="tab-pane active" id="home1" role="tabpanel">
                                    <form action="{{ url('/payos/payment') }}" method="post" id="form_buy"
                                        class="needs-validation">
                                        @csrf
                                        <div class="row mb-sm-4 mb-3">
                                            <label class="col-sm-2 col-form-label mb-2 pt-0">Chọn gói cần
                                                tăng</label>
                                            <div class="col-sm-10">
                                                <div class="prices">
                                                    <div class="mx-0">
                                                        <input class="select-price" type="radio" id="control_like_10k"
                                                            name="amount" data-price="10000" value="10000" checked>
                                                        <label for="control_like_10k">
                                                            <h5 class="font-size-16 fw-bold">
                                                                10,000 VND
                                                            </h5>
                                                        </label>
                                                    </div>

                                                    <div class="mx-0">
                                                        <input class="select-price" type="radio" id="control_like_20k"
                                                            name="amount" data-price="20000" value="20000">
                                                        <label for="control_like_20k">
                                                            <h5 class="font-size-16 fw-bold">
                                                                20,000 VND
                                                            </h5>
                                                        </label>
                                                    </div>

                                                    <div class="mx-0">
                                                        <input class="select-price" type="radio" id="control_like_50k"
                                                            name="amount" data-price="50000" value="50000">
                                                        <label for="control_like_50k">
                                                            <h5 class="font-size-16 fw-bold">
                                                                50,000 VND
                                                            </h5>
                                                        </label>
                                                    </div>

                                                    <div class="mx-0">
                                                        <input class="select-price" type="radio"
                                                            id="control_like_100k" name="amount" data-price="100000"
                                                            value="100000">
                                                        <label for="control_like_100k">
                                                            <h5 class="font-size-16 fw-bold">
                                                                100,000 VND
                                                            </h5>
                                                        </label>
                                                    </div>

                                                    <div class="mx-0">
                                                        <input class="select-price" type="radio"
                                                            id="control_like_200k" name="amount" data-price="200000"
                                                            value="200000">
                                                        <label for="control_like_200k">
                                                            <h5 class="font-size-16 fw-bold">
                                                                200,000 VND
                                                            </h5>
                                                        </label>
                                                    </div>

                                                    <div class="mx-0">
                                                        <input class="select-price" type="radio"
                                                            id="control_like_500k" name="amount" data-price="500000"
                                                            value="500000">
                                                        <label for="control_like_500k">
                                                            <h5 class="font-size-16 fw-bold">
                                                                500,000 VND
                                                            </h5>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
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
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10 col-sm-10 d-grid gap-2">
                                                <button type="submit" id="btn_buy"
                                                    class="btn btn-primary font-size-16">Nạp tiền
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane show " id="profile1" role="tabpanel">
                                    <div class="table-responsive">
                                        <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                                            <table id="datatable"
                                                class="table-bordered dt-responsive nowrap w-100 table-responsive dataTable no-footer"
                                                aria-describedby="datatable_info">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Loại giao dịch</th>
                                                        <th>Số tiền</th>
                                                        <th>Ghi chú</th>
                                                        <th>Ngày tạo</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="logs_order">
                                                    @foreach ($wallettransaction as $index => $item)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $item->type }}</td>
                                                            <td>{{ number_format($item->amount, 0, ',', '.') }} VND
                                                            </td>
                                                            <td>{{ $item->description }}</td>
                                                            <td>{{ $item->created_at }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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
                <div class="col-lg-3">
                    <div class="card border-0">
                        <div class="card-body">
                            <h3 class="card-title font-size-17 text-danger">Lưu ý</h3>
                            <div class="alert alert-warning fade show" role="alert" id="notes_logs_order"
                                style="display:none;">

                                <p class="">- Đơn bị ẩn vì bạn đã tạo sai Object Id hoặc không công khai, vui
                                    lòng hủy tạo lại.</p>
                                <p class="">- Để kiểm tra Object Id đúng hay sai bạn hãy cách Click vào Object Id
                                    dưới lịch sử, nếu link ra bài
                                    viết là đúng và ngược lại là sai.</p>
                                <p class="">- Hủy đơn chỉ áp dụng khi số lượng chưa chạy còn lại &gt; 100 cho
                                    Facebook và &gt; 50 cho Instagram và
                                    được khởi tạo trong vòng 10 ngày.</p>
                                <p class="mb-0">- Khi hủy đơn bạn sẽ được hoàn lại số lượng chưa chạy sau 15 phút và
                                    trừ thêm 1.000 xu để tránh
                                    Spam.</p>
                            </div>
                            <div class="alert alert-warning fade show" role="alert" id="notes_order_">
                                <p class="">- KHÔNG hỗ trợ cho các bài viết hoặc video đang chạy ads, bài
                                    viết trong album.</p>
                                <p class="">- KHÔNG hỗ trợ các video phát trực tiếp trong group, kết thúc
                                    phát trực tiếp có thể chạy.</p>
                                <p class="">- Nghiêm cấm Buff các ID Seeding có nội dung vi phạm pháp luật,
                                    chính trị, đồ trụy... Nếu cố tình buff bạn sẽ bị khoá tài khoản, trừ hết
                                    xu và phải chịu hoàn toàn trách nhiệm trước
                                    pháp luật.
                                </p>
                                <p class="">- Website sử dụn các tài khoản 100% các tài khoản Tên Việt và
                                    có Avatar để tăng tương tác.</p>
                                <p class="">- Các tài khoản facebook đã làm Job của bạn sẽ tương tác ngẫu
                                    nhiên với các dịch vụ đã tăng (dịch vụ có tương tác).</p>
                                <p class="">- Tốc độ tăng cực nhanh, từ 20h - 8h sáng ngày hôm sau tốc độ sẽ
                                    chậm hơn để các tài khoản nghỉ ngơi.</p>
                                <p class="">- Một id chỉ được phép tạo tối đa 50 lần để tránh Spam hệ
                                    thống.</p>
                                <p class="">- Website chạy tương tác chéo giữa các User và auto nên sẽ có
                                    tỉ lệ tụt nhất định, hãy tăng dư để đảm bảo đủ số lượng cho khách
                                    hàng.</p>
                                <p class="">- Trong 3 ngày, nếu tài khoản bị checkpoint thì auto sẽ tự
                                    động chạy lại số lượng bị checkpoint cho các job đó để hạn chế tỷ lệ tụt
                                    (không phải bảo hành).</p>
                                <p class="text-danger fw-bold mb-0">- Không bảo hành tất cả các dịch vụ, khi
                                    lấy sai link hoặc id, không công khai hoặc id không tồn tại.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
