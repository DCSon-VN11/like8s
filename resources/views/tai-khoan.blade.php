@include('header')
@include('pagetitle', [
    'title' => 'TÀI KHOẢN',
    'titlesm' => 'Tài khoản',
    'page' => 'Liên hệ',
])
<div class="dashboard">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
            <div class="card border-0">
                <div class="card-header bg-light border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details" aria-expanded="true"
                    aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h4 class="fw-bold m-0">Thông tin tài khoản</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <div class="text-center mb-4">
                            <div class="position-relative d-inline-block">
                                <div class="position-absolute bottom-0 end-0">
                                    <label for="member-image-input" class="mb-0" data-bs-toggle="tooltip"
                                        data-bs-placement="right" aria-label="Select Member Image"
                                        data-bs-original-title="Select Image">
                                        <div class="avatar-xs">
                                            <div
                                                class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                <i class="fa-solid fa-image font-size-16"></i>
                                            </div>
                                        </div>
                                    </label>
                                    <input class="form-control d-none" value="" id="member-image-input"
                                        type="file" accept="image/png, image/gif, image/jpeg">

                                </div>
                                <div class="avatar-xl">
                                    <div class="avatar-title bg-light rounded-circle">
                                        <img src="../image/logo.svg" id="tlc-avatar"
                                            class="avatar-lg rounded-circle">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ms-md-4">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2"><a href="#"
                                            class="text-dark fs-2 fw-bold me-1 text-decoration-none">TLC</a>
                                        <a href="#"><i class="fas fa-check text-success font-size-20"></i></a>
                                    </div>
                                    <p class="mb-2">
                                        <i class="me-2 fas fa-user"></i>
                                        <span>Role: user</span>
                                    </p>
                                    <p class="mb-2">
                                        <i class="me-2 fas fa-coins"></i>
                                        <span>Số dư: <span class="fw-bold">0</span></span>
                                    </p>
                                    <p class="mb-2">
                                        <i class="me-2 fas fa-mail-bulk"></i><span>Email: </span>
                                        <span class="text-danger">Chưa cập nhật</span>
                                    </p>
                                    <p class="mb-2">
                                        <i class="me-2 far fa-calendar-alt"></i>
                                        <span>Ngày tham gia: 2024-12-09 16:02:11</span>
                                    </p>
                                    <p class="mb-2">
                                        <i class="me-1 fas fa-user-lock"></i>
                                        <span>Mật khẩu cấp 2: <a class="text-danger">Chưa cập nhật</a></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form id="form_update_info" action="/tai-khoan/update" method="POST"
                        class="needs-validation-custom form-horizontal" novalidate="">
                        <div class="row">
                            <input type="hidden" name="_token" value="EktzOLclKMV5zxUQ2RCNe2K8ucnPIy9ApOTSYL5u">
                            <input style="display: none" name="avatar" id="tlc-avatar" value="">
                            <div class="mb-3 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Tên hiển thị</label>
                                    <input type="text" class="form-control" id="fullName" name="name"
                                        required="" value="" placeholder="Nhập tên hiển thị">
                                    <div class="invalid-feedback">
                                        Vui lòng nhập dữ liệu!.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="website">Số điện thoại</label>
                                    <input type="text" class="form-control" id="website" name="phone"
                                        value="" required="" placeholder="Nhập số điện thoại của bạn">
                                    <div class="invalid-feedback">
                                        Vui lòng nhập dữ liệu.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <label class="col-auto col-form-label fw-semibold fs-6">Kích hoạt auto phone
                                farm</label>
                            <div class="col-auto d-flex align-items-center ps-0">
                                <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                    <input class="form-check-input w-45px h-30px" type="checkbox" name="phone_farm"
                                        value="true" id="allowmarketing" checked="">
                                    <label class="form-check-label" for="allowmarketing"></label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 d-grid">
                            <div class="mt-3 d-grid">
                                <div>
                                    <div class="grecaptcha-badge" data-style="bottomright"
                                        style="width: 256px; height: 60px; display: block; transition: right 0.3s; position: fixed; bottom: 14px; right: -186px; box-shadow: gray 0px 0px 5px; border-radius: 2px; overflow: hidden;">
                                        <div class="grecaptcha-logo"><iframe title="reCAPTCHA" width="256"
                                                height="60" role="presentation" name="a-y12qf4n1kzqw"
                                                frameborder="0" scrolling="no"
                                                sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"
                                                src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfBV2IpAAAAAHuKNsjds4l--y8vZHJY72HuSlQL&amp;co=aHR0cHM6Ly90YW5nbGlrZWNoZW8uY29tOjQ0Mw..&amp;hl=vi&amp;v=zIriijn3uj5Vpknvt_LnfNbF&amp;size=invisible&amp;cb=bm5kdxx9mo11"></iframe>
                                        </div>
                                        <div class="grecaptcha-error"></div>
                                        <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response"
                                            style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                    </div><iframe style="display: none;"></iframe>
                                </div><button type="submit"
                                    class="g-recaptcha btn btn-primary waves-effect waves-ligh"
                                    data-sitekey="6LfBV2IpAAAAAHuKNsjds4l--y8vZHJY72HuSlQL"
                                    data-callback="onSubmit">Cập nhật</button>
                            </div>




                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function onSubmit() {
                //check validate
                if (checkValidateForm('form_update_info') == 1) {
                    loading();
                    document.getElementById('form_update_info').submit();
                }
                //end check
                return 1;
                // loading();
                // document.getElementById('form').submit();
            }

            $("#form_update_info").on('change keydown paste input', function() {
                checkValidateForm('form_update_info');
            });
        </script>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card border-0 mb-5 mb-xl-10">
                <div class="card-header bg-light border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_signin_method">
                    <div class="card-title m-0">
                        <h4 class="fw-bold m-0">Bảo mật tài khoản</h4>
                    </div>
                </div>
                <div id="kt_account_settings_signin_method" class="collapse show">
                    <div class="card-body border-top p-9">
                        <div class="kt_signin_email">
                            <div id="kt_signin_email_1" class="d-flex flex-wrap align-items-center" style="">
                                <div id="kt_signin_email" class="">
                                    <div class="fs-6 fw-bold mb-1">Email
                                    </div>
                                    <div class="text-muted"
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 40vw;">
                                        <span class="text-danger">Chưa cập nhật</span>
                                    </div>
                                </div>
                                <div id="kt_signin_email_button" class="ms-auto">
                                    <button
                                        onclick="$('#kt_signin_email_1').attr('style','display:none !important');$('#kt_signin_email_2').css('display','block');openForm('email')"
                                        class="btn btn-light btn-active-light-primary">Cập nhật email
                                    </button>
                                </div>
                            </div>
                            <div id="kt_signin_email_2" style="display: none;" class="flex-row-fluid">
                                <form id="kt_signin_change_email" class="needs-validation-custom form-horizontal"
                                    novalidate="novalidate">
                                    <div class="row mb-6">
                                        <div class="col-lg-6 mb-4 mb-lg-0">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="emailaddress" id="email_label"
                                                    class="form-label fs-6 fw-bold mb-3">

                                                    <span style="cursor: pointer"
                                                        onclick="messageError('Sau khi thêm email, bạn cần phải\n'+
