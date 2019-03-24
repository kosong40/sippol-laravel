@extends('layout.desa') 
@section('konten')
<div class="main-content-inner">
    <div class="container-fluid">
        <h2 align="center">Pengaturan</h2>
        <div class="row">
            <div class="col-sm-6">
                <h4 align="center">Pengaturan Informasi Desa</h4>
            </div>
            <div class="col-sm-6">
                <h4 align="center">Pengaturan Akun {{str_replace("Admin","Admin ",$username)}}</h4>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
 
@section('judul','Pengaturan Admin Desa') 
@section('css')
<style>
    #hallo {
        font-size: 30px;
        margin: 0
    }
</style>
@endsection