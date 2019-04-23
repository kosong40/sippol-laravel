@extends('layout.admin') 
@section('konten')
@foreach ($pelayanan as $layanan)
@foreach ($sublayanan as $sublayanan)
@section('judul') Data
{{$layanan->pelayanan}} ({{$sublayanan->subpelayanan}})
@endsection 
@if (session('sukses'))
    <div class="alert alert-success">
        <p class="text-center">{{ session('sukses') }}</p>
    </div>
@endif
<div class="main-content-inner">
    <div style="margin-bottom:15px">
        <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{url('kecamatan/')}}"><i class="fa fa-home"></i> Beranda</a></li>
            <li><a href="{{url('kecamatan/layanan')}}"><i class="fa fa-info"></i> Data Layanan</a></li>
            <li><a href="{{url('kecamatan/layanan/'.$layanan->slug)}}">{{$layanan->pelayanan}}</a></li>
            <li><a href="#">{{$sublayanan->subpelayanan}}</a></li>
        </ol>
        </section>
    </div>
    <div class="container-fluid">
        <div style="margin-bottom:30px">
            <h3 align="center">{{$layanan->pelayanan}} ({{$sublayanan->subpelayanan}})</h3>
        </div>
        <div class="box box-danger">
            <div class="box-body with-border">
                <table class="table  table-hover table-condensed" id="layanan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Surat Keputusan</th>
                            <th>Nama Pemohon</th>
                            <th>Desa / Kelurahan</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach
@endforeach
 

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
            "ajax"          : "{{url('api/layanan/'.$layanan->slug.'/'.$sublayanan->slug)}}",
            "columns"       :[
                    {"data" : "DT_RowIndex"},
                    {"data" : "no_sk"},
                    {"data" : "nama"},
                    {"data" : "nama_daerah"},
                    {'data' : 'status'},
                    {"data" : "action","orderable": false, "searchable": false}
            ]
        });
    });

</script>
@endsection