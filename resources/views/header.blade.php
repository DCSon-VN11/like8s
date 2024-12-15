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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body style="background-color: #F8F8FB">
    <div class="header">
        <nav class="navbar navbar-expand-lg header-logo">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="navbar-brand d-none d-lg-block" href="/home">
                        <img src="../image/tlc-blue.svg" height="auto" alt="tlc-blue">
                    </a>
                    <a class="navbar-brand d-lg-none" href="home">
                        <img src="../image/logo.svg" height="33" alt="tlc-white">
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
                    <div class="d-none d-lg-inline-block header-item">
                        <i class="bi bi-fullscreen" style="text-shadow: 0.5px 0.5px black;"></i>
                    </div>
                    <div class="header-item">
                        <i class="bi bi-bell fs-5 shake" style="text-shadow: 0.25px 0.25px black;"></i>
                    </div>
                    <div class="header-item dropdown d-inline-block">
                        <button type="button" class="border-0 px-1 show"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true" style="background-color: rgb(255, 255, 255)">
                            <img class="rounded-circle header-profile-user" width="36px" height="36px" src="../image/logo.svg"
                                alt="Avatar">
                            <span class="d-none d-xl-inline-block" key="t-henry">TLC</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"
                            style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 72px);"
                            data-popper-placement="bottom-end">
                            <div class="info-user py-1">
                                <p class="text-center mb-0 fw-bold" key="t-henry">cson</p>
                                <p class="text-center mb-0" key="t-henry">user</p>
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
                            <a class="dropdown-item text-danger" href="/dang-xuat"><i
                                    class="fas fa-power-off font-size-16 align-middle me-2 text-danger"></i> <span
                                    key="t-logout">Đăng xuất</span></a>
                        </div>
                    </div>
                    <div class="header-item">
                        <i class="bi bi-gear fs-5 rotate" style="text-shadow: 0.25px 0.25px black;"></i>
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
                                <div>
                                    <a href="vip-like-instagram">
                                        <i class="fas fa-hand-holding-heart me-2" style="font-size: 16px;"></i>
                                        Vip Like bài viết Intagram
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
                            <div id="tiktok-menu">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</body>

</html>
