@extends('layout.admin') 
@section('konten')
@foreach($layanan as $item)
@section('judul')
    {{$item->nama}} ({{$item->pelayanan}})
@endsection
<div class="main-content-inner">
    <div class="container-fluid">
        <div>
            @include('kecamatan/detail/'.$item->slug)
        </div>
    </div>
</div>
@endforeach
@endsection