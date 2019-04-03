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
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="label-control">Nama Usaha</label>
                <input type="text" class="form-control" name="nama_usaha">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Alamat Usaha</label>
                <input type="text" class="form-control" name="alamat_usaha">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Kode Pos</label>
                <input type="text" class="form-control" name="kodepos">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Sektor Usaha</label>
                <input type="text" class="form-control" name="sektor_usaha">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Sarana yang digunakan</label>
            </div>
            <div class="form-group">
                <label for="" class="label-control">Jumlah Modal Usaha</label>
                <input type="number" class="form-control" name="tempat_reklame">
            </div>
            <div class="form-group">
                <label for="" class="label-control">NPWP</label>
                <input type="number" class="form-control" name="tempat_reklame">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Klasifikasi Usaha</label>
                <select name="klasifikasi" class="form-control">
                    <option value="">Pilih Klasifikasi</option>
                    <option value="Kecil">Kecil</option>
                    <option value="Mikro">Mikro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan KTP</label>
                <input type="file" class="form-control" name="ktp">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan KK</label>
                <input type="file" class="form-control" name="scan_kk">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan Pengantar Izin Reklame dari {{$daerah->jenis_daerah}}</label>
                <input type="file" class="form-control" name="scan_pengantar">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Pas Foto 4x6</label>
                <input type="file" class="form-control" name="foto">
            </div>
            <div class="form-group">
                <input type="submit" value="Proses" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
