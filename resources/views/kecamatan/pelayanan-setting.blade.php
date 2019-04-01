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
        <div style="margin:20px;">
            <center>
            <button class="btn btn-warning" id="tombol-edit">Ubah Informasi</button>
            <button class="btn btn-danger" id="tombol-tutup">Tutup Form</button>
            </center>
        </div>
        @if(count($sublayanan) == 0)
        
        <div class="container-fluid">
            <div class="row">
                <div id="info" class="col-sm-6 col-md-6">
                    
                    <div class="box box-info" >
                        <div class="box-body box-profile">
                            <h3 align="center">Informasi</h3>
                            {!!$pelayanan->keterangan!!}
                        </div>
                    </div>
                </div>
                <div id="form" class="col-sm-6 col-md-6">
                    <h4 align="center">Ubah Informasi Pelayanan</h4>
                    
                    <form action="{{url('/kecamatan/pelayanan/ubah/'.$pelayanan->slug)}}" method="post">
                        <textarea id="editor1" name="posting" rows="10" cols="80" required>{!!$pelayanan->keterangan!!}</textarea>
                        @csrf
                        <input type="submit" value="Simpan" class="form-control btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-sm-2">
                <ul class="list-group">
                    @foreach ($sublayanan as $item)
                    <li class="list-group-item"><a href="{{url('kecamatan/pelayanan/'.$pelayanan['slug'].'/'.$item['slug'])}}">{{$item['subpelayanan']}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div id="info" class="col-sm-5">
                <div style="margin:20px;">
                    <div class="box box-info">
                         <div class="box-body box-profile">
                            <h3 align="center">Informasi</h3>
                            {!!$pelayanan->keterangan!!}
                        </div>
                    </div>
                </div>
            </div>   
            <div id="form" class="col-sm-5">
                    <h4 align="center">Ubah Informasi Pelayanan</h4>
                    
                    <form action="{{url('/kecamatan/pelayanan/ubah/'.$pelayanan->slug)}}" method="post">
                        <textarea id="editor1" name="posting" rows="10" cols="80" required>{!!$pelayanan->keterangan!!}</textarea>
                        @csrf
                        <input type="submit" value="Simpan" class="form-control btn btn-danger">
                    </form>
                </div>
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
<script src="{{ url('adminlte/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('editor1');
    $("#form").hide('true');
    $("#tombol-tutup").hide('true');
    $("#tombol-edit").click(function(){
        $("#form").show('true');
        $("#tombol-tutup").show('true');
        $("#tombol-edit").hide("true")
    });
    $("#tombol-tutup").click(function(){
        $("#tombol-edit").show("true")
        $("#form").hide('true');
        $("#tombol-tutup").hide("true")
    })
</script>
@endsection
 
@section('judul',$pelayanan['pelayanan'])