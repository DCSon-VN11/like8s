@include('header')
@include('pagetitle', [
    'title' => 'DỊCH VỤ FACEBOOK',
    'titlesm' => 'Dịch vụ Facebook',
    'page' => 'Tăng Like bài viết',
])
<div class="dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card border-0">
                        <div class="card-body">
                            <h3 class="card-title font-size-17">Tăng Like bài viết</h3>

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
                                    <a class="nav-link " data-bs-toggle="tab" href="#profile1" role="tab"
                                        aria-selected="false" tabindex="-1">
                                        <span class="d-block d-sm-none"><i class="fas fa-tasks me-2"></i>Lịch sử</span>
                                        <span class="d-none d-sm-block font-size-16"><i
                                                class="fas fa-tasks me-2"></i>Lịch sử</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content p-3 mt-3">
                                <div class="tab-pane active" id="home1" role="tabpanel">
                                    <form action="#" method="post" id="form_buy" class="needs-validation"
                                        novalidate="">
                                        <input type="hidden" name="_token"
                                            value="EktzOLclKMV5zxUQ2RCNe2K8ucnPIy9ApOTSYL5u">
                                        <div class="row mb-sm-3">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Nhập
                                                Link hoặc Object Id</label>
                                            <div class="col-sm">
                                                <input type="text" class="form-control" name="object_id"
                                                    id="horizontal-firstname-input" required=""
                                                    placeholder="Nhập Link hoặc Object Id">
                                                <div class="invalid-feedback">
                                                    Vui lòng nhập dữ liệu.
                                                </div>
                                            </div>
                                            <label class="col-sm-auto col-form-label ps-sm-0">
                                                <div class="d-flex align-items-center">
                                                    Tạo chiến dịch
                                                    <div
                                                        class="form-check form-check-solid form-switch form-check-custom fv-row ms-2">
                                                        <input class="form-check-input w-45px h-30px" type="checkbox"
                                                            onclick="showMarketing(this)" id="allowmarketing">
                                                        <label class="form-check-label" for="allowmarketing"></label>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <script>
                                            function showMarketing(e) {
                                                if (e.checked) {
                                                    $('#group_marketing').css('display', 'block');
                                                    $('input[name="object_static"]').attr("required", '')
                                                } else {
                                                    $('#group_marketing').css('display', 'none');
                                                    $('input[name="object_static"]').removeAttr("required")
                                                }
                                            }
                                        </script>
                                        <div id="group_marketing" style="display: none">
                                            <div class="row mb-3">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-2 col-form-label">Nhập mã chiến dịch</label>
                                                <div class="col-sm-10">
                                                    <div class="row">
                                                        <div class="mb-2 col">
                                                            <input class="form-control" type="text"
                                                                name="object_static" placeholder="Nhập mã chiến dịch"
                                                                onchange="checkObjectStatic(this)"
                                                                aria-label="Nhập mã chiến dịch">
                                                        </div>
                                                        <div class="mb-2 col-auto ps-0">
                                                            <button type="button" class="w-100 btn btn-outline-danger"
                                                                onclick="showTutorial()">Hướng Dẫn
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div style="display: none" id="tutorial_marketing"
                                                        class="alert alert-info fade show mb-0" role="alert">
                                                        <p class="mb-2">Ví dụ bạn có 10 bài viết cần tạo chung 1 chiến
                                                            dịch để tăng comment hoặc like.</p>
                                                        <p class="mb-2">Và trong chiến dịch này, mỗi 1 profile chỉ
                                                            comment hoặc like 1 lần duy nhất trong tổng 10 bài viết đó.
                                                        </p>
                                                        <p class="mb-2">Để tạo chiến dịch như trên, bạn hãy nhập và
                                                            lưu 1 mã chiến dịch tùy thích, tối thiểu 10 ký tự và tối đa
                                                            32 ký tự.</p>
                                                        <p class="mb-2">Vậy khi tạo đơn, bạn chỉ cần copy mã mã chiến
                                                            dịch đã tạo và nhập chung 1 mã cho 10 bài viết cần tăng là
                                                            xong.</p>
                                                        <p class="mb-2 text-danger fw-bold">Lưu ý: Khi chọn tăng theo
                                                            chiến dịch, giá dịch vụ sẽ được tăng thêm 50%, ví dụ giá 10
                                                            xu sẽ tăng lên thành 15 xu.</p>
                                                        <p class="text-danger fw-bold mb-0">Lưu ý: Một chiến dịch kéo
                                                            dài tối đa 10 ngày, tính từ ngày bắt đầu tạo chiến dịch, sau
                                                            10 ngày có thể sẽ bị trùng profile.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            function showTutorial() {
                                                id = document.getElementById('tutorial_marketing');
                                                if (id.style.display === 'none') {
                                                    id.style.display = 'block';
                                                } else {
                                                    id.style.display = 'none';
                                                }
                                            }

                                            function checkObjectStatic(e) {
                                                if (e.value.length < 10 || e.value.length > 32) {
                                                    toastifyError("Mã chiến dịch tối thiểu 10 ký tự và tối đa 32 ký tự, vui lòng nhập lại mã chiến dịch")
                                                    return false;
                                                }
                                                return true;
                                            }
                                            const table = new DataTable('#datatable');
                                        </script>
                                        <div class="row mb-sm-3 mt-sm-4" id="group_reaction">
                                            <label class="col-sm-2 col-form-label pt-0">Loại cảm xúc (Có thể chọn nhiều
                                                cảm xúc)</label>
                                            <div class="col-sm-10">
                                                <div class="text-left">
                                                    <div class="form-check px-0">
                                                        <div class="form-check form-check-inline mb-3 ps-0">
                                                            <label class="form-check-label" for="inlineRadio1">
                                                                <input class="form-check-input reaction"
                                                                    onchange="checkCoin()" type="checkbox"
                                                                    id="inlineRadio1" name="object_type"
                                                                    value="like" checked="">
                                                                <img src="../image/like.svg" alt="image"
                                                                    class="d-block ml-2 rounded-circle"
                                                                    width="33">
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline mb-3">
                                                            <label class="form-check-label" for="inlineRadio2">
                                                                <input class="form-check-input reaction"
                                                                    onchange="checkCoin()" type="checkbox"
                                                                    id="inlineRadio2" name="object_type"
                                                                    value="care">
                                                                <img src="../image/care.svg" alt="image"
                                                                    class="d-block ml-2 rounded-circle"
                                                                    width="33">
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-check-inline mb-3">
                                                            <label class="form-check-label" for="inlineRadio3">
                                                                <input class="form-check-input reaction"
                                                                    onchange="checkCoin()" type="checkbox"
                                                                    id="inlineRadio3" name="object_type"
                                                                    value="love">
                                                                <img src="../image/love.svg" alt="image"
                                                                    class="d-block ml-2 rounded-circle"
                                                                    width="33">
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline mb-3">
                                                            <label class="form-check-label" for="inlineRadio4">
                                                                <input class="form-check-input reaction"
                                                                    onchange="checkCoin()" type="checkbox"
                                                                    id="inlineRadio4" name="object_type"
                                                                    value="haha">
                                                                <img src="../image/haha.svg" alt="image"
                                                                    class="d-block ml-2 rounded-circle"
                                                                    width="33">
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline mb-3">
                                                            <label class="form-check-label" for="inlineRadio5">
                                                                <input class="form-check-input reaction"
                                                                    onchange="checkCoin()" type="checkbox"
                                                                    id="inlineRadio5" name="object_type"
                                                                    value="wow">
                                                                <img src="../image/wow.svg" alt="image"
                                                                    class="d-block ml-2 rounded-circle"
                                                                    width="33">
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline mb-3">
                                                            <label class="form-check-label" for="inlineRadio6">
                                                                <input class="form-check-input reaction"
                                                                    onchange="checkCoin()" type="checkbox"
                                                                    id="inlineRadio6" name="object_type"
                                                                    value="sad">
                                                                <img src="../image/sad.svg" alt="image"
                                                                    class="d-block ml-2 rounded-circle"
                                                                    width="33">
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline mb-3">
                                                            <label class="form-check-label" for="inlineRadio7">
                                                                <input class="form-check-input reaction"
                                                                    onchange="checkCoin()" type="checkbox"
                                                                    id="inlineRadio7" name="object_type"
                                                                    value="angry">
                                                                <img src="../image/angry.svg" alt="image"
                                                                    class="d-block ml-2 rounded-circle"
                                                                    width="33">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-sm-4 mb-3">
                                            <label for="horizontal-firstname-input"
                                                class="col-sm-2 col-form-label mb-2 pt-0">Chọn gói cần
                                                tăng</label>
                                            <div class="col-sm-10">
                                                <div class="prices">
                                                    <div class="mx-0">
                                                        <input checked="" class="select-price" type="radio"
                                                            onchange="checkCoin()" id="control_like_svip"
                                                            name="package_type" data-price="90" value="like_svip">
                                                        <label for="control_like_svip">
                                                            <h5 class="font-size-16 fw-bold mb-1">Like siêu nhanh</h5>
                                                            <h5 class="font-size-16 fw-bold">90
                                                                xu /
                                                                like
                                                            </h5>
                                                            <p class="font-size-12 mb-0 fw-normal">
                                                                Tăng tối đa 100.000. Gói này sẽ được ưu tiên chạy tốc độ
                                                                nhanh nhất thị trường.
                                                            </p>
                                                        </label>
                                                    </div>
                                                    <div class="mx-0">
                                                        <input class="select-price" type="radio"
                                                            onchange="checkCoin()" id="control_like_vip"
                                                            name="package_type" data-price="50" value="like_vip">
                                                        <label for="control_like_vip">
                                                            <h5 class="font-size-16 fw-bold mb-1">Like nhanh</h5>
                                                            <h5 class="font-size-16 fw-bold">50
                                                                xu /
                                                                like
                                                            </h5>
                                                            <p class="font-size-12 mb-0 fw-normal">
                                                                Tăng tối đa 100.000. Gói này vẫn sẽ được ưu tiên chạy
                                                                tốc độ nhanh hơn.
                                                            </p>
                                                        </label>
                                                    </div>
                                                    <div class="mx-0">
                                                        <input class="select-price" type="radio"
                                                            onchange="checkCoin()" id="control_like_pro"
                                                            name="package_type" data-price="30" value="like_pro">
                                                        <label for="control_like_pro">
                                                            <h5 class="font-size-16 fw-bold mb-1">Like nhanh</h5>
                                                            <h5 class="font-size-16 fw-bold">30
                                                                xu /
                                                                like
                                                            </h5>
                                                            <p class="font-size-12 mb-0 fw-normal">
                                                                Tăng tối đa 100.000. Gói này vẫn sẽ được ưu tiên chạy
                                                                tốc độ nhanh hơn.
                                                            </p>
                                                        </label>
                                                    </div>
                                                    <div class="mx-0">
                                                        <input class="select-price" type="radio"
                                                            onchange="checkCoin()" id="control_like_speed"
                                                            name="package_type" data-price="20" value="like_speed">
                                                        <label for="control_like_speed">
                                                            <h5 class="font-size-16 fw-bold mb-1">Tốc độ thường</h5>
                                                            <h5 class="font-size-16 fw-bold">20
                                                                xu /
                                                                like
                                                            </h5>
                                                            <p class="font-size-12 mb-0 fw-normal">
                                                                Gói này hiện đang quá tải. Bạn hãy tạo đơn bằng các gói
                                                                dịch vụ khác để được ưu tiên và tốc độ tăng nhanh hơn
                                                                hoặc thử lại sau vài phút!
                                                            </p>
                                                        </label>
                                                    </div>
                                                    <div class="mx-0">
                                                        <input class="select-price" type="radio"
                                                            onchange="checkCoin()" id="control_like"
                                                            name="package_type" data-price="10" value="like">
                                                        <label for="control_like">
                                                            <h5 class="font-size-16 fw-bold mb-1">Tốc độ chậm</h5>
                                                            <h5 class="font-size-16 fw-bold">10
                                                                xu /
                                                                like
                                                            </h5>
                                                            <p class="font-size-12 mb-0 fw-normal">
                                                                Tăng tối đa 50.000. Gói tốc độ nhanh cũ nhưng đã chuyển
                                                                thành gói chậm hơn.
                                                            </p>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Số
                                                lượng cần tăng</label>
                                            <div class="col-sm-10">
                                                <input type="number" value="50" name="quantity" min="50"
                                                    onchange="checkCoin()" max="100000" class="form-control"
                                                    id="horizontal-firstname-input">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="horizontal-firstname-input"
                                                class="col-sm-2 col-form-label">Tùy chọn tốc độ độ tăng</label>
                                            <div class="col-sm-10">
                                                <select name="speed" class="form-control" onchange="checkCoin()">
                                                    <option value="0">Tốc độ nhanh</option>
                                                    <option value="5">5 Giây / 1 like</option>
                                                    <option value="10">10 Giây / 1 like</option>
                                                    <option value="15">15 Giây / 1 like</option>
                                                    <option value="20">20 Giây / 1 like</option>
                                                    <option value="25">25 Giây / 1 like</option>
                                                    <option value="30">30 Giây / 1 like</option>
                                                    <option value="35">35 Giây / 1 like</option>
                                                    <option value="40">40 Giây / 1 like</option>
                                                    <option value="45">45 Giây / 1 like</option>
                                                    <option value="50">50 Giây / 1 like</option>
                                                    <option value="55">55 Giây / 1 like</option>
                                                    <option value="60">60 Giây / 1 like</option>
                                                    <option value="65">65 Giây / 1 like</option>
                                                    <option value="70">70 Giây / 1 like</option>
                                                    <option value="75">75 Giây / 1 like</option>
                                                    <option value="80">80 Giây / 1 like</option>
                                                    <option value="85">85 Giây / 1 like</option>
                                                    <option value="90">90 Giây / 1 like</option>
                                                    <option value="95">95 Giây / 1 like</option>
                                                    <option value="100">100 Giây / 1 like</option>
                                                    <option value="105">105 Giây / 1 like</option>
                                                    <option value="110">110 Giây / 1 like</option>
                                                    <option value="115">115 Giây / 1 like</option>
                                                    <option value="120">120 Giây / 1 like</option>
                                                    <option value="125">125 Giây / 1 like</option>
                                                    <option value="130">130 Giây / 1 like</option>
                                                    <option value="135">135 Giây / 1 like</option>
                                                    <option value="140">140 Giây / 1 like</option>
                                                    <option value="145">145 Giây / 1 like</option>
                                                    <option value="150">150 Giây / 1 like</option>
                                                    <option value="155">155 Giây / 1 like</option>
                                                    <option value="160">160 Giây / 1 like</option>
                                                    <option value="165">165 Giây / 1 like</option>
                                                    <option value="170">170 Giây / 1 like</option>
                                                    <option value="175">175 Giây / 1 like</option>
                                                    <option value="180">180 Giây / 1 like</option>
                                                    <option value="185">185 Giây / 1 like</option>
                                                    <option value="190">190 Giây / 1 like</option>
                                                    <option value="195">195 Giây / 1 like</option>
                                                    <option value="200">200 Giây / 1 like</option>
                                                    <option value="205">205 Giây / 1 like</option>
                                                    <option value="210">210 Giây / 1 like</option>
                                                    <option value="215">215 Giây / 1 like</option>
                                                    <option value="220">220 Giây / 1 like</option>
                                                    <option value="225">225 Giây / 1 like</option>
                                                    <option value="230">230 Giây / 1 like</option>
                                                    <option value="235">235 Giây / 1 like</option>
                                                    <option value="240">240 Giây / 1 like</option>
                                                    <option value="245">245 Giây / 1 like</option>
                                                    <option value="250">250 Giây / 1 like</option>
                                                    <option value="255">255 Giây / 1 like</option>
                                                    <option value="260">260 Giây / 1 like</option>
                                                    <option value="265">265 Giây / 1 like</option>
                                                    <option value="270">270 Giây / 1 like</option>
                                                    <option value="275">275 Giây / 1 like</option>
                                                    <option value="280">280 Giây / 1 like</option>
                                                    <option value="285">285 Giây / 1 like</option>
                                                    <option value="290">290 Giây / 1 like</option>
                                                    <option value="295">295 Giây / 1 like</option>
                                                    <option value="300">300 Giây / 1 like</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="horizontal-firstname-input"
                                                class="col-sm-2 col-form-label">Ghi chú</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="notes"
                                                    onchange="checkCoin()" id="horizontal-firstname-input"
                                                    placeholder="Ghi chú về dịch vụ của bạn nếu cần">
                                            </div>
                                        </div>
                                        <input style="display: none" name="type" value="like"><input
                                            style="display: none" name="provider" value="facebook">
                                        <div class="thành blog_right_sidebar text-center mt-3">
                                            <h4 class="text-uppercase fw-bold text-success">Thanh Toán</h4>
                                            <h1 class="fw-bold text-success">
                                                <span id="txt_check_out_coin">4,500</span>
                                                Xu
                                            </h1>
                                            <h6 class="fw-bold mb-0 text-success mb-md-3 mb-0">
                                                Bạn sẽ mua <span id="txt_quantity">50</span> <span
                                                    id="ob_type_1">tương tác</span> với giá <span
                                                    id="txt_price_per">90</span>xu/1
                                                <span id="ob_type_2">tương tác</span>
                                            </h6>
                                        </div>
                                        <div class="row">
                                            <label for="horizontal-firstname-input"
                                                class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10 col-sm-10 d-grid gap-2">
                                                <button type="submit" id="btn_buy"
                                                    class="btn btn-primary font-size-16">Tạo đơn
                                                    ngay
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane show " id="profile1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="formrow-inputCity" class="form-label">Tìm
                                                    kiếm</label>
                                                <input type="text" name="key_search" class="form-control"
                                                    id="formrow-inputCity" value=""
                                                    placeholder="Tìm theo object id">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="formrow-inputState" class="form-label">Limit</label>
                                                <select name="limit" onchange="getLogsOrder()" class="form-select">
                                                    <option value="10">
                                                        10
                                                    </option>
                                                    <option value="100">
                                                        100
                                                    </option>
                                                    <option value="500">
                                                        500
                                                    </option>
                                                    <option value="1000">
                                                        1000
                                                    </option>
                                                    <option value="3000">
                                                        3000
                                                    </option>
                                                    <option value="5000">
                                                        5000
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="formrow-inputState" class="form-label">Trạng thái</label>
                                                <select onchange="getLogsOrder()" name="status" class="form-select">
                                                    <option selected="" value="0">
                                                        Tất cả
                                                    </option>
                                                    <option value="1">
                                                        Đang chạy
                                                    </option>
                                                    <option value="2">
                                                        Hoàn thành
                                                    </option>
                                                    <option value="-1">
                                                        Bị ẩn
                                                    </option>
                                                    <option value="-2">
                                                        Đã hủy
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                                            <div class="dataTables_length mb-2" id="datatable_length"><label>Show
                                                    <select name="datatable_length" aria-controls="datatable"
                                                        class="">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> entries</label></div>
                                            <div id="datatable_filter" class="dataTables_filter"><label>Search:<input
                                                        type="search" class="" placeholder=""
                                                        aria-controls="datatable"></label></div>
                                            <table id="datatable"
                                                class="table-bordered dt-responsive nowrap w-100 table-responsive dataTable no-footer"
                                                aria-describedby="datatable_info">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle sorting sorting_asc" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 24.5625px;" aria-sort="ascending"
                                                            aria-label="STT: activate to sort column descending">STT
                                                        </th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 53.4688px;"
                                                            aria-label="Thao tác: activate to sort column ascending">
                                                            Thao tác</th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 62.875px;"
                                                            aria-label="Username: activate to sort column ascending">
                                                            Username</th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 59.25px;"
                                                            aria-label="Object_id: activate to sort column ascending">
                                                            Object_id</th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 26.7344px;"
                                                            aria-label="Loại: activate to sort column ascending">Loại
                                                        </th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 54.2031px;"
                                                            aria-label="Cảm xúc: activate to sort column ascending">Cảm
                                                            xúc</th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 58.375px;"
                                                            aria-label="Số lượng: activate to sort column ascending">Số
                                                            lượng</th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 49.8438px;"
                                                            aria-label="Thất bại: activate to sort column ascending">
                                                            Thất bại</th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 47.6719px;"
                                                            aria-label="Bắt đầu: activate to sort column ascending">Bắt
                                                            đầu</th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 20.9688px;"
                                                            aria-label="Giá: activate to sort column ascending">Giá
                                                        </th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 50.5469px;"
                                                            aria-label="Tổng xu: activate to sort column ascending">
                                                            Tổng xu</th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 42.6094px;"
                                                            aria-label="Tốc độ: activate to sort column ascending">Tốc
                                                            độ</th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 49.875px;"
                                                            aria-label="Đã chạy: activate to sort column ascending">Đã
                                                            chạy</th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 62.125px;"
                                                            aria-label="Trạng thái: activate to sort column ascending">
                                                            Trạng thái</th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 49.8594px;"
                                                            aria-label="Chạy lại: activate to sort column ascending">
                                                            Chạy lại</th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 48.3906px;"
                                                            aria-label="Ghi chú: activate to sort column ascending">Ghi
                                                            chú</th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 66.4531px;"
                                                            aria-label="Chiến dịch: activate to sort column ascending">
                                                            Chiến dịch</th>
                                                        <th class="align-middle sorting" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 54.9062px;"
                                                            aria-label="Ngày tạo: activate to sort column ascending">
                                                            Ngày tạo</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="logs_order"></tbody>
                                            </table>
                                            <div class="dataTables_info" id="datatable_info" role="status"
                                                aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                id="datatable_paginate"><a class="paginate_button previous disabled"
                                                    aria-controls="datatable" aria-disabled="true" role="link"
                                                    data-dt-idx="previous" tabindex="-1"
                                                    id="datatable_previous">Previous</a><span></span><a
                                                    class="paginate_button next disabled" aria-controls="datatable"
                                                    aria-disabled="true" role="link" data-dt-idx="next"
                                                    tabindex="-1" id="datatable_next">Next</a></div>
                                        </div>
                                    </div>
                                </div>
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
