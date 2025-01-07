<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TĂNG LIKE | TĂNG SUB | TĂNG COMMENT | TĂNG TƯƠNG TÁC MẠNG XÃ HỘI</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="../image/logo.svg" rel="icon">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css?v=1" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary-subtle">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue to TangLikeCheo</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="../image/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <div class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="../image/logo-light.svg?v=1" alt="" class="rounded-circle"
                                                height="80%">
                                        </span>
                                    </div>
                                </div>
                                <div class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="../image/logo.svg" alt="" class="rounded-circle"
                                                height="68%">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">

                                <!-- Tên đăng nhập -->
                                @if (!isset($_COOKIE['token']) && !isset($_COOKIE['account']))
                                    <form class="needs-validation form-horizontal"
                                        action="{{ route('forgot.password.send') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Nhập Email của bạn</label>
                                            <input required type="email" id="email" name="email"
                                                class="form-control" placeholder="Nhập email">
                                        </div>
                                        <div class="mt-3 d-grid">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Gửi mã xác nhận
                                            </button>
                                        </div>
                                    </form>
                                @elseif (isset($_COOKIE['token']))
                                    <form class="needs-validation form-horizontal" action="{{ route('reset-form') }}"
                                        method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Nhập mã xác nhận</label>
                                            <input required type="text" id="token" name="token"
                                                class="form-control" placeholder="Nhập mã xác nhận"
                                                autocomplete="username" inputmode="text"
                                                aria-describedby="usernameHelp">
                                        </div>
                                        <div class="mt-3 d-grid">
                                            <button type="submit" id="verifyTokenBtn"
                                                class="g-recaptcha btn btn-primary waves-effect waves-light"
                                                data-sitekey="6LfBV2IpAAAAAHuKNsjds4l--y8vZHJY72HuSlQL"
                                                data-callback="onSubmit">
                                                Xác nhận
                                            </button>
                                        </div>
                                    </form>
                                @elseif (isset($_COOKIE['account']))
                                    <form class="needs-validation form-horizontal"
                                        action="{{ route('reset-password') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Mật khẩu mới</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input required type="password" name="password" class="form-control"
                                                    placeholder="Nhập mật khẩu" aria-label="Mật khẩu">
                                                <button class="btn border border-1" type="button"
                                                    id="password-addon">
                                                    <i class="fa-solid fa-eye text-black"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Xác nhận mật khẩu</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input required type="password" name="password_confirmation"
                                                    class="form-control" placeholder="Nhập lại mật khẩu"
                                                    aria-label="Mật khẩu xác nhận">
                                                <button class="btn border border-1" type="button"
                                                    id="password-confirm-addon">
                                                    <i class="fa-solid fa-eye text-black"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-3 d-grid">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Đổi mật khẩu
                                            </button>
                                        </div>
                                    </form>
                                @endif

                                <!-- Liên kết Quên mật khẩu -->
                                <div class="mt-4 text-center">
                                    <a href="/dang-nhap" class="text-muted">
                                        <i class="mdi mdi-lock me-1"></i> quay lại
                                    </a>
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
                                @if ($errors->any())
                                    <div class="thong-bao alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>Bạn chưa có tài khoản ? <a href="/dang-ky" class="fw-medium text-primary"> Đăng ký ngay
                                </a>
                            </p>
                            <p>©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by TVSTeam
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
