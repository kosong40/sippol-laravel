@extends('layout.admin') 
@section('konten') @foreach ($sublayanan as $item)
<div class="main-content-inner">
    <div style="margin-bottom:15px">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-wrench"></i> Pengaturan</a></li>
                <li><a href="{{url('kecamatan/pelayanan')}}">Pelayanan</a></li>
                @foreach ($pelayanan as $pelayanan)
                <li><a href="{{url('kecamatan/pelayanan/'.$pelayanan['slug'])}}">{{$pelayanan['pelayanan']}}</a></li>
                @endforeach
                <li class="active">{{$item['subpelayanan']}}</li>
            </ol>
        </section>
    </div>
    <div class="container-fluid">

        <h2 align="center">{{$item['subpelayanan']}}</h2>
         <center>
            <button class="btn btn-warning" id="tombol-edit">Ubah Informasi</button>
            <button class="btn btn-danger" id="tombol-tutup">Tutup Form</button>
        </center>
        <div class="row">
            <div class="col-sm-6">
                <h3 align="center">Informasi</h3>
                {!!$pelayanan->keterangan!!}
                {!!$item->keterangan!!}
            </div>
            <div id="form" class="col-sm-6">
                <h3 align="center">Ubah Informasi Pelayanan</h3>
                    
                    <form action="{{url('/kecamatan/sublayanan/ubah/'.$item->slug)}}" method="post">
                        <textarea id="editor1" name="posting" rows="10" cols="80" required>{!!$item->keterangan!!}</textarea>
                        @csrf
                        <input type="submit" value="Simpan" class="form-control btn btn-danger">
                    </form>
            </div>
        </div>
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
    $(function () {
        $('#layanan').DataTable();
    });
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
 
@section('judul',$item['subpelayanan'])