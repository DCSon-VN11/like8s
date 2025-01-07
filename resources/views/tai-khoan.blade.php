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
                                    <form id="form-update-avatar" action="{{ route('updateAvatar') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
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
                                        <input class="form-control d-none" id="member-image-input" name="avatar"
                                            type="file" accept="image/png, image/gif, image/jpeg">

                                        <!-- Nút submit sẽ ẩn khi không có ảnh được chọn -->
                                        <button type="submit" id="submit-avatar" class="btn btn-primary mt-2 p-1"
                                            style="display: none;">Cập nhật Avatar</button>
                                    </form>

                                    <script>
                                        // Khi người dùng chọn một tệp hình ảnh
                                        document.getElementById('member-image-input').addEventListener('change', function() {
                                            var submitButton = document.getElementById('submit-avatar');

                                            // Nếu có ảnh được chọn, hiển thị nút submit
                                            if (this.files && this.files[0]) {
                                                submitButton.style.display = 'inline-block'; // Hiển thị nút submit
                                            } else {
                                                submitButton.style.display = 'none'; // Ẩn nút submit nếu không có ảnh
                                            }
                                        });
                                    </script>

                                </div>

                                <div class="avatar-xl">
                                    <div class="avatar-title bg-light rounded-circle">
                                        <img src="../image/{{ $userinfo->avatar ?? 'logo.svg' }}" id="tlc-avatar"
                                            class="avatar-lg rounded-circle">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ms-md-4">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2"><a href="#"
                                            class="text-dark fs-2 fw-bold me-1 text-decoration-none">{{ $userinfo->name ?? 'TLC' }}</a>
                                        <a href="#"><i class="fas fa-check text-success font-size-20"></i></a>
                                    </div>
                                    <p class="mb-2">
                                        <i class="me-2 fas fa-user"></i>
                                        <span>Role: {{ $account->role }}</span>
                                    </p>
                                    <p class="mb-2">
                                        <i class="me-2 fas fa-coins"></i>
                                        <span>Số dư: <span class="fw-bold">
                                                {{ number_format($wallet->balance, 0, ',', '.') }} VND</span></span>
                                    </p>
                                    <p class="mb-2">
                                        <i class="me-2 fas fa-mail-bulk"></i><span>Email: </span>
                                        @if ($userinfo->verified_at)
                                            <span class="text-success">Đã xác thực</span>
                                        @else
                                            <span class="text-danger">Chưa xác thực</span>
                                        @endif
                                    </p>
                                    <p class="mb-2">
                                        <i class="me-2 far fa-calendar-alt"></i>
                                        <span>Ngày tham gia: {{ $account->created_at }}</span>
                                    </p>
                                    @if (!empty($userinfo->phone))
                                        <p class="mb-2">
                                            <i class="me-2 fa-solid fa-phone"></i>
                                            <span>Số điện thoại: {{ $userinfo->phone }}</span>
                                        </p>
                                    @endif
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
                    @if (empty($userinfo->name) || empty($userinfo->phone))
                        <style>
                            #form_update_info {
                                display: block;
                            }

                            #btn_show_form {
                                display: none;
                            }
                        </style>
                    @else
                        <style>
                            #form_update_info {
                                display: none;
                            }

                            #btn_show_form {
                                display: block;
                            }
                        </style>
                    @endif

                    <form id="form_update_info" action="{{ route('updateInfo') }}" method="POST"
                        class="needs-validation-custom form-horizontal">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Tên hiển thị</label>
                                    <input type="text" class="form-control" id="fullName" name="name" required
                                        value="{{ $userinfo->name ?? '' }}" placeholder="Nhập tên hiển thị">
                                </div>
                            </div>
                            <div class="mb-3 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="website">Số điện thoại</label>
                                    <input type="text" class="form-control" id="website" name="phone"
                                        value="{{ $userinfo->phone ?? '' }}" required
                                        placeholder="Nhập số điện thoại của bạn">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 d-grid">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Cập nhật</button>
                        </div>
                        <div class="mt-3 d-grid">
                            <button type="button" id="huy"
                                class="btn btn-light waves-effect waves-light">Huỷ</button>
                        </div>
                    </form>

                    <div class="mt-3 d-grid">
                        <button id="btn_show_form" class="btn btn-primary waves-effect waves-light">Đổi thông
                            tin</button>
                    </div>
                    <script>
                        $(document).ready(function() {
                            // Khi nhấn nút "Đổi thông tin"
                            $("#btn_show_form").click(function() {
                                $(this).fadeOut(); // Ẩn nút với hiệu ứng mờ
                                $("#form_update_info").fadeIn(); // Hiển thị form với hiệu ứng mờ
                            });
                            $("#huy").click(function() {
                                $("#form_update_info").fadeOut(); // Hiển thị form với hiệu ứng mờ
                                $("#btn_show_form").fadeIn();
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
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
                            <div id="kt_signin_email_1" class="d-flex flex-wrap align-items-center">
                                <div id="kt_signin_email">
                                    <div class="fs-6 fw-bold mb-1">Email</div>
                                    <div class="text-muted"
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 40vw;">
                                        @if ($userinfo->verified_at)
                                            <span class="text-success">Đã xác thực</span>
                                        @else
                                            <span class="text-danger">Chưa xác thực</span>
                                        @endif
                                    </div>
                                </div>
                                <div id="kt_signin_email_button" class="ms-auto">
                                    <button class="btn btn-light btn-active-light-primary" onclick="toggleForm()">Cập
                                        nhật email</button>
                                </div>
                            </div>
                            @if (session('messageemail'))
                                <div class="thong-bao alert alert-success">
                                    {{ session('messageemail') }}
                                </div>
                            @endif
                            @if (session('erroremail'))
                                <div class="thong-bao alert alert-danger">
                                    {{ session('erroremail') }}
                                </div>
                            @endif
                            <div id="kt_signin_email_2" style="display: none;" class="flex-row-fluid mt-3">
                                <form id="kt_signin_change_email" action="{{ route('verify') }}" method="POST"
                                    class="needs-validation-custom form-horizontal">
                                    @csrf
                                    <div class="row mb-6">
                                        <div class="col-lg-6 mb-4 mb-lg-0">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="emailaddress" id="email_label"
                                                    class="form-label fs-6 fw-bold mb-3">
                                                    Email
                                                </label>
                                                <input type="email" class="form-control" id="emailaddress" required
                                                    placeholder="no-email@gmail.com" name="emailaddress"
                                                    value="">
                                                <div class="invalid-feedback">Vui lòng nhập dữ liệu.</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="confirmemailpassword1"
                                                    class="form-label fs-6 fw-bold mb-3">Mật khẩu</label>
                                                <input type="password" class="form-control" required
                                                    placeholder="Nhập mật khẩu" name="confirmemailpassword1"
                                                    id="confirmemailpassword1">
                                                <div class="invalid-feedback">Vui lòng nhập dữ liệu.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-3">
                                        <button id="kt_signin_submit" type="submit" class="btn btn-primary me-2">
                                            Cập nhật
                                        </button>
                                        <button id="kt_signin_cancel" type="button"
                                            class="btn btn-light btn-active-light-primary"
                                            onclick="toggleForm()">Hủy</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <script>
                            function toggleForm() {
                                const emailForm = document.getElementById('kt_signin_email_2');
                                const emailLabel = document.getElementById('kt_signin_email_1');

                                if (emailForm.style.display === 'none') {
                                    emailForm.style.display = 'block'; // Hiển thị form
                                    emailLabel.style.display = 'none'; // Ẩn thông tin email hiện tại
                                } else {
                                    emailForm.style.display = 'none'; // Ẩn form
                                    emailLabel.style.display = 'flex'; // Hiển thị thông tin email hiện tại
                                }
                            }
                        </script>

                        <div class="separator separator-dashed my-3"></div>
                        <div class="kt_signin_password">
                            <div id="kt_signin_password_edit0" class="d-flex flex-wrap align-items-center">
                                <div id="kt_signin_password">
                                    <div class="fs-6 fw-bold mb-1">Mật khẩu</div>
                                    <div class="text-muted">************</div>
                                </div>
                                <div id="kt_signin_password_button" class="ms-auto">
                                    <button class="btn btn-light btn-active-light-primary"
                                        onclick="togglePasswordForm()">Cập nhật mật khẩu</button>
                                </div>
                            </div>
                            @if (session('messagepass'))
                                <div class="thong-bao alert alert-success">
                                    {{ session('messagepass') }}
                                </div>
                            @endif
                            @if (session('errorpass'))
                                <div class="thongbao alert alert-danger">
                                    {{ session('errorpass') }}
                                </div>
                            @endif
                            <div style="display: none" id="kt_signin_password_edit" class="flex-row-fluid mt-3">
                                <form id="kt_signin_change_password" method="POST"
                                    action="{{ route('chance-password') }}"
                                    class="needs-validation-custom form-horizontal">
                                    @csrf
                                    <div class="row mb-1">
                                        <div class="col-lg-4 mb-3">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="currentpassword" class="form-label fs-6 fw-bold mb-2">Mật
                                                    khẩu hiện tại</label>
                                                <input type="password" class="form-control" required
                                                    placeholder="Nhập mật khẩu hiện tại" minlength="6"
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
                                                <input type="password" class="form-control" required
                                                    placeholder="Nhập mật khẩu mới" minlength="6"
                                                    name="password_new" id="newpassword">
                                                <div class="invalid-feedback">
                                                    Vui lòng nhập dữ liệu.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 p-0">
                                            <div class="fv-row mb-0 fv-plugins-icon-container">
                                                <label for="confirmpassword" class="form-label fs-6 fw-bold mb-2">Nhập
                                                    lại mật khẩu mới</label>
                                                <input type="password" class="form-control" required
                                                    placeholder="Nhập lại mật khẩu mới" minlength="6"
                                                    name="password_confirm" id="confirmpassword">
                                                <div class="invalid-feedback">
                                                    Vui lòng nhập dữ liệu.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-3">
                                        <button id="kt_password_submit" type="submit"
                                            class="btn btn-primary me-2">Cập nhật</button>
                                        <button id="kt_password_cancel" type="button"
                                            class="btn btn-light btn-active-light-primary"
                                            onclick="togglePasswordForm()">Hủy</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <script>
                            function togglePasswordForm() {
                                const passwordForm = document.getElementById('kt_signin_password_edit');

                                if (passwordForm.style.display === 'none') {
                                    passwordForm.style.display = 'block';
                                } else {
                                    passwordForm.style.display = 'none';
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
