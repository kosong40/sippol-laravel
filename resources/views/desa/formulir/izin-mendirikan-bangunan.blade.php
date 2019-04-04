<div class="box box-solid box-warning">
    <div class="box-header">
        <h3 class="box-title">Formulir</h3>
    </div>
    <div class="box-body" style="height: 670px;overflow-y: scroll;">
        <form action="" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="" class="label-control">Nama Pemohon</label>
                <input type="text" class="form-control" placeholder="Nama Pemohon" name="nik">
            </div>
            <div class="form-group">
                <label for="" class="label-control">NIK</label>
                <input type="text" class="form-control" placeholder="NIK" name="nik">
            </div>
            <div class="form-group">
                <label for="" class="label-control">No. Telepon</label>
                <input type="text" class="form-control" placeholder="Nomor Telepon" name="telepon">
            </div>
            <label for="" class="label-control">Alamat</label>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="label-control">RT</label>
                        <input type="text" class="form-control" placeholder="RT" name="rt">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="label-control">RW</label>
                        <input type="text" class="form-control" placeholder="RW" name="rw">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="label-control">Jalan / Dusun</label>
                        <input type="text" class="form-control" placeholder="Jalan / Dusun " name="jalan">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="label-control">{{$daerah->jenis_daerah}}</label>
                        <input type="text" class="form-control" readonly value="{{$daerah->nama_daerah}}" name="daerah">
                        <input type="hidden" name="id_daerah" value="{{$daerah->id}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="label-control">Keperluan Bangunan</label>
                <input type="text" class="form-control" name="keperluan_bangunan">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Konstruksi Bangunan</label>
                <input type="text" class="form-control" name="konstruksi_bangunan">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Letak Bangunan</label>
                <input type="text" class="form-control" name="konstruksi_bangunan">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Luas Bangunan</label>
                <input type="number" class="form-control" name="luas_bangunan">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Luas Tanah</label>
                <input type="number" class="form-control" name="luas_bangunan">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Pemilik Tanah</label>
                <input type="text" class="form-control" name="pemilik_tanah">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan KTP</label>
                <input type="file" class="form-control" name="ktp">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan Persetujuan Tetangga (bermaterai)</label>
                <input type="file" class="form-control" name="scan_persetujuan_tetangga">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan Bukti Kepemilikan Tanah</label>
                <input type="file" class="form-control" name="scan_fc_kepemilikan_tanah">
            </div>
             <div class="form-group">
                <label for="" class="label-control">Scan SPPT PBB Tahun Terakhir</label>
                <input type="file" class="form-control" name="scan_fc_sppt_pbb_terakhir">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan Gambar Rencana Bangunan</label>
                <input type="file" class="form-control" name="scan_gambar_rencana">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan Pengantar IMB dari {{$daerah->jenis_daerah}}</label>
                <input type="file" class="form-control" name="scan_pengantar">
            </div>
            <div class="form-group">
                <input type="submit" value="Proses" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
