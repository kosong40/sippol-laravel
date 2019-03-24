<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Halaman Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Informasi Pelayanan Publik Online Kecamatan Pemalang">
    <meta name="author" content="Muchammad Dwi Cahyo Nugroho">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/slicknav.min.css')}}">
    <link rel="icon" type="image/png" href="{{url('img/logo_pemalang_lg.png')}}" sizes="32x32">
    <!-- amchart css -->
    {{--
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" /> --}}
    <!-- others css -->
    <link rel="stylesheet" href="{{url('dashboard/assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{url('dashboard/assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{url('dashboard/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-bg">
        <div class="container">
            <div class="login-box ptb--100">

                <form method="post" action="{{url('/login')}}">
                    <div class="login-form-head">
                        <h4>Login Admin SIPPOL</h4>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" id="exampleInputEmail1">
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Kata Sandi</label>
                            <input type="password" name="password" id="exampleInputPassword1">
                            <a onclick="show()" href="#"><i class="ti-lock"> </i></a>
                        </div>
                        @csrf
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Masuk <i class="ti-arrow-right"></i></button>
                        </div>
                        @if (session('gagal'))
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <p align="center">{{session('gagal')}}</p>
                        </div>
                        @endif
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->

    <script src="{{url('dashboard/assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{url('dashboard/assets/js/popper.min.js')}}"></script>
    <script src="{{url('dashboard/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('dashboard/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('dashboard/assets/js/metisMenu.min.js')}}"></script>
    <script src="{{url('dashboard/assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{url('dashboard/assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- others plugins -->
    <script src="{{url('dashboard/assets/js/plugins.js')}}"></script>
    <script src="{{url('dashboard/assets/js/scripts.js')}}"></script>
    <script>
        function show(){
            var x = document.getElementById("exampleInputPassword1");
            if(x.type == "password"){
                x.type = "text";
            }else{
                x.type = "password";
            }
        }
    </script>
</body>

</html>