<div class="box box-solid box-warning">
    <div class="box-header">
        <h3 class="box-title">Formulir</h3>
    </div>
    <div class="box-body" style="height: 670px;overflow-y: scroll;">
        <form action="{{url('desa/formulir/imb')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="" class="label-control">Nama Pemohon</label>
                <input type="text" class="form-control" value="{{ old('nama_pemohon') }}" placeholder="Nama Pemohon" name="nama_pemohon">
                @if($errors->get('nama_pemohon'))
                    @foreach ($errors->get('nama_pemohon') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">NIK</label>
                <input type="text" class="form-control" value="{{ old('nik') }}" placeholder="NIK" name="nik">
                @if($errors->get('nik'))
                    @foreach ($errors->get('nik') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">No. Telepon</label>
                <input type="text" class="form-control" value="{{ old('telepon') }}" placeholder="Nomor Telepon" name="telepon">
                @if($errors->get('telepon'))
                    @foreach ($errors->get('telepon') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <label for="" class="label-control">Alamat</label>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="label-control">RT</label>
                        <input type="text" class="form-control" value="{{ old('rt') }}" placeholder="RT" name="rt">
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
                        <input type="text" class="form-control" value="{{ old('rw') }}" placeholder="RW" name="rw">
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
                        <input type="text" class="form-control" value="{{ old('jalan') }}" placeholder="Jalan / Dusun " name="jalan">
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
                        <input type="hidden" name="daerah_id" value="{{$daerah->id}}">
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
                <label for="" class="label-control">Pekerjaan</label>
                <input type="text" class="form-control" value="{{ old('pekerjaan') }}" name="pekerjaan">
                @if($errors->get('pekerjaan'))
                    @foreach ($errors->get('pekerjaan') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Keperluan Bangunan</label>
                <input type="text" class="form-control" value="{{ old('keperluan_bangunan') }}" name="keperluan_bangunan">
                @if($errors->get('keperluan_bangunan'))
                    @foreach ($errors->get('keperluan_bangunan') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Konstruksi Bangunan</label>
                <input type="text" class="form-control" value="{{ old('konstruksi_bangunan') }}" name="konstruksi_bangunan">
                @if($errors->get('konstruksi_bangunan'))
                    @foreach ($errors->get('konstruksi_bangunan') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Letak Bangunan</label>
                <input type="text" class="form-control" value="{{ old('letak_bangunan') }}" name="letak_bangunan">
                @if($errors->get('letak_bangunan'))
                    @foreach ($errors->get('letak_bangunan') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Luas Bangunan</label>
                <input type="number" class="form-control" value="{{ old('luas_bangunan') }}" name="luas_bangunan">
                @if($errors->get('luas_bangunan'))
                    @foreach ($errors->get('luas_bangunan') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Luas Tanah</label>
                <input type="number" class="form-control" value="{{ old('luas_tanah') }}" name="luas_tanah">
                @if($errors->get('luas_tanah'))
                    @foreach ($errors->get('luas_tanah') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Pemilik Tanah</label>
                <input type="text" class="form-control" value="{{ old('pemilik_tanah') }}" name="pemilik_tanah">
                @if($errors->get('pemilik_tanah'))
                    @foreach ($errors->get('pemilik_tanah') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan KTP</label>
                <input type="file" class="form-control"  name="ktp">
                @if($errors->get('ktp'))
                    @foreach ($errors->get('ktp') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                        <label for="">Mohon untuk Upload kembali</label>
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan Persetujuan Tetangga (bermaterai)</label>
                <input type="file" class="form-control"  name="scan_persetujuan_tetangga">
                @if($errors->get('scan_persetujuan_tetangga'))
                    @foreach ($errors->get('scan_persetujuan_tetangga') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                        <label for="">Mohon untuk Upload kembali</label>
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan Bukti Kepemilikan Tanah</label>
                <input type="file" class="form-control"  name="scan_fc_kepemilikan_tanah">
                @if($errors->get('scan_fc_kepemilikan_tanah'))
                    @foreach ($errors->get('scan_fc_kepemilikan_tanah') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                        <label for="">Mohon untuk Upload kembali</label>
                @endif
            </div>
             <div class="form-group">
                <label for="" class="label-control">Scan SPPT PBB Tahun Terakhir</label>
                <input type="file" class="form-control"  name="scan_fc_sppt_pbb_terakhir">
                @if($errors->get('scan_fc_sppt_pbb_terakhir'))
                    @foreach ($errors->get('scan_fc_sppt_pbb_terakhir') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                        <label for="">Mohon untuk Upload kembali</label>
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan Gambar Rencana Bangunan</label>
                <input type="file" class="form-control"  name="scan_gambar_rencana">
                @if($errors->get('scan_gambar_rencana'))
                    @foreach ($errors->get('scan_gambar_rencana') as $pesan)
                        <li><label for="" style="color:#f56954">{{$pesan}}</label></li>
                    @endforeach
                        <label for="">Mohon untuk Upload kembali</label>
                @endif
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan Pengantar IMB dari {{$daerah->jenis_daerah}}</label>
                <input type="file" class="form-control"  name="scan_pengantar">
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
