@extends('layout.admin') 
@section('konten')
@foreach($admin as $admin)
<div class="main-content-inner">
    <div class="container-fluid">
        <section class="content-header">
            <h1>
                Halaman Pengaturan Profil
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('kecamatan')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li>Pengaturan</li>
                <li class="active">Profil</li>
            </ol>
        </section>
        <section class="content">
        @if (session('sukses'))
            <div class="alert alert-success">
                <p class="text-center">{{ session('sukses') }}</p>
            </div>
        @endif
            <div class="row">
                <div class="col-sm-3">
                    <div class="box box-danger">
                        <div class="box-body box-profile">
                            <h3 class="profile-username text-center">{{$admin->nama}}</h3>
                            <p class="text-muted text-center">Admin :  {{str_replace('Admin','',$admin->username)}}</p>
                        </div>
                    </div>
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tentang Saya</h3>
                        </div>
                        <div class="box-body">
                            <strong><i class="fa fa-user margin-r-5"></i> Username</strong>
                            <p class="text-muted">
                                {{$admin->username}}
                            </p>
                            <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                            <p class="text-muted">
                                 {{$admin->email}}
                            </p>
                            <strong><i class="fa fa-envelope margin-r-5"></i> No. Telepon</strong>
                            <p class="text-muted">
                                 {{$admin->kontak}}
                            </p>
                        </div>
                    </div>
                 </div> {{-- end div col 3 --}}
                <div class="col-sm-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#profil" data-toggle="tab">Akun</a></li>
                            <li><a href="#password" data-toggle="tab">Password</a></li>
                            <li><a href="#info" data-toggle="tab">Info Kecamatan</a></li>
                        </ul> {{--end list tabs--}}
                        <div class="tab-content">
                            <div class="active tab-pane" id="profil">
                                <h4 class="text-center">Profil Admin</h4>
                                <div>
                                    <form action="{{url('kecamatan/profil/akun')}}" method="post" class="form-horizontal">
                                        @csrf
                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label">Username </label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly name="username" value="{{$admin->username}}" id="username" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama" class="col-sm-2 control-label">Nama </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama" value="{{$admin->nama}}" id="nama" class="form-control">
                                            
                                            @if($errors->get('nama'))
                                                @foreach ($errors->get('nama') as $pesan)
                                                    <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                                                @endforeach
                                            @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Email </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="email" value="{{$admin->email}}" id="email" class="form-control">
                                            
                                            @if($errors->get('email'))
                                               @foreach ($errors->get('email') as $pesan)
                                                    <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                                                @endforeach
                                            @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kontak" class="col-sm-2 control-label">No. Telepon </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="kontak" value="{{$admin->kontak}}" id="kontak" class="form-control">
                                            
                                            @if($errors->get('kontak'))
                                                @foreach ($errors->get('kontak') as $pesan)
                                                    <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                                                @endforeach
                                            @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="alert alert-warning">
                                                    <h5><i class="icon fa fa-ban"></i> Peringatan!</h5>
                                                    <p>Setelah berhasil mengubah data akun admin, maka akan logout terlebih dahulu dan anda harus login kembali</p>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> {{--end tab profil--}}
                            <div class="tab-pane" id="info">
                                <h4 class="text-center">Informasi Daerah</h4>
                                <div>
                                @foreach ($daerah->where('admin_id',$admin->id) as $daerah )
                                    <form method="post" action="{{url('kecamatan/profil/info/'.$daerah->id)}}" class="form-horizontal">
                                    @csrf
                                        <div class="form-group">
                                            <label for="kontak" class="col-sm-2 control-label">Nama Camat </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="camat" value="{{$daerah->kepala_daerah}}" id="kontak" class="form-control">
                                                @if($errors->get('camat'))
                                                    @foreach ($errors->get('camat') as $pesan)
                                                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kontak" class="col-sm-2 control-label">NIP Camat</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nip" value="{{$daerah->nip}}" id="kontak" class="form-control">
                                                @if($errors->get('nip'))
                                                    @foreach ($errors->get('nip') as $pesan)
                                                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                                </div>
                            </div> {{-- end tab info--}}
                            <div class="tab-pane" id="password">
                                <h4 class="text-center">Password Admin</h4>
                                <div>
                                    <form action="{{url('kecamatan/profil/password')}}" method="post" class="form-horizontal">
                                    @csrf
                                        <div class="form-group">
                                            <label for="kontak" class="col-sm-2 control-label">Password Lama </label>
                                            <div class="col-sm-10">
                                                <input type="password" name="passlama"  id="kontak" class="form-control">
                                                @if($errors->get('passlama'))
                                                    @foreach ($errors->get('passlama') as $pesan)
                                                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                                                    @endforeach
                                                @endif
                                                @if (session('gagal'))
                                                        <li><label for="" style="color:#f56954">{{session('gagal')}}</label></li>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kontak" class="col-sm-2 control-label">Password Baru </label>
                                            <div class="col-sm-10">
                                                <input type="password" name="passbaru"  id="kontak" class="form-control">
                                                @if($errors->get('passbaru'))
                                                    @foreach ($errors->get('passbaru') as $pesan)
                                                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kontak" class="col-sm-2 control-label">Ulangi Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="passulang"  id="kontak" class="form-control">
                                                @if($errors->get('passulang'))
                                                    @foreach ($errors->get('passulang') as $pesan)
                                                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="alert alert-warning">
                                                    <h5><i class="icon fa fa-ban"></i> Peringatan!</h5>
                                                    <p>Setelah berhasil password admin, maka akan logout terlebih dahulu dan anda harus login kembali</p>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> {{-- end tab password--}}
                        </div>
                    </div>
                </div> {{-- end div col 9--}}
            </div>
        </section>
    </div>
</div>
@endforeach
@endsection
 
@section('judul','Pengaturan Admin') 
@section('css')
    <style>
    .nav-tabs-custom>.nav-tabs>li.active {
    border-top-color: #dd4b39 !important;
        }
    </style>
@endsection
@section('js')
<script>

</script>
@endsection