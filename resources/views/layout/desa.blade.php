<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}"> @yield('css')
    <link rel="stylesheet" href="{{url('adminlte/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{url('adminlte/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{url('adminlte/plugins/pace/pace.min.css')}}">
    <link rel="stylesheet" href="{{url('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <link rel="icon" type="image/png" href="{{url('img/logo_pemalang_lg.png')}}" sizes="32x32">
    <title>@yield('judul')</title>

    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
        }

        #nav-text {
            font-size: 20px;
        }

        #nav-text-small {
            font-size: 15px;
        }

        #img-logo-atas {
            /* width:35%; */
            padding: 10px 10px 10px 60px;
        }

        #text-sispek {
            font-size: 65px;
            color: #555;
        }
    </style>
</head>

<body class="hold-transition skin-green-light layout-top-nav">
    <div class="row" style="background-color:#ddd !important">
        <div class="col-sm-2">
            <img id="img-logo-atas" src="{{url('img/logo_pemalang_lg.png')}}" class="img-responsive">
        </div>
        <div class="col-sm-8">
            <br>
            <center>
                <h1 id="text-sispek"><b>SIPPOL PEMALANG</b></h1>
                <h3 style="color:#777"><b>Sistem Informasi Pelayanan Publik Online <br>Kecamatan Pemalang</b></h3>
                <h5 style="color:#777"><b>Admin : {{str_replace("Admin","",$username)}}</h5>
            </center>
        </div>
    </div>
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="{{url('desa/')}}" id="nav-text" class="navbar-brand"><span class="fa fa-home"></span>&nbsp;Beranda</a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
                    </div>
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{url('desa/data')}}" id="nav-text"><span class="fa fa-file"></span> Data Perlayanan</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="nav-text"><span class="fa fa-info"></span>&nbsp;Formulir Pelayanan<span class="caret"></span></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach ($sidebar as $item)
                                    <li><a href="{{url('desa/formulir/'.$item['slug'])}}"> <i class="fa fa-circle-o"></i>{{$item['pelayanan']}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            
                            <li>
                            <a href="{{url('desa/pengaturan')}}" id="nav-text"><span class="fa fa-wrench"></span>&nbsp;Pengaturan</span></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="nav-text"><span class="fa fa-sign-out"></span>&nbsp;Keluar<span class="caret"></span></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('keluar')}}"><i class="fa fa-check"></i>Ya</a></li>
                                    <li><a href=""><i class="fa fa-remove"></i>Tidak</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('header')
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('konten')
            </section>
            <!-- /.content -->
        </div>
        <footer class="footer">
            <div class="footer-area">
                <p align="center" style="color:black">© Sistem Informasi Pelayanan Publik Online ( SIPPOL ) Kecamatan Pemalang Tahun {{date("Y")}}</p>
            </div>
        </footer>
        <!-- /.content-wrapper -->


        <script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{url('adminlte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>

        <script src="{{url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{url('adminlte/bower_components/moment/min/moment.min.js')}}"></script>
        <script src="{{url('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{url('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
        <script src="{{url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{url('adminlte/dist/js/adminlte.min.js')}}"></script>
        <script src="{{url('adminlte/dist/js/pages/dashboard.js')}}"></script>
        <script src="{{url('adminlte/dist/js/demo.js')}}"></script>
        <script src="{{url('adminlte/bower_components/PACE/pace.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ajaxStart(function () {
    Pace.restart()
  })
  $('.ajax').click(function () {
    $.ajax({
      url: '#', success: function (result) {
        $('.ajax-content').html('<hr>Ajax Request Completed !')
      }
    })
  })
        </script>
        @yield('js')
</body>

</html>