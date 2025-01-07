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
                        <a href="/" class="bg-primary-subtle">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Đăng ký</h5>
                                        <p>Get your free account now.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="/../image/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </a>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="/" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="../image/logo-light.svg?v=1" alt="" class="rounded-circle"
                                                height="80%">
                                        </span>
                                    </div>
                                </a>
                                <a href="/" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="../image/logo.svg" alt="" class="rounded-circle"
                                                height="68%">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="needs-validation" novalidate="" action="{{ route('register') }}"
                                    id="form" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Tên đăng nhập</label>
                                        <input type="text" name="username" class="form-control" id="username"
                                            placeholder="Nhập tên đăng nhập" required>
                                        <div class="invalid-feedback">
                                            Vui lòng nhập dữ liệu
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="userpassword" class="form-label">Mật khẩu</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Nhập mật khẩu" aria-label="Password" required>
                                        <div class="invalid-feedback">
                                            Vui lòng nhập dữ liệu
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="userpassword" class="form-label">Nhập lại mật khẩu</label>
                                        <input type="password" class="form-control" name="password2" id="userpassword"
                                            placeholder="Nhập lại mật khẩu" required>
                                        <div class="invalid-feedback">
                                            Vui lòng nhập dữ liệu
                                        </div>
                                    </div>

                                    <div class="mt-4 d-grid">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Đăng
                                            ký</button>
                                    </div>
                                </form>

                                <!-- Display errors if any -->
                                @if ($errors->any())
                                    <div class="thong-bao alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (session('success'))
                                    <div class="thong-bao alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <script>
                                    // Kiểm tra nếu tồn tại thông báo thành công
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const successAlert = document.getElementById('success-alert');
                                        if (successAlert) {
                                            // Hiển thị thông báo trong 2 giây
                                            setTimeout(() => {
                                                // Chuyển hướng sang trang login
                                                window.location.href = "{{ route('login') }}";
                                            }, 2000); // 2000ms = 2 giây
                                        }
                                    });
                                </script>


                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>Bạn đã có tài khoản ? <a href="dang-nhap" class="fw-medium text-primary"> Đăng nhập
                                    ngay</a>
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
