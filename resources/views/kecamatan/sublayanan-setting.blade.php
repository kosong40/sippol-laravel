@extends('layout.admin') 
@section('konten') @foreach ($sublayanan as $item)
<div class="main-content-inner">
    <div style="margin-bottom:15px">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-wrench"></i> Pengaturan</a></li>
                <li><a href="{{url('kecamatan/pelayanan')}}">Pelayanan</a></li>
                @foreach ($pelayanan as $pelayanan)
                <li><a href="{{url('kecamatan/pelayanan/'.$pelayanan['slug'])}}">{{$pelayanan['pelayanan']}}</a></li>
                @endforeach
                <li class="active">{{$item['subpelayanan']}}</li>
            </ol>
        </section>
    </div>
    <div class="container-fluid">

        <h2 align="center">{{$item['subpelayanan']}}</h2>

    </div>
</div>
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
        $('#layanan').DataTable();
    });

</script>
@endsection
 
@section('judul',$item['subpelayanan'])