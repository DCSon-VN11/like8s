@include('header')
@include('pagetitle', [
    'title' => 'DỊCH VỤ TIKTOK',
    'titlesm' => 'Dịch vụ Tiktok',
    'page' => 'Tăng Like bài viết',
])
<div class="dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card border-0">
                        <div class="card-body">
                            <h3 class="card-title font-size-17">Tăng tim bài viết Tiktok</h3>

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
                                                class="fas fa-hand-holding-medical me-2"></i>Tạo đơn</span>
                                        <span class="d-none d-sm-block font-size-16"><i
                                                class="fas fa-hand-holding-medical me-2"></i>Tạo đơn</span>
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
                                    <form action="{{ route('order') }}" method="post" id="form_buy"
                                        class="needs-validation">
                                        @csrf
                                        <div class="row mb-sm-3">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Nhập
                                                Link hoặc Object Id</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control" name="object_id"
                                                    id="horizontal-firstname-input"
                                                    placeholder="Nhập Link hoặc Object Id" required>
                                            </div>
                                        </div>
                                        <div class="row mb-sm-4 mb-3">
                                            <label class="col-sm-2 col-form-label mb-2 pt-0">Chọn gói cần
                                                tăng</label>
                                            <div class="col-sm-10">
                                                <div class="prices">
                                                    @foreach ($service as $item)
                                                        <div class="mx-0">
                                                            <input class="select-price" type="radio"
                                                                id="control_like_{{ $item->id }}"
                                                                name="package_type" data-price="{{ $item->price }}"
                                                                value="{{ $item->id }}"
                                                                {{ $item->state == 0 ? 'disabled' : '' }}>
                                                            <label for="control_like_{{ $item->id }}">
                                                                <h5 class="font-size-16 fw-bold mb-1">
                                                                    {{ $item->name }}</h5>
                                                                <h5 class="font-size-16 fw-bold">
                                                                    {{ number_format($item->price, 0, ',', '.') }}
                                                                    VND /
                                                                    {{ $item->servicetype->name }}
                                                                </h5>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Số
                                                lượng cần tăng</label>
                                            <div class="col-sm-10">
                                                <input type="number" value="50" name="quantity" min="50"
                                                    max="100000" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Ghi
                                                chú</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="notes"
                                                    placeholder="Ghi chú về dịch vụ của bạn nếu cần">
                                            </div>
                                        </div>
                                        <div class="thành blog_right_sidebar text-center mt-3 text-success">
                                            <h4 class="text-uppercase fw-bold">Thanh Toán</h4>
                                            <h1 class="fw-bold">
                                                <span id="txt_check_out_coin"></span>
                                                VND
                                            </h1>
                                            <h6 class="fw-bold mb-0 mb-md-3 mb-0">
                                                Bạn sẽ mua <span id="txt_quantity"> </span> <span id="ob_type_1">tương
                                                    tác</span> với giá <span id="txt_price_per"></span>VND/
                                                <span id="ob_type_2">tương tác</span>
                                            </h6>
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
                                                    class="btn btn-primary font-size-16">Tạo đơn
                                                    ngay
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        // Lấy các phần tử liên quan
                                        const $quantityInput = $('input[name="quantity"]');
                                        const $packageInputs = $('input[name="package_type"]');
                                        const $reactionInputs = $('input.reaction');
                                        const $txtCheckOutCoin = $('#txt_check_out_coin');
                                        const $txtQuantity = $('#txt_quantity');
                                        const $txtPricePer = $('#txt_price_per');
                                        const $paymentSection = $('.blog_right_sidebar');
                                        const $btnBuy = $('#btn_buy');
                                        const $paymentTitle = $('h4.text-uppercase');
                                        // Số dư ví từ server
                                        const walletBalance = parseInt('{{ $wallet->balance }}')
                                        // Hàm cập nhật nội dung
                                        function updateSummary() {
                                            const $selectedPackage = $packageInputs.filter(':checked'); // Gói được chọn
                                            const quantity = parseInt($quantityInput.val()) || 0;
                                            if ($selectedPackage.length > 0) {
                                                const pricePerInteraction = parseInt($selectedPackage.data('price')) || 0;

                                                // Tính tổng giá trị
                                                const totalPrice = pricePerInteraction * quantity;

                                                // Cập nhật nội dung
                                                $txtCheckOutCoin.text(totalPrice.toLocaleString('vi-VN'));
                                                $txtQuantity.text(quantity);
                                                $txtPricePer.text(pricePerInteraction.toLocaleString('vi-VN'));
                                                // Kiểm tra số dư ví
                                                if (totalPrice > walletBalance) {
                                                    $paymentSection.removeClass('text-success').addClass('text-danger');
                                                    $btnBuy.prop('disabled', true); // Vô hiệu hóa nút
                                                    $paymentTitle.text('Số dư trong ví của bạn không đủ'); // Cập nhật tiêu đề
                                                } else {
                                                    $paymentSection.removeClass('text-danger').addClass('text-success');
                                                    $btnBuy.prop('disabled', false); // Bật nút
                                                    $paymentTitle.text('Thanh Toán'); // Đặt lại tiêu đề ban đầu
                                                }
                                            }
                                        }

                                        // Đặt mặc định gói dịch vụ đầu tiên và loại cảm xúc đầu tiên
                                        if ($packageInputs.length > 0) {
                                            $packageInputs.first().prop('checked', true);
                                        }
                                        if ($reactionInputs.length > 0) {
                                            $reactionInputs.first().prop('checked', true);
                                        }

                                        // Sự kiện thay đổi số lượng
                                        $quantityInput.on('input', updateSummary);

                                        // Sự kiện thay đổi gói dịch vụ
                                        $packageInputs.on('change', updateSummary);

                                        // Cập nhật ban đầu
                                        updateSummary();
                                    });
                                </script>
                                <div class="tab-pane show " id="profile1" role="tabpanel">
                                    <div class="table-responsive">
                                        <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                                            <table id="datatable"
                                                class="table-bordered dt-responsive nowrap w-100 table-responsive dataTable no-footer"
                                                aria-describedby="datatable_info">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Object Id</th>
                                                        <th>Gói dịch vụ</th>
                                                        <th>Số lượng</th>
                                                        <th>Giá</th>
                                                        <th>Trạng thái</th>
                                                        <th>Ghi chú</th>
                                                        <th>Ngày tạo</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="logs_order">
                                                    @foreach ($orders as $index => $order)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $order->object_id }}</td>
                                                            <td>{{ $order->service->name }}</td>
                                                            <td>{{ $order->amount }}</td>
                                                            <td>{{ number_format($order->money, 0, ',', '.') }} VND
                                                            </td>
                                                            <td>{{ $order->state }}</td>
                                                            <td>{{ $order->note }}</td>
                                                            <td>{{ $order->created_at }}</td>
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
                                style="display: none;">

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
                            <div class="alert alert-warning fade show" role="alert" id="notes_order_"
                                style="display: block;">
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
