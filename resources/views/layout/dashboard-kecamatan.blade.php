<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{url('img/logo_pemalang_lg.png')}}" sizes="32x32">
    <link rel="shortcut icon" type="image/png" href="{{url('dashboard/assets/images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/slicknav.min.css')}}">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <link rel="stylesheet" href="{{url('dashboard/assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/responsive.css')}}">
    <script src="{{url('dashboard/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    @yield('css')
</head>

<body class="body-bg">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- main wrapper start -->
    <div class="horizontal-main-wrapper">
        <!-- main header area start -->
        <div class="mainheader-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-9 clearfix text-right">
                        <div class="d-md-inline-block d-block mr-md-4">
                            <ul class="notification-area">
                                <li class="dropdown">
                                    <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                        <span>2</span>
                                    </i>
                                    <div class="dropdown-menu bell-notify-box notify-box">
                                        <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                        <div class="nofity-list">
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                                <div class="notify-text">
                                                    <p>You have Changed Your Password</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                                <div class="notify-text">
                                                    <p>New Commetns On Post</p>
                                                    <span>30 Seconds ago</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                                <div class="notify-text">
                                                    <p>Some special like you</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                                <div class="notify-text">
                                                    <p>New Commetns On Post</p>
                                                    <span>30 Seconds ago</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                                <div class="notify-text">
                                                    <p>Some special like you</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                                <div class="notify-text">
                                                    <p>You have Changed Your Password</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                                <div class="notify-text">
                                                    <p>You have Changed Your Password</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown">
                                    <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>
                                    <div class="dropdown-menu notify-box nt-enveloper-box">
                                        <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                        <div class="nofity-list">
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb">
                                                    <img src="{{url('dashboard/assets/images/author/author-img1.jpg')}}" alt="image">
                                                </div>
                                                <div class="notify-text">
                                                    <p>Aglae Mayer</p>
                                                    <span class="msg">Hey I am waiting for you...</span>
                                                    <span>3:15 PM</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb">
                                                    <img src="{{url('dashboard/assets/images/author/author-img2.jpg')}}" alt="image">
                                                </div>
                                                <div class="notify-text">
                                                    <p>Aglae Mayer</p>
                                                    <span class="msg">When you can connect with me...</span>
                                                    <span>3:15 PM</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb">
                                                    <img src="{{url('dashboard/assets/images/author/author-img3.jpg')}}" alt="image">
                                                </div>
                                                <div class="notify-text">
                                                    <p>Aglae Mayer</p>
                                                    <span class="msg">I missed you so much...</span>
                                                    <span>3:15 PM</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb">
                                                    <img src="{{url('dashboard/assets/images/author/author-img4.jpg')}}" alt="image">
                                                </div>
                                                <div class="notify-text">
                                                    <p>Aglae Mayer</p>
                                                    <span class="msg">Your product is completely Ready...</span>
                                                    <span>3:15 PM</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb">
                                                    <img src="{{url('dashboard/assets/images/author/author-img2.jpg')}}" alt="image">
                                                </div>
                                                <div class="notify-text">
                                                    <p>Aglae Mayer</p>
                                                    <span class="msg">Hey I am waiting for you...</span>
                                                    <span>3:15 PM</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb">
                                                    <img src="{{url('dashboard/assets/images/author/author-img1.jpg')}}" alt="image">
                                                </div>
                                                <div class="notify-text">
                                                    <p>Aglae Mayer</p>
                                                    <span class="msg">Hey I am waiting for you...</span>
                                                    <span>3:15 PM</span>
                                                </div>
                                            </a>
                                            <a href="#" class="notify-item">
                                                <div class="notify-thumb">
                                                    <img src="{{url('dashboard/assets/images/author/author-img3.jpg')}}" alt="image">
                                                </div>
                                                <div class="notify-text">
                                                    <p>Aglae Mayer</p>
                                                    <span class="msg">Hey I am waiting for you...</span>
                                                    <span>3:15 PM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix d-md-inline-block d-block">
                            <div class="user-profile m-0">
                                <img class="avatar user-thumb" src="{{url('dashboard/assets/images/author/avatar.png')}}" alt="avatar">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{$nama}} <i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <a class="dropdown-item" href="{{route('keluar')}}">Keluar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header area end -->
        <!-- header area start -->
        <div class="header-area header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9  d-none d-lg-block">
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu">
                                    <li>
                                        <a href="{{url('kecamatan/')}}"><i class="ti-home"></i><span>Beranda</span></a>
                                    </li>
                                    {{--
                                    <li>
                                        <a href="javascript:void(0)"><i class="ti-book"></i><span>Data</span></a>
                                        <ul class="submenu">
                                            <li><a href="#">Data Masuk</a></li>
                                            <li><a href="#">Data Dibuang</a></li>
                                        </ul>
                                    </li> --}}
                                    <li>
                                        <a href="javascript:void(0)"><i class="ti-id-badge"></i><span>Data Pelayanan</span></a>
                                        <ul class="submenu">
                                            @foreach ($pelayanan as $pelayanan)
                                            <li><a href="pelayanan/{{$pelayanan['slug']}}">{{$pelayanan['pelayanan']}}
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{url('kecamatan/akun')}}"><i class="ti-user"></i><span> Akun Admin</span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><i class="ti-settings"><span> Pengaturan</span></i></a>
                                                <ul class="submenu">
                                                    <li><a href="{{url('kecamatan/pelayanan')}}">Pelayanan</a></li>
                                                    <li><a href="grid.html">grid system</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- mobile_menu -->
                    <div class="col-12 d-block d-lg-none">
                        <div id="mobile_menu"></div>
                    </div>
                </div>
            </div>
        </div>
        @yield('konten')
        <footer>
            <div class="footer-area">
                <p>© Sistem Informasi Pelayanan Publik Online ( SIPPOL ) Kecamatan Pemalang Tahun {{date("Y")}}</p>
            </div>
        </footer>
    </div>
    {{--
    <script src="{{url('js/app.js')}}"></script> --}}
    <script src="{{url('dashboard/assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{url('dashboard/assets/js/popper.min.js')}}"></script>
    <script src="{{url('dashboard/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('dashboard/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('dashboard/assets/js/metisMenu.min.js')}}"></script>
    <script src="{{url('dashboard/assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{url('dashboard/assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="{{url('dashboard/assets/js/line-chart.js')}}"></script>
    <!-- all pie chart -->
    <script src="{{url('dashboard/assets/js/pie-chart.js')}}"></script>
    <!-- all bar chart -->
    <script src="{{url('dashboard/assets/js/bar-chart.js')}}"></script>
    <!-- all map chart -->
    <script src="{{url('dashboard/assets/js/maps.js')}}"></script>
    <!-- others plugins -->
    <script src="{{url('dashboard/assets/js/plugins.js')}}"></script>
    <script src="{{url('dashboard/assets/js/scripts.js')}}"></script>
    @yield('js')
</body>

</html>