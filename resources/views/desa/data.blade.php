@extends('layout.desa') 
@section('konten')
<div class="main-content-inner">
    <div class="container-fluid">
        <h1 align="center">Halaman Data Pelayanan</h1>
        <div class="row">
            @foreach ($pelayanan as $layanan)   
                <div class="col-sm-3">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h4>{{$layanan->pelayanan}}</h4>
                            <p>Total data : {{count($pemohon->where('pelayanan_id',$layanan->id))}}</p>
                            <p>Belum ada nomor SK : {{count($pemohon->where('pelayanan_id',$layanan->id)->where('status','Belum'))}}</p>
                            <p>Sudah ada nomor SK : {{count($pemohon->where('pelayanan_id',$layanan->id)->where('status','Sudah ada nomor SK'))}}</p>
                            <p>Siap dicetak : {{count($pemohon->where('pelayanan_id',$layanan->id)->where('status','Setuju'))}}</p>
                        </div>
                        <a href="{{url('desa/data/'.$layanan->slug)}}" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection
 
@section('judul','Dashboard Admin Desa') 
@section('css')
<style>
    #hallo {
        font-size: 30px;
        margin: 0
    }
</style>
@endsection