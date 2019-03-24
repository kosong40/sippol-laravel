@extends('layout.admin') 
@section('konten') 
@foreach ($layanan as $layanan) {{-- bagian title --}} 
@section('judul') Data
{{$layanan->pelayanan}}
@endsection
 {{-- bagian konten utama --}}
<div class="main-content-inner">
  <div style="margin-bottom:15px">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{url('kecamatan/')}}"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="{{url('kecamatan/layanan')}}"><i class="fa fa-info"></i> Data Layanan</a></li>
        <li><a href="#">{{$layanan->pelayanan}}</a></li>
      </ol>
    </section>
  </div>
  <div class="container-fluid">
    <div style="margin-bottom:30px">
      <h3 align="center">{{$layanan->pelayanan}}</h3>
    </div>
    @if (count($sublayanan) == 0) @else
    <div class="row">
      <div class="col-sm-9">
        <p>
          Terdapat {{count($sublayanan)}} sublayanan dari {{ $layanan->pelayanan }}, pilih salah satu sublayanan dari {{ $layanan->pelayanan
          }} untuk dilihat datanya
        </p>
      </div>
      <div class="col-sm-3">
        <ul class="list-group">
          <li class="list-group-item active">Sublayanan {{ $layanan->pelayanan }}</li>
          @foreach ($sublayanan as $item)
          <li class="list-group-item"><a href="#" data-toggle="tab">{{$item['subpelayanan']}}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
    @endif
  </div>
</div>
@endforeach
@endsection
 
@section('css')
@endsection