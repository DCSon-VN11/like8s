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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body style="background-color: #F8F8FB">
    <div class="header">
        <nav class="navbar navbar-expand-lg header-logo">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="navbar-brand d-none d-lg-block" href="/home">
                        <img src="../image/tlc-blue.svg" height="50px" width="245px" alt="tlc-blue">
                    </a>
                    <a class="navbar-brand d-lg-none" href="home">
                        <img src="../image/logo.png" height="33" alt="tlc-white">
                    </a>
                    <div id="menubtn" class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars mt-2"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <div class="header-item">
                        <img src="../image/vietnam.jpg" height="16" style="margin-top: -5px;" alt="vietnam.jpg">
                    </div>
                    <div class="header-item dropdown">
                        <i class="bi bi-bell fs-4 shake dropdown-toggle"
                            style="text-shadow: 0.25px 0.25px black; cursor: pointer;" id="notificationDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        </i>
                        <span class="badge bg-danger rounded-pill" style="position:absolute;left:20px;top:5px">
                            {{ ($userinfo->email == '') + (($userinfo->name == '' || $userinfo->phone == '') ? 1 : 0) }}
                        </span>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                            @if ($userinfo->email == '')
                                <li><a class="dropdown-item text-danger" href="tai-khoan">
                                        <i class="bi bi-exclamation-circle"></i> Vui lòng xác thực email
                                    </a></li>
                            @endif
                            @if ($userinfo->name == '' || $userinfo->phone == '')
                                <li><a class="dropdown-item text-warning" href="tai-khoan">
                                        <i class="bi bi-exclamation-circle"></i> Vui lòng điền tên và số điện thoại
                                    </a></li>
                            @endif
                        </ul>
                    </div>

                    <div class="header-item dropdown d-inline-block">
                        <button type="button" class="border-0 px-1 show" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <img class="rounded-circle header-profile-user" width="36px" height="36px"
                                src="../image/{{ $userinfo->avatar ?? 'logo.svg' }}" alt="Avatar">
                            <span class="d-none d-xl-inline-block" key="t-henry">{{ $userinfo->name ?? 'TLC' }}</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"
                            style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 72px);"
                            data-popper-placement="bottom-end">
                            <div class="info-user py-1">
                                <p class="text-center mb-0 fw-bold" key="t-henry">{{ $account->username }}</p>
                                <p class="text-center mb-0" key="t-henry">{{ $account->role }}</p>
                                <a class="w-100 text-decoration-none text-black d-flex justify-content-between px-4 py-2"
                                    href="vi-tien">
                                    <span><i class="fa-solid fa-wallet font-size-16 align-middle me-2"></i>Ví tiền:
                                    </span>{{ number_format($wallet->balance, 0, ',', '.') }} VND
                                </a>
                            </div>
                            <div class="dropdown-divider my-1"></div>
                            <a class="dropdown-item" href="lien-he"><i
                                    class="fas fa-headset font-size-16 align-middle me-2"></i> <span
                                    key="t-profile">Liên Hệ</span></a>
                            <a class="dropdown-item d-block" href="tai-khoan"><i
                                    class="fas fa-user-shield font-size-16 align-middle me-2"></i> <span
                                    key="t-settings">Trang cá nhân</span>
                                <span class="badge bg-danger">Hot</span></a>
                            <div class="dropdown-divider my-1"></div>
                            <a class="dropdown-item text-danger" href="javascript:void(0);"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="fas fa-power-off font-size-16 align-middle me-2 text-danger"></i> <span
                                    key="t-logout">Đăng xuất</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('POST')
                            </form>
                        </div>
                    </div>
                    <div class="header-item">
                        <i class="right-bar-toggle bi bi-gear fs-5 rotate"
                            style="text-shadow: 0.25px 0.25px black;"></i>
                    </div>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg header-menu">
            <div class="container-fluid p-0">
                <div class="menu">
                    <ul>
                        <li>
                            <div>
                                <a href="" role="button">
                                    <div>
                                        <i class="fas fa-home me-2" style="font-size: 18px;"></i>
                                        Dashboard
                                    </div>
                                    <i class="bi bi-chevron-down ms-2" style="font-size: 10px;"></i>
                                </a>
                            </div>
                            <div id="dashboard-menu">
                                <div>
                                    <a href="home">
                                        <i class="fas fa-home me-2" style="font-size: 16px;"></i>
                                        Home
                                    </a>
                                </div>
                                <div>
                                    <a href="nhat-ky-hoat-dong">
                                        <i class="fa-solid fa-list-check me-2" style="font-size: 16px;"></i>
                                        Nhật ký hoạt động
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="" role="button">
                                    <div>
                                        <i class="fa-brands fa-facebook me-2" style="font-size: 18px;"></i>
                                        Dịch vụ Facebook
                                    </div>
                                    <i class="bi bi-chevron-down ms-2" style="font-size: 10px;"></i>
                                </a>
                            </div>
                            <div id="facebook-menu">
                                <div>
                                    <a href="like-facebook">
                                        <i class="far fa-thumbs-up me-2" style="font-size: 16px;"></i>
                                        Tăng Like bài viết
                                    </a>
                                </div>
                                <div>
                                    <a href="follow-facebook">
                                        <i class="fas fa-user-check me-2" style="font-size: 16px;"></i>
                                        Tăng theo dõi
                                    </a>
                                </div>
                                <div>
                                    <a href="like-page-facebook">
                                        <i class="fas fa-thumbs-up me-2" style="font-size: 16px;"></i>
                                        Tăng Like Page
                                    </a>
                                </div>
                                <div>
                                    <a href="share-facebook">
                                        <i class="fas fa-share-alt me-2" style="font-size: 16px;"></i>
                                        Tăng chia sẻ bài viết
                                    </a>
                                </div>
                                <div>
                                    <a href="like-comment-facebook">
                                        <i class="far fa-hand-point-right me-2" style="font-size: 16px;"></i>
                                        Tăng Like Comment
                                    </a>
                                </div>
                                <div>
                                    <a href="mem-group">
                                        <i class="fas fa-users me-2" style="font-size: 16px;"></i>
                                        Tăng thành viên nhóm
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="" role="button">
                                    <div>
                                        <i class="fa-brands fa-instagram me-2" style="font-size: 18px;"></i>
                                        Dịch vụ Intagram
                                    </div>
                                    <i class="bi bi-chevron-down ms-2" style="font-size: 10px;"></i>
                                </a>
                            </div>
                            <div id="intagram-menu">
                                <div>
                                    <a href="like-instagram">
                                        <i class="far fa-thumbs-up me-2" style="font-size: 16px;"></i>
                                        Tăng Like bài viết
                                    </a>
                                </div>
                                <div>
                                    <a href="follow-instagram">
                                        <i class="fas fa-user-check me-2" style="font-size: 16px;"></i>
                                        Tăng theo dõi
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="" role="button">
                                    <div><i class="fa-brands fa-tiktok me-2" style="font-size: 18px;"></i>
                                        Dịch vụ TikTok
                                    </div>
                                    <i class="bi bi-chevron-down ms-2" style="font-size: 10px;"></i>
                                </a>
                            </div>
                            <div id="tiktok-menu" style="width:25%;">
                                <div>
                                    <a href="like-tiktok">
                                        <i class="fas fa-heart me-2" style="font-size: 16px;"></i>
                                        Tăng tim bài viết
                                    </a>
                                </div>
                                <div>
                                    <a href="follow-tiktok">
                                        <i class="fas fa-user-check me-2" style="font-size: 16px;"></i>
                                        Tăng theo dõi
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    function toggleMenu() {
                        var mediaQuery = window.matchMedia("(max-width: 992px)");
                        if (mediaQuery.matches) {
                            $('.header-menu').hide();
                            $('#menubtn').off('click').on('click', function(event) {
                                $('.header-menu').toggle();
                                var $icon = $('#menubtn').find('i');
                                $icon.toggleClass('fa-bars fa-times');
                            });

                            $('.menu ul li').off('click').on('click', function(event) {
                                var $this = $(this);
                                var $link = $this.find('a');
                                if ($link.attr('href') === "") {
                                    event.preventDefault();
                                }

                                var $menu = $this.find('div[id$="-menu"]');
                                $('div[id$="-menu"]').not($menu).removeClass('d-block').slideUp();
                                $menu.toggleClass('d-block');

                                if ($menu.hasClass('d-block')) {
                                    $menu.stop(true, true).slideDown();
                                } else {
                                    $menu.stop(true, true).slideUp();
                                }
                            });
                        } else {
                            $('div[id$="-menu"]').removeClass('d-block').slideUp();
                            $('.header-menu').show();
                            $('#menubtn i').each(function() {
                                if ($(this).hasClass('fa-times')) {
                                    $(this).removeClass('fa-times').addClass('fa-bars');
                                } else if ($(this).hasClass('fa-bars')) {
                                    $(this).removeClass('fa-bars').addClass('fa-times');
                                }
                            });
                            $('#menubtn').off('click');
                            $('.menu ul li').off('click');
                        }
                        mediaQuery.addListener(function(e) {
                            toggleMenu();
                        });
                    }
                    toggleMenu();
                    $(window).resize(function() {
                        toggleMenu();
                    });
                });
            </script>
        </nav>
    </div>
    <div class="right-bar">
        <div data-simplebar="init" class="h-100 simplebar-scrollable-y">
            <div class="simplebar-wrapper" style="margin: 0px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" tabindex="0" role="region"
                            aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                            <div class="simplebar-content" style="padding: 0px;">
                                <div class="rightbar-title d-flex align-items-center px-3 py-4">

                                    <h5 class="m-0 me-2">Settings</h5>

                                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto btn-close-settings">
                                        <i class="fa-solid fa-x"></i>
                                    </a>
                                </div>

                                <!-- Settings -->
                                <hr class="mt-0">
                                <h6 class="text-center mb-0">Choose Layouts</h6>

                                <div class="p-4">
                                    <div class="mb-2">
                                        <img src="../image/layout-1.jpg" class="img-thumbnail" alt="layout images">
                                    </div>

                                    <div class="form-check form-switch mb-3">
                                        <input onclick="changeTheme('light')" class="form-check-input theme-choice"
                                            type="checkbox" id="light-mode-switch" checked="">
                                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                                    </div>

                                    <div class="mb-2">
                                        <img src="../image/layout-2.jpg" class="img-thumbnail" alt="layout images">
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input onclick="changeTheme('dark')" class="form-check-input theme-choice"
                                            type="checkbox" id="dark-mode-switch">
                                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: 280px; height: 593px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                <div class="simplebar-scrollbar"
                    style="height: 201px; display: block; transform: translate3d(0px, 0px, 0px);"></div>
            </div>
        </div> <!-- end slimscroll-menu-->
    </div>
    <script>
        $(".right-bar-toggle").on("click", function(e) {
            $("body").toggleClass("right-bar-enabled")
        });
        $(document).on("click", "body", function(e) {
            0 < s(e.target).closest(".right-bar-toggle, .right-bar").length || s("body").removeClass(
                "right-bar-enabled")
        })
    </script>
    <div class="rightbar-overlay"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>