'                    vào email nhận thư và xác thực email thì bạn mới có thể dùng email để khôi\n'+
'                    phục mật khẩu đăng nhập khi quên mật khẩu')"
                                                        class="text-warning">[ Chưa xác minh ]</span>
                                                </label>
                                                <input type="email" class="form-control" id="emailaddress"
                                                    required="" placeholder="no-email@gmail.com"
                                                    name="emailaddress" value="">
                                                <div class="invalid-feedback">
                                                    Vui lòng nhập dữ liệu.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="confirmemailpassword1"
                                                    class="form-label fs-6 fw-bold mb-3">Mật khẩu TLC</label>
                                                <input type="password" class="form-control" required=""
                                                    placeholder="Nhập mật khẩu TLC" name="confirmemailpassword1"
                                                    readonly="" onfocus="this.removeAttribute('readonly');"
                                                    id="confirmemailpassword1">
                                                <div class="invalid-feedback">
                                                    Vui lòng nhập dữ liệu.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert alert-warning fade show my-3" role="alert">
                                        <p class="text-danger fw-bold mb-0">Sau khi thêm email, bạn cần phải
                                            vào email nhận thư và xác thực email thì bạn mới có thể dùng email để khôi
                                            phục mật khẩu đăng nhập khi quên mật khẩu</p>
                                    </div>
                                    <div class="d-flex mt-3">
                                        <button id="kt_signin_submit" type="button" onclick="updateEmail()"
                                            class="btn btn-primary me-2">Cập nhật
                                        </button>
                                        <button
                                            onclick="$('#kt_signin_email_1').attr('style','');$('#kt_signin_email_2').css('display','none')"
                                            id="kt_signin_cancel" type="button"
                                            class="btn btn-light btn-active-light-primary">
                                            Hủy
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <script>
                            $("#kt_signin_change_email").on('change keydown paste input', function() {
                                checkValidateForm('kt_signin_change_email');
                            });

                            function updateEmail() {

                                if (checkValidateForm('kt_signin_change_email') == 1) {
                                    loading();
                                    $('#email_label').text(getValueByName('emailaddress'));
                                    $('#email').text(getValueByName('emailaddress'));
                                    data = {
                                        email: getValueByName('emailaddress'),
                                        password: getValueByName('confirmemailpassword1'),
                                        _token: 'EktzOLclKMV5zxUQ2RCNe2K8ucnPIy9ApOTSYL5u',
                                    };
                                    $.ajax({
                                        "url": "/tai-khoan/updateEmail",
                                        "method": "POST",
                                        "timeout": 0,
                                        "headers": headers,
                                        "data": JSON.stringify(data),
                                        "success": function(response) {
                                            stopLoading();
                                            if (response.success) {
                                                messageSuccess(response.message, 'reloadPage');
                                            } else {
                                                messageError(response.message ? response.message :
                                                    'Đơn trong quá trình tạo. Hãy kiểm tra nhật ký đơn');
                                            }
                                        },
                                        "error": function(error) {
                                            stopLoading();
                                            messageError(error.responseJSON.message ? error.responseJSON.message :
                                                "Lỗi không xác định");
                                        }
                                    });
                                }

                            }
                        </script>
                        <div class="separator separator-dashed my-3"></div>
                        <div class="kt_signin_password">
                            <div id="kt_signin_password_edit0" class="d-flex flex-wrap align-items-center"
                                style="">
                                <div id="kt_signin_password" class="">
                                    <div class="fs-6 fw-bold mb-1">Mật khẩu</div>
                                    <div class="text-muted">************</div>
                                </div>
                                <div id="kt_signin_password_button" class="ms-auto">
                                    <button
                                        onclick="$('#kt_signin_password_edit0').attr('style','display:none !important');$('#kt_signin_password_edit').css('display','block');openForm('password')"
                                        class="btn btn-light btn-active-light-primary">Cập nhật mật khẩu
                                    </button>
                                </div>
                            </div>
                            <div style="display: none" id="kt_signin_password_edit" class="flex-row-fluid">
                                <form id="kt_signin_change_password" class="needs-validation-custom form-horizontal"
                                    novalidate="novalidate">
                                    <div class="row mb-1">
                                        <div class="col-lg-4 mb-3">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="currentpassword" class="form-label fs-6 fw-bold mb-2">Mật
                                                    khẩu hiện
                                                    tại</label>
                                                <input type="password" readonly=""
                                                    onfocus="this.removeAttribute('readonly');" class="form-control"
                                                    required="" placeholder="Nhập mật khẩu hiện tại"
                                                    name="password_old" id="currentpassword">
                                                <div class="invalid-feedback">
                                                    Vui lòng nhập dữ liệu.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="newpassword" class="form-label fs-6 fw-bold mb-2">Mật khẩu
                                                    mới</label>
                                                <input type="password" readonly=""
                                                    onfocus="this.removeAttribute('readonly');" class="form-control "
                                                    required="" placeholder="Nhập mật khẩu mới"
                                                    name="password_new" id="newpassword">
                                                <div class="invalid-feedback">
                                                    Vui lòng nhập dữ liệu.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="confirmpassword" class="form-label fs-6 fw-bold mb-2">Nhập
                                                    lại mật
                                                    khẩu mới</label>
                                                <input type="password" readonly=""
                                                    onfocus="this.removeAttribute('readonly');" class="form-control"
                                                    required="" placeholder="Nhập lại mật khẩu mới"
                                                    name="password_confirm" id="confirmpassword">
                                                <div class="invalid-feedback">
                                                    Vui lòng nhập dữ liệu.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-3">
                                        <button id="kt_password_submit" type="button" onclick="changePassword()"
                                            class="btn btn-primary me-2">Cập nhật
                                        </button>
                                        <button
                                            onclick="$('#kt_signin_password_edit0').attr('style','');$('#kt_signin_password_edit').css('display','none')"
                                            id="kt_password_cancel" type="button"
                                            class="btn btn-light btn-active-light-primary">Hủy
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <script>
                            $("#kt_signin_change_password").on('change keydown paste input', function() {
                                checkValidateForm('kt_signin_change_password');
                            });

                            function changePassword() {
                                if (checkValidateForm('kt_signin_change_password') == 1) {
                                    if (getValueByName('password_confirm') !== getValueByName('password_new')) {
                                        messageError("Xác nhận mật khẩu không đúng");
                                        return false;
                                    }
                                    Swal.fire({
                                        title: 'Xác nhận',
                                        html: "Hãy kiểm tra kỹ bạn đã nhập đúng thông tin?\n",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Xác nhận',
                                        cancelButtonText: 'Hủy'
                                    }).then((result) => {
                                        if (result.value) {
                                            loading();
                                            var data = {
                                                password_old: getValueByName('password_old'),
                                                password_new: getValueByName('password_new'),
                                                password_confirm: getValueByName('password_confirm'),
                                                _token: 'EktzOLclKMV5zxUQ2RCNe2K8ucnPIy9ApOTSYL5u'
                                            };
                                            $.ajax({
                                                "url": "/api/mat-khau/change",
                                                "method": "POST",
                                                "timeout": 0,
                                                "headers": headers,
                                                "data": JSON.stringify(data),
                                                "success": function(response) {
                                                    stopLoading();
                                                    if (response.success) {
                                                        messageSuccess(response.message);
                                                        loading();
                                                        window.location.href = '/dang-xuat';
                                                    } else {
                                                        messageError(response.message);
                                                    }
                                                },
                                                "error": function(error) {
                                                    stopLoading();
                                                    messageError(error.responseJSON.message ? error.responseJSON.message :
                                                        "Lỗi không xác định");
                                                }
                                            });
                                        }
                                    })
                                }

                            }
                        </script>
                        <div class="separator separator-dashed my-3"></div>
                        <div class="kt_signin_password2">
                            <div id="kt_signin_password2_edit0" class="d-flex flex-wrap align-items-center"
                                style="">
                                <div id="kt_signin_password" class="">
                                    <div class="fs-6 fw-bold mb-1">Mật khẩu cấp 2</div>
                                    <div class="text-muted">
                                        <span class="text-danger">Chưa cập nhật</span>
                                    </div>
                                </div>
                                <div id="kt_signin_password_button" class="ms-auto">
                                    <button
                                        onclick="$('#kt_signin_password2_edit0').attr('style','display:none !important');$('#kt_signin_password2_edit').css('display','block');openForm('password2')"
                                        class="btn btn-light btn-active-light-primary">Cập nhật mật khẩu
                                        cấp 2
                                    </button>
                                </div>
                            </div>
                            <div style="display: none" id="kt_signin_password2_edit">
                                <form id="kt_signin_change_password2" class="needs-validation-custom form-horizontal"
                                    novalidate="novalidate">
                                    <div class="row mb-1">
                                        <div class="col-lg-4 mb-3">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="currentpassword2" class="form-label fs-6 fw-bold mb-2">Mật
                                                    khẩu cấp 2
                                                    hiện tại</label>
                                                <input type="password" readonly=""
                                                    onfocus="this.removeAttribute('readonly');"
                                                    placeholder="Chưa có thì bỏ trống" class="form-control"
                                                    disabled="" name="password2_old" id="currentpassword2">
                                                <div class="invalid-feedback">
                                                    Vui lòng nhập dữ liệu.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="newpassword2" class="form-label fs-6 fw-bold mb-2">Mật
                                                    khẩu cấp 2
                                                    mới</label>
                                                <input type="password" readonly=""
                                                    onfocus="this.removeAttribute('readonly');" class="form-control"
                                                    required="" placeholder="Nhập mật khẩu cấp 2 mới"
                                                    name="password2_new" id="newpassword2">
                                                <div class="invalid-feedback">
                                                    Vui lòng nhập dữ liệu.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="confirmpassword2"
                                                    class="form-label fs-6 fw-bold mb-2">Nhập lại mật
                                                    khẩu cấp 2 mới</label>
                                                <input type="password" readonly=""
                                                    onfocus="this.removeAttribute('readonly');" class="form-control"
                                                    required="" placeholder="Nhập lại mật khẩu cấp 2 mới"
                                                    name="password2_newconfirm" id="confirmpassword2">
                                                <div class="invalid-feedback">
                                                    Vui lòng nhập dữ liệu.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert alert-warning fade show mb-3" role="alert">
                                        <p class="text-danger fw-bold">Chưa có mật khẩu cấp 2 thì bỏ trống
                                            mật khẩu cấp 2 hiện tại</p>
                                        <p class="text-danger fw-bold">Mật khẩu cấp 2, dùng để xác nhận
                                            chuyển Xu
                                            và khôi phục mật khẩu đăng nhập</p>
                                        <p class="text-danger fw-bold mb-0">Luôn luôn phải nhớ mật khẩu cấp
                                            2, nếu mất KHÔNG thể khôi phục mật khẩu cấp 2</p>
                                    </div>
                                    <div class="d-flex">
                                        <button id="kt_password_submit2" type="button" onclick="changePassword2()"
                                            class="btn btn-primary me-2">Cập nhật
                                        </button>
                                        <button id="kt_password2_cancel" type="button"
                                            onclick="$('#kt_signin_password2_edit0').attr('style','');$('#kt_signin_password2_edit').css('display','none')"
                                            class="btn btn-light btn-active-light-primary">Hủy
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <script>
                            $("#kt_signin_change_password2").on('change keydown paste input', function() {
                                checkValidateForm('kt_signin_change_password2');
                            });

                            function changePassword2() {

                                if (checkValidateForm('kt_signin_change_password2') == 1) {
                                    if (getValueByName('password2_newconfirm') !== getValueByName('password2_new')) {
                                        messageError("Xác nhận mật khẩu không đúng");
                                        return false;
                                    }
                                    Swal.fire({
                                        title: 'Xác nhận',
                                        html: "Hãy kiểm tra kỹ bạn đã nhập đúng thông tin?\n",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Xác nhận',
                                        cancelButtonText: 'Hủy'
                                    }).then((result) => {
                                        if (result.value) {
                                            loading();
                                            var data = {
                                                password2_old: getValueByName('password2_old'),
                                                password2_new: getValueByName('password2_new'),
                                                password2_newconfirm: getValueByName('password2_newconfirm'),
                                                _token: 'EktzOLclKMV5zxUQ2RCNe2K8ucnPIy9ApOTSYL5u'
                                            };
                                            $.ajax({
                                                "url": "/api/mat-khau-cap-2/charge",
                                                "method": "POST",
                                                "timeout": 0,
                                                "headers": headers,
                                                "data": JSON.stringify(data),
                                                "success": function(response) {
                                                    stopLoading();
                                                    if (response.success) {
                                                        clearForm();
                                                        messageSuccess(response.message, 'reloadPage');
                                                    } else {
                                                        messageError(response.message);
                                                    }
                                                },
                                                "error": function(error) {
                                                    stopLoading();
                                                    messageError(error.responseJSON.message ? error.responseJSON.message :
                                                        "Lỗi không xác định");
                                                }
                                            });
                                        }
                                    })
                                }

                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
