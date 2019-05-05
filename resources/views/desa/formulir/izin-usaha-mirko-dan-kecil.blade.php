<div class="box box-solid box-warning">
    <div class="box-header">
        <h3 class="box-title">Formulir</h3>
    </div>
    <div class="box-body" style="height: 670px;overflow-y: scroll;">
        <form action="{{route('formulir_iumk')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="" class="label-control">Nama Pemohon</label>
                <input type="text" class="form-control" placeholder="Nama Pemohon" name="nama_pemohon">
                @if($errors->get('nama_pemohon'))
                    @foreach ($errors->get('nama_pemohon') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">NIK</label>
                <input type="text" class="form-control" placeholder="NIK" name="nik">
                @if($errors->get('nik'))
                    @foreach ($errors->get('nik') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">No. Telepon</label>
                <input type="text" class="form-control" placeholder="Nomor Telepon" name="telepon">
                @if($errors->get('telepon'))
                    @foreach ($errors->get('telepon') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan">
            </div>
            <label for="" class="label-control">Alamat</label>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="label-control">RT</label>
                        <input type="text" class="form-control" placeholder="RT" name="rt">
                        @if($errors->get('rt'))
                            @foreach ($errors->get('rt') as $pesan)
                                <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="label-control">RW</label>
                        <input type="text" class="form-control" placeholder="RW" name="rw">
                        @if($errors->get('rw'))
                            @foreach ($errors->get('rw') as $pesan)
                                <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="label-control">Jalan / Dusun</label>
                        <input type="text" class="form-control" placeholder="Jalan / Dusun " name="jalan">
                        @if($errors->get('jalan'))
                            @foreach ($errors->get('jalan') as $pesan)
                                <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="label-control">{{$daerah->jenis_daerah}}</label>
                        <input type="text" class="form-control" readonly value="{{$daerah->nama_daerah}}" name="daerah">
                        <input type="hidden" name="id_daerah" value="{{$daerah->id}}">
                         <input type="hidden" name="pelayanan_id" value="{{$pelayanan->id}}">
                         @if($errors->get('daerah'))
                            @foreach ($errors->get('daerah') as $pesan)
                                <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="label-control">Nama Usaha</label>
                <input type="text" class="form-control" name="nama_usaha">
                @if($errors->get('nama_usaha'))
                    @foreach ($errors->get('nama_usaha') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Alamat Usaha</label>
                <input type="text" class="form-control" name="alamat_usaha">
                @if($errors->get('alamat_usaha'))
                    @foreach ($errors->get('alamat_usaha') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Kode Pos</label>
                <input type="text" class="form-control" name="kodepos">
                 @if($errors->get('kodepos'))
                    @foreach ($errors->get('kodepos') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Sektor Usaha</label>
                <input type="text" class="form-control" name="sektor_usaha">
                 @if($errors->get('sektor_usaha'))
                    @foreach ($errors->get('sektor_usaha') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Sarana yang digunakan</label>
                <input type="text" class="form-control" name="sarana">
                @if($errors->get('sarana'))
                    @foreach ($errors->get('sarana') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Jumlah Modal Usaha</label>
                <input type="number" class="form-control" name="modal">
                @if($errors->get('modal'))
                    @foreach ($errors->get('modal') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">NPWP</label>
                <input type="text" class="form-control" name="npwp">
                @if($errors->get('npwp'))
                    @foreach ($errors->get('npwp') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Klasifikasi Usaha</label>
                <select name="klasifikasi" class="form-control">
                    <option value="">Pilih Klasifikasi</option>
                    <option value="Kecil">Kecil</option>
                    <option value="Mikro">Mikro</option>
                </select>
                @if($errors->get('klasifikasi'))
                    @foreach ($errors->get('klasifikasi') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan KTP</label>
                <input type="file" class="form-control" name="ktp">
                @if($errors->get('ktp'))
                    @foreach ($errors->get('ktp') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                    <label for="">Mohon untuk Upload kembali</label>
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan KK</label>
                <input type="file" class="form-control" name="scan_kk">
                @if($errors->get('scan_kk'))
                    @foreach ($errors->get('scan_kk') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                        <label for="">Mohon untuk Upload kembali</label>
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan Pengantar Izin Reklame dari {{$daerah->jenis_daerah}}</label>
                <input type="file" class="form-control" name="scan_pengantar">
                @if($errors->get('scan_pengantar'))
                    @foreach ($errors->get('scan_pengantar') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                        <label for="">Mohon untuk Upload kembali</label>
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Pas Foto 4x6</label>
                <input type="file" class="form-control" name="foto">
                @if($errors->get('foto'))
                    @foreach ($errors->get('foto') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                        <label for="">Mohon untuk Upload kembali</label>
                @endif
            </div>
            <div class="form-group">
                <input type="submit" value="Proses" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
