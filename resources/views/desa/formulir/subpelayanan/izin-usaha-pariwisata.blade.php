@extends('layout.desa') 
@section('konten')
@foreach($pelayanan as $pelayanan)
@foreach($sublayanan as $sub)
@foreach($daerah as $daerah)
<div class="main-content-inner">
    <div class="container-fluid">
       <section class="content-header">
            <h1>
                {{$pelayanan->pelayanan}} ({{$sub->subpelayanan}})
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('desa')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li>Formulir</li>
                <li><a href="{{url('desa/formulir/'.$pelayanan->slug)}}">{{$pelayanan->pelayanan}}</a></li>
                <li class="active">{{$sub->subpelayanan}}</li>
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
                        {!!$sub->keterangan!!}
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                @include('desa/formulir/subpelayanan/'.$sub->slug)
            </div>
        </div>
    </div>
</div>
</div>
@section('judul') 
    {{$pelayanan->pelayanan}} ({{$sub->subpelayanan}})
@endsection
@endforeach
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