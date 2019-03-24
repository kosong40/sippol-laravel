@extends('layout.admin') 
@section('konten')
<div class="main-content-inner">
    <div style="margin-bottom:15px">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="{{url('kecamatan/')}}"><i class="fa fa-home"></i> Beranda</a></li>
                <li><a href="#"><i class="fa fa-wrench"></i> Pengaturan</a></li>
                <li class="active"> Pelayanan</li>
            </ol>
        </section>
    </div>
    <div class="container">
        <div id="app">
            <daftar-pelayanan></daftar-pelayanan>
        </div>
    </div>
</div>
@endsection
 
@section('css')
<link rel="stylesheet" href="{{url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
 
@section('js')
<script src="{{url('js/app.js')}}"></script>
<script src="{{url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(function () {
        $('#layanan').DataTable();
    });

</script>
@endsection
 
@section('judul','Pengaturan Pelayanan')