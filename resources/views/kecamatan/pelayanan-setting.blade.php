@extends('layout.admin') 
@section('konten') @foreach ($pelayanan as $pelayanan)
<div class="main-content-inner">
    <div style="margin-bottom:15px">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="{{url('kecamatan/')}}"><i class="fa fa-home"></i> Beranda</a></li>
                <li><a href="#"><i class="fa fa-wrench"></i> Pengaturan</a></li>
                <li><a href="{{url('kecamatan/pelayanan')}}">Pelayanan</a></li>
                <li class="active"> {{$pelayanan['pelayanan']}}</li>
            </ol>
        </section>
    </div>
    <div class="container-fluid">

        <h2 align="center">{{$pelayanan['pelayanan']}}</h2>
        @if(count($sublayanan) == 0)
        <h4>Hiya</h4>
        @else
        <div class="row">
            <div class="col-sm-3">
                <ul class="list-group">
                    @foreach ($sublayanan as $item)
                    <li class="list-group-item"><a href="{{url('kecamatan/pelayanan/'.$pelayanan['slug'].'/'.$item['slug'])}}">{{$item['subpelayanan']}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-9"></div>
        </div>
        @endif
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
 
@section('judul',$pelayanan['pelayanan'])