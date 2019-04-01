@extends('layout.admin') 
@section('konten')
<div class="main-content-inner">
    <div style="margin-bottom:40px">
        <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{url('kecamatan/')}}"><i class="fa fa-home"></i> Beranda</a></li>
            <li><i class="fa fa-info"></i> Data Layanan</li>
        </ol>
        </section>
    </div>
    <div class="container-fluid">
    <div class="row">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
    <ul class="list-group">
        <li class="list-group-item active">Daftar Pelayanan</li>
        @foreach ($pelayanan as $item)
            <li class="list-group-item"><a href="{{url('/kecamatan/layanan/'.$item['slug'])}}">{{$item->pelayanan}}</a></li>
        @endforeach
    </ul>
    </div>
    
    </div>
    </div>
</div>
</div>
<!-- main content area end -->
@endsection
 
@section('judul','Data Layanan') 
@section('css')
<style>
    #hallo {
        font-size: 30px;
        margin: 0
    }
</style>
@endsection