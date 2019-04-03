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
                <label for="" class="label-control">Jenis Reklame</label>
                <input type="text" class="form-control" name="jenis_reklame">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Banyaknya</label>
                <input type="text" class="form-control" name="banyak">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Pesan Produk</label>
                <input type="text" class="form-control" name="pesan_produk">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Masa Berlaku</label>
            </div>
           <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="label-control">Tanggal Awal</label>
                        <input type="date" class="form-control"  name="tanggal_awal">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="label-control">Tanggal Akhir</label>
                        <input type="date" class="form-control"  name="tanggal_akhir">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="label-control">Tempat Pemasangan Reklame</label>
                <input type="number" class="form-control" name="tempat_reklame">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan KTP</label>
                <input type="file" class="form-control" name="ktp">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan NPWP</label>
                <input type="file" class="form-control" name="scan_npwp">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan Contoh Reklame</label>
                <input type="file" class="form-control" name="contoh_reklame">
            </div>
             <div class="form-group">
                <label for="" class="label-control">Scan Persetujuan Pemasangan Reklame</label>
                <input type="file" class="form-control" name="scan_fc_sppt_pbb_terakhir">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan Izin Reklame Sebelumnya (apabila perpanjangan)</label>
                <input type="file" class="form-control" name="scan_izin_lama">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan Pengantar Izin Reklame dari {{$daerah->jenis_daerah}}</label>
                <input type="file" class="form-control" name="scan_pengantar">
            </div>
            <div class="form-group">
                <input type="submit" value="Proses" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
