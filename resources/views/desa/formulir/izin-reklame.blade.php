<div class="box box-solid box-warning">
    <div class="box-header">
        <h3 class="box-title">Formulir</h3>
    </div>
    <div class="box-body" style="height: 670px;overflow-y: scroll;">
        <form action="{{route('formulilr_reklame')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="" class="label-control">Nama Pemohon</label>
                <input type="text" class="form-control" value="{{old('nama_pemohon')}}" placeholder="Nama Pemohon" name="nama_pemohon">
                @if($errors->get('nama_pemohon'))
                    @foreach ($errors->get('nama_pemohon') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">NIK</label>
                <input type="text" class="form-control" value="{{old('nik')}}" placeholder="NIK" name="nik">
                @if($errors->get('nik'))
                    @foreach ($errors->get('nik') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">No. Telepon</label>
                <input type="text" class="form-control" value="{{old('telepon')}}" placeholder="Nomor Telepon" name="telepon">
                @if($errors->get('telepon'))
                    @foreach ($errors->get('telepon') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Pekerjaan</label>
                <input type="text" class="form-control" value="{{old('pekerjaan')}}" name="pekerjaan">
            </div>
            <label for="" class="label-control">Alamat</label>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="label-control">RT</label>
                        <input type="text" class="form-control" value="{{old('rt')}}" placeholder="RT" name="rt">
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
                        <input type="text" class="form-control" value="{{old('rw')}}" placeholder="RW" name="rw">
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
                        <input type="text" class="form-control" value="{{old('jalan')}}" placeholder="Jalan / Dusun " name="jalan">
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
                <label for="" class="label-control">Jenis Reklame</label>
                <input type="text" class="form-control" value="{{old('jenis_reklame')}}" name="jenis_reklame">
                @if($errors->get('jenis_reklame'))
                    @foreach ($errors->get('jenis_reklame') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Banyaknya</label>
                <input type="number" class="form-control" value="{{old('banyak')}}" name="banyak">
                @if($errors->get('banyak'))
                    @foreach ($errors->get('banyak') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Pesan Produk</label>
                <input type="text" class="form-control" value="{{old('pesan_produk')}}" name="pesan_produk">
                @if($errors->get('pesan_produk'))
                    @foreach ($errors->get('pesan_produk') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Masa Berlaku</label>
            </div>
           <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="label-control">Tanggal Awal</label>
                        <input type="date" class="form-control" value="{{old('tanggal_awal')}}"  name="tanggal_awal">
                        @if($errors->get('tanggal_awal'))
                            @foreach ($errors->get('tanggal_awal') as $pesan)
                                <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="label-control">Tanggal Akhir</label>
                        <input type="date" class="form-control" value="{{old('tanggal_akhir')}}"  name="tanggal_akhir">
                        @if($errors->get('tanggal_akhir'))
                            @foreach ($errors->get('tanggal_akhir') as $pesan)
                                <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="label-control">Tempat Pemasangan Reklame</label>
                <input type="text" class="form-control" value="{{old('tempat_reklame')}}" name="tempat_reklame">
                @if($errors->get('tempat_reklame'))
                    @foreach ($errors->get('tempat_reklame') as $pesan)
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
                <label for="" class="label-control">Scan NPWP</label>
                <input type="file" class="form-control" name="scan_npwp">
                @if($errors->get('scan_npwp'))
                    @foreach ($errors->get('scan_npwp') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                        <label for="">Mohon untuk Upload kembali</label>
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan Contoh Reklame</label>
                <input type="file" class="form-control" name="contoh_reklame">
                @if($errors->get('contoh_reklame'))
                    @foreach ($errors->get('contoh_reklame') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                        <label for="">Mohon untuk Upload kembali</label>
                @endif
            </div>
             <div class="form-group">
                <label for="" class="label-control">Scan Persetujuan Pemasangan Reklame</label>
                <input type="file" class="form-control" name="scan_persetujuan">
                @if($errors->get('scan_persetujuan'))
                    @foreach ($errors->get('scan_persetujuan') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                        <label for="">Mohon untuk Upload kembali</label>
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan Izin Reklame Sebelumnya (apabila perpanjangan)</label>
                <input type="file" class="form-control" name="scan_izin_lama">
                @if($errors->get('scan_izin_lama'))
                    @foreach ($errors->get('scan_izin_lama') as $pesan)
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
                <input type="submit" value="Proses" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
