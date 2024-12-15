@include('header')
@include('pagetitle', [
    'title' => 'DỊCH VỤ INSTAGRAM',
    'titlesm' => 'Dịch vụ Instagram',
    'page' => 'Tăng Vip Like',
])
<div class="dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card border-0">
                        <div class="card-body">
                            <h3 class="card-title font-size-17">Vip Like Instagram</h3>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#home1"
                                        onclick="window.history.replaceState(null, document.title, '');
$('#notes_logs_order').css('display','none');
$('#notes_order_').css('display','block');
window.history.replaceState(null, null, '?tab=order');"
                                        role="tab" aria-selected="true">
                                        <span class="d-block d-sm-none"><i
                                                class="fas fa-hand-holding-medical me-2"></i>Tạo đơn</span>
                                        <span class="d-none d-sm-block font-size-16"><i
                                                class="fas fa-hand-holding-medical me-2"></i>Tạo đơn</span>
                                    </a>
                                </li>
                                <li class="nav-item " role="presentation">
                                    <a class="nav-link"
                                        onclick="loading();getLogsOrder();window.history.replaceState(null, null, '?tab=logs');"
                                        data-bs-toggle="tab" href="#profile1" role="tab" aria-selected="false"
                                        tabindex="-1">
                                        <span class="d-block d-sm-none"><i class="fas fa-tasks me-2"></i>Lịch sử</span>
                                        <span class="d-none d-sm-block font-size-16"><i
                                                class="fas fa-tasks me-2"></i>Lịch sử</span>
                                    </a>
                                </li>
                                <li class="nav-item " role="presentation">
                                    <a class="nav-link"
                                        onclick="loading();getLogsRunVip();window.history.replaceState(null, null, '?tab=run');"
                                        data-bs-toggle="tab" href="#profile2" role="tab" aria-selected="false"
                                        tabindex="-1">
                                        <span class="d-block d-sm-none"><i class="fas fa-list-ol me-2"></i>Nhật
                                            ký</span>
                                        <span class="d-none d-sm-block font-size-16"><i
                                                class="fas fa-list-ol me-2"></i>Nhật ký</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content p-3 mt-3">
                                <div class="tab-pane active show" id="home1" role="tabpanel">
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
                                        <input style="display: none" name="type" value="like"><input
                                            style="display: none" name="provider" value="instagram">
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input"
                                                class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Số lượng like
                                                                nhỏ nhất cần tăng</label>
                                                            <input onchange="checkCoin()" name="min_like" id="min_like"
                                                                type="number" value="40" min="10"
                                                                max="20000" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Số lượng like
                                                                lớn nhất cần tăng</label>
                                                            <input onchange="checkCoin()" name="max_like"
                                                                id="max_like" type="number" value="50"
                                                                min="50" max="20000" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input"
                                                class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Số lượng bài
                                                                viết 1 ngày</label>
                                                            <input onchange="checkCoin()" name="max_post"
                                                                id="max_post" type="number" value="2"
                                                                min="2" max="20000" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Số ngày cần
                                                                mua VIP</label>
                                                            <input onchange="checkCoin()" name="max_days"
                                                                id="max_days" type="number" value="7"
                                                                min="0" max="20000" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input"
                                                class="col-sm-2 col-form-label">Tùy chọn tốc độ độ
                                                tăng</label>
                                            <div class="col-sm-10">
                                                <select name="speed" onchange="checkCoin()" class="form-control">
                                                    <option value="0">Tốc độ nhanh</option>
                                                    <option value="5">5 Giây / 1 Like</option>
                                                    <option value="10">10 Giây / 1 Like</option>
                                                    <option value="15">15 Giây / 1 Like</option>
                                                    <option value="20">20 Giây / 1 Like</option>
                                                    <option value="25">25 Giây / 1 Like</option>
                                                    <option value="30">30 Giây / 1 Like</option>
                                                    <option value="35">35 Giây / 1 Like</option>
                                                    <option value="40">40 Giây / 1 Like</option>
                                                    <option value="45">45 Giây / 1 Like</option>
                                                    <option value="50">50 Giây / 1 Like</option>
                                                    <option value="55">55 Giây / 1 Like</option>
                                                    <option value="60">60 Giây / 1 Like</option>
                                                    <option value="70">70 Giây / 1 Like</option>
                                                    <option value="80">80 Giây / 1 Like</option>
                                                    <option value="90">90 Giây / 1 Like</option>
                                                    <option value="100">100 Giây / 1 Like</option>
                                                    <option value="120">120 Giây / 1 Like</option>
                                                    <option value="180">180 Giây / 1 Like</option>
                                                    <option value="240">240 Giây / 1 Like</option>
                                                    <option value="300">300 Giây / 1 Like</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input"
                                                class="col-sm-2 col-form-label">Ghi chú</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"
                                                    id="horizontal-firstname-input"
                                                    placeholder="Ghi chú về dịch vụ của bạn nếu cần">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input"
                                                class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <div class="alert alert-success fade show" role="alert">
                                                    <h6 class="font-weight-bold text-success text-center mb-0">
                                                        Tổng Xu = (Giá Xu
                                                        order mỗi like) x (Số lượng like lớn nhất mỗi bài) x
                                                        (Số lượng bài trong
                                                        ngày) x (Số ngày đăng ký vip)</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="thành blog_right_sidebar text-center mt-3">
                                            <h4 class="text-uppercase fw-bold text-success">Thanh Toán</h4>
                                            <h1 class="fw-bold text-success">
                                                <span id="txt_check_out_coin">7,000</span>
                                                Xu
                                            </h1>
                                            <h6 class="fw-bold mb-0 text-success mb-md-3 mb-0">
                                                Bạn sẽ mua <span id="txt_quantity">50</span> <span
                                                    id="ob_type_1">like</span> với giá <span
                                                    id="txt_price_per">10</span>xu/1
                                                <span id="ob_type_2">like</span>
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
                                <div class="tab-pane" id="profile1" role="tabpanel">
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
                                            <div class="dataTables_length mb-2" id="datatable_length"><label>Show <select
                                                        name="datatable_length" aria-controls="datatable"
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
                                                        <th class="sorting sorting_asc" tabindex="0"
                                                            aria-controls="datatable" rowspan="1" colspan="1"
                                                            style="width: 9.375px;" aria-sort="ascending"
                                                            aria-label="#: activate to sort column descending">#</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: 58.4688px;"
                                                            aria-label="Thao tác: activate to sort column ascending">
                                                            Thao tác</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: 69.8125px;"
                                                            aria-label="Username: activate to sort column ascending">
                                                            Username</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: 62.4375px;"
                                                            aria-label="Object Id: activate to sort column ascending">
                                                            Object Id</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: 57.1875px;"
                                                            aria-label="Min Like: activate to sort column ascending">
                                                            Min Like</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: 60.0469px;"
                                                            aria-label="Max Like: activate to sort column ascending">
                                                            Max Like</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: 62.2969px;"
                                                            aria-label="Max Post: activate to sort column ascending">
                                                            Max Post</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: 54.3125px;"
                                                            aria-label="Số ngày: activate to sort column ascending">Số
                                                            ngày</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: 21.9688px;"
                                                            aria-label="Giá: activate to sort column ascending">Giá
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: 54.9062px;"
                                                            aria-label="Tổng xu: activate to sort column ascending">
                                                            Tổng xu</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: 56.9062px;"
                                                            aria-label="Khởi tạo: activate to sort column ascending">
                                                            Khởi tạo</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: 54.0312px;"
                                                            aria-label="Hết hạn: activate to sort column ascending">Hết
                                                            hạn</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: 45.4375px;"
                                                            aria-label="Tốc độ: activate to sort column ascending">Tốc
                                                            độ</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: 55.0312px;"
                                                            aria-label="Đã chạy: activate to sort column ascending">Đã
                                                            chạy</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: 69.8906px;"
                                                            aria-label="Trạng thái: activate to sort column ascending">
                                                            Trạng thái</th>
                                                        <th class="sorting" tabindex="0" aria-controls="datatable"
                                                            rowspan="1" colspan="1" style="width: 52.1562px;"
                                                            aria-label="Ghi chú: activate to sort column ascending">Ghi
                                                            chú</th>
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
                                <div class="tab-pane" id="profile2" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="formrow-inputCity" class="form-label">Tìm
                                                    kiếm</label>
                                                <input type="text" name="key_search_run" class="form-control"
                                                    id="formrow-inputCity" value=""
                                                    placeholder="Tìm theo object id">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="formrow-inputState" class="form-label">Limit</label>
                                                <select name="limit_run" onchange="getLogsRunVip()"
                                                    class="form-select">
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
                                    </div>
                                    <div class="table-responsive">
                                        <div id="datatable_run_vip_wrapper" class="dataTables_wrapper no-footer">
                                            <div class="dataTables_length mb-2" id="datatable_run_vip_length"><label>Show
                                                    <select name="datatable_run_vip_length"
                                                        aria-controls="datatable_run_vip" class="">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> entries</label></div>
                                            <div id="datatable_run_vip_filter" class="dataTables_filter">
                                                <label>Search:<input type="search" class="" placeholder=""
                                                        aria-controls="datatable_run_vip"></label></div>
                                            <table id="datatable_run_vip"
                                                class="table-bordered dt-responsive nowrap w-100 table-responsive dataTable no-footer"
                                                aria-describedby="datatable_run_vip_info">
                                                <thead>
                                                    <tr>
                                                        <th class="sorting sorting_asc" tabindex="0"
                                                            aria-controls="datatable_run_vip" rowspan="1"
                                                            colspan="1" style="width: 9.45312px;"
                                                            aria-sort="ascending"
                                                            aria-label="#: activate to sort column descending">#</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable_run_vip" rowspan="1"
                                                            colspan="1" style="width: 68.6719px;"
                                                            aria-label="username: activate to sort column ascending">
                                                            username</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable_run_vip" rowspan="1"
                                                            colspan="1" style="width: 62.6094px;"
                                                            aria-label="Object Id: activate to sort column ascending">
                                                            Object Id</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable_run_vip" rowspan="1"
                                                            colspan="1" style="width: 76.8438px;"
                                                            aria-label="Object Run: activate to sort column ascending">
                                                            Object Run</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable_run_vip" rowspan="1"
                                                            colspan="1" style="width: 60.3438px;"
                                                            aria-label="Số lượng: activate to sort column ascending">Số
                                                            lượng</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable_run_vip" rowspan="1"
                                                            colspan="1" style="width: 55.1875px;"
                                                            aria-label="Đã chạy: activate to sort column ascending">Đã
                                                            chạy</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable_run_vip" rowspan="1"
                                                            colspan="1" style="width: 45.5781px;"
                                                            aria-label="Tốc độ: activate to sort column ascending">Tốc
                                                            độ</th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable_run_vip" rowspan="1"
                                                            colspan="1" style="width: 57.125px;"
                                                            aria-label="Khởi tạo: activate to sort column ascending">
                                                            Khởi tạo</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="logs_run_vip">
                                                    <tr class="odd">
                                                        <td valign="top" colspan="8" class="dataTables_empty">No
                                                            data available in table</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="dataTables_info" id="datatable_run_vip_info" role="status"
                                                aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                id="datatable_run_vip_paginate"><a
                                                    class="paginate_button previous disabled"
                                                    aria-controls="datatable_run_vip" aria-disabled="true"
                                                    role="link" data-dt-idx="previous" tabindex="-1"
                                                    id="datatable_run_vip_previous">Previous</a><span></span><a
                                                    class="paginate_button next disabled"
                                                    aria-controls="datatable_run_vip" aria-disabled="true"
                                                    role="link" data-dt-idx="next" tabindex="-1"
                                                    id="datatable_run_vip_next">Next</a></div>
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
