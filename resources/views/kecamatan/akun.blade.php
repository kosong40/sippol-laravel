@extends('layout.admin') 
@section('konten')
<div class="main-content-inner">
    <div class="container">
        <h2 align="center">Halaman Akun</h2>
        @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            <p align="center">{{session('sukses')}}</p>
        </div>
        @elseif(session('gagal'))
        <div class="alert alert-danger" role="alert">
            <p align="center">{{session('gagal')}}</p>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 mt-5 mb-3">
                <h4 align="center">Daftar Akun Desa dan Kelurahan</h4>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <br>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="akunAdmin">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Desa/Kelurahan</th>
                            <th>Kepala Desa/Keluarahan</th>
                            <th>Username Admin</th>
                            <th>Nama Admin</th>
                            <th>Kontak Admin</th>
                            <th>Email Admin</th>
                            <th>Atur</th>
                        </tr>
                    </thead>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach($akun as $data)
    <div class="modal fade" id="add{{$data['nama_daerah']}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Akun {{$data['nama_daerah']}}</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('AddAdminDesa')}}" method="POST">
                        <div class="form-group">
                            <label for="" class="label-control">Username</label>
                            <input type="text" value="Admin{{$data['nama_daerah']}}" readonly name="username" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Nama Admin</label>
                            <input type="text" value="" name="nama" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Kontak Admin</label>
                            <input type="text" value="" name="kontak" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Email Admin</label>
                            <input type="email" value="" name="email" id="" class="form-control">
                        </div>
                        @csrf
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit{{$data['nama_daerah']}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Akun {{$data['nama_daerah']}}</h4>
                </div>
                <div class="modal-body">
                    <form action="{{url('/kecamatan/akun/edit/'.$data['username'])}}" method="POST">
                        <div class="form-group">
                            <label for="" class="label-control">Username</label>
                            <input type="text" value="Admin{{$data['nama_daerah']}}" readonly name="username" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Nama Admin</label>
                            <input type="text" value="{{$data['nama']}}" name="nama" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Kontak Admin</label>
                            <input type="text" value="{{$data['kontak']}}" name="kontak" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control">Email Admin</label>
                            <input type="email" value="{{$data['email']}}" name="email" id="" class="form-control">
                        </div>
                        @csrf
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{url('kecamatan/akun/resetpass/'.$data['username'])}}" class="btn btn-warning">Reset Password</a>
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
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
<script src="{{url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(function () {
        $('button').click(function(){
            console.log('hall')
        });
        $('#akunAdmin').DataTable({
            "processing"    : true,
            "serverSide"    : true,
            "ajax"          : "{{url('api/akunpage')}}",
            "buttons"       :[
                'print'
            ],
            "columns"       :[
                {"data" : "DT_RowIndex"},
                {"data" : "nama_daerah"},
                {"data" : "kepala_daerah"},
                {"data" : "username"},
                {"data" : "nama"},
                {"data" : "kontak"},
                {"data" : "email"},
                {"data" : "action","classname":"tambah","orderable":false,"searchable":false }
            ]
        });
    });
</script>
@endsection
 
@section('judul','Pengaturan Akun Admin')