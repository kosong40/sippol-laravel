@extends('layout.desa') 
@section('konten')
@foreach($pelayanan as $pelayanan)
@foreach($daerah as $daerah)
<div class="main-content-inner">
    <div class="container-fluid">
       <section class="content-header">
            <h1>
                {{$pelayanan->pelayanan}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('desa')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li>Formulir</li>
                <li class="active">{{$pelayanan->pelayanan}}</li>
            </ol>
        </section>
        @if (session('sukses'))
            <br>
            <div class="alert alert-success" role="alert">
                <p align="center">{{session('sukses')}}</p>
            </div>
        @endif
        <div class="row" style="margin-top:20px">
            <div class="col-sm-5">
                <div class="box box-solid box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Informasi</h3>
                    </div>
                    <div class="box-body">
                        {!!$pelayanan->keterangan!!}
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                @include('desa/formulir/'.$pelayanan->slug)
            </div>
        </div>
    </div>
</div>
</div>
@section('judul') 
    {{$pelayanan->pelayanan}}
@endsection
@endforeach
@endforeach
@endsection

 

@section('css')
<style>
    #hallo {
        font-size: 30px;
        margin: 0
    }
</style>
@endsection