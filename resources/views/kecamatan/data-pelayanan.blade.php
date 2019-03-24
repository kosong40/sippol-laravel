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
        @foreach ($pelayanan as $item)
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h4 align="center">{{$item['pelayanan']}}</h4>
                        <h5 align="center">Total data :</h5>
                    </div>
                <a href="{{url('/kecamatan/layanan/'.$item['slug'])}}" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        
        </div>
        @endforeach
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