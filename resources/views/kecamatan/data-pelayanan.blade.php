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
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-4">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$dataSetuju}}</h3>
                        <p>Data siap cetak</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-print"></i>
                    </div>
                    <a href="" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$dataPrint}}</h3>
                        <p>Belum disetujui</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-refresh"></i>
                    </div>
                    <a href="" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{$dataBelum}}</h3>
                        <p>Belum ada No. SK</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document"></i>
                    </div>
                    <a href="" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
    <ul class="list-group">
        <li class="list-group-item active">Daftar Pelayanan</li>
        @foreach ($pelayanan as $item)
            <li class="list-group-item"><a href="{{url('/kecamatan/layanan/'.$item['slug'])}}">{{$item->pelayanan}} 
            <small class="label pull-right bg-green">{{$pemohon->where('pelayanan_id',$item->id)->count()}}</small>
            </a></li>
        @endforeach
    </ul>
    </div> {{-- end div col3--}}
        
    </div>
    </div>
</div>
</div>
<!-- main content area end -->
@endsection
 
@section('judul','Data Layanan') 
@section('css')

@endsection
@section('js')

@endsection