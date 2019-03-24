@extends('layout.desa') 
@section('konten')
<div class="main-content-inner">
    <div class="container-fluid">
        <h1 align="center">Selamat Datang {{str_replace("Admin","Admin ",$username)}}</h1>
        <div class="row">

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