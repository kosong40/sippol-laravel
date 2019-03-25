@extends('layout.admin') 
@section('konten')
<div class="main-content-inner">
    <div style="margin-bottom:35px">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="{{url('kecamatan/')}}"><i class="fa fa-home"></i> Beranda</a></li>
                <li><a href="#"><i class="fa fa-wrench"></i> Pengaturan</a></li>
                <li class="active"> Pelayanan</li>
            </ol>
        </section>
    </div>
    <div class="container thumbnail">
    <h3 align="center">Halaman Pengaturan Pelayanan</h3>
        <table class="table  table-hover table-condensed" id="layanan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pelayanan</th>
                    <th>Jenis Pelayanan</th>
                    <th>Atur</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
 
@section('css')
<link rel="stylesheet" href="{{url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
 
@section('js')
<script src="{{url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(function () {
        $('#layanan').DataTable({
            "processing"    :true,
            "serverSide"    :true,
            "ajax"          : "{{url('api/pelayananlist')}}",
            "columns"       :[
                    {"data" : "id"},
                    {"data" : "pelayanan"},
                    {"data" : "jenis_pelayanan"},
                    {"data" : "action","orderable": false, "searchable": false}
            ]
        });
    });

</script>
@endsection
 
@section('judul','Pengaturan Pelayanan')