@php
    $tanggal = $item->created_at;
    switch(date("m",strtotime($item->tanggal_akhir))){
        case '01':$bulan2 = "Januari";break;
        case '02':$bulan2 = "Februari";break;
        case '03':$bulan2 = "Maret";break;
        case '04':$bulan2 = "April";break;
        case '05':$bulan2 = "Mei";break;
        case '06':$bulan2 = "Juni";break;
        case '07':$bulan2 = "Juli";break;
        case '08':$bulan2 = "Agustus";break;
        case '09':$bulan2 = "Spetember";break;
        case '10':$bulan2 = "Oktober";break;
        case '11':$bulan2 = "November";break;
        case '12':$bulan2 = "Desember";break;
    }
    switch(date("m",strtotime($item->tanggal_awal))){
        case '01':$bulan = "Januari";break;
        case '02':$bulan = "Februari";break;
        case '03':$bulan = "Maret";break;
        case '04':$bulan = "April";break;
        case '05':$bulan = "Mei";break;
        case '06':$bulan = "Juni";break;
        case '07':$bulan = "Juli";break;
        case '08':$bulan = "Agustus";break;
        case '09':$bulan = "Spetember";break;
        case '10':$bulan = "Oktober";break;
        case '11':$bulan = "November";break;
        case '12':$bulan = "Desember";break;
    }
     switch(date("m",strtotime($tanggal))){
        case '01':$m = "Januari";break;
        case '02':$m = "Februari";break;
        case '03':$m = "Maret";break;
        case '04':$m = "April";break;
        case '05':$m = "Mei";break;
        case '06':$m = "Juni";break;
        case '07':$m = "Juli";break;
        case '08':$m = "Agustus";break;
        case '09':$m = "Spetember";break;
        case '10':$m = "Oktober";break;
        case '11':$m = "November";break;
        case '12':$m = "Desember";break;
    }
@endphp
@if (session('sukses'))
    <div class="alert alert-success">
        <p class="text-center">{{ session('sukses') }}</p>
    </div>
@endif
<div style="padding-bottom:20px">
    <a class="btn btn-danger btn-xs" href="{{url('kecamatan/layanan/'.$item->slug)}}"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
    @if($item->no_sk == "" && $item->status == "Belum")
    <a href="#addNo" class="btn btn-success btn-xs" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Tambahkan Nomor Surat Keputusan</a>
    @else

    @endif
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Tentang Pemohon</h3>
            </div>
            <div class="box-body">
                <strong> Pemohonan:</strong>
                <p class="text-muted">
                    {{$item->pelayanan}}
                </p>
                <strong> Nama:</strong>
                <p class="text-muted">
                    {{$item->nama}}
                </p>
                <strong> NIK:</strong>
                <p class="text-muted">
                    {{$item->nik}}
                </p>
                <strong> Alamat:</strong>
                <p class="text-muted">
                    RT: {{$item->rt}} RW: {{$item->rw}} {{$item->jalan}} {{$item->jenis_daerah}} {{$item->nama_daerah}} <br> Kecamatan Pemalang, Kabupaten Pemalang
                </p>
                <strong> No. Telepon:</strong>
                <p class="text-muted">
                    {{$item->telepon}}
                </p>
                <strong> Pekerjaan:</strong>
                <p class="text-muted">
                    {{$item->pekerjaan}}
                </p>
                <strong> Diajukan pada:</strong>
                <p class="text-muted">
                    {{date('d',strtotime($tanggal))}}-{{$m}}-{{date('Y H:i',strtotime($tanggal))}}
                </p>
            </div>
        </div>
    </div> {{-- end div col 3 --}}
    <div class="col-sm-8">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Data Permohonan</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6">
                        <strong> Jenis Reklame:</strong>
                        <p class="text-muted">
                            {{$item->jenis_reklame}}
                        </p>
                        <strong> Banyak Reklame:</strong>
                        <p class="text-muted">
                            {{$item->banyak}}
                        </p>
                        <strong> Pesan Produk Reklame:</strong>
                        <p class="text-muted">
                            {{$item->pesan_produk}} 
                        </p>
                        <strong> Masa Berlaku :</strong>
                        <p class="text-muted">
                            Tanggal {{date('d',strtotime($item->tanggal_awal))}} {{$bulan}} {{date('Y',strtotime($item->tanggal_awal))}}
                            s/d {{date('d',strtotime($item->tanggal_akhir))}} {{$bulan2}} {{date('Y',strtotime($item->tanggal_akhir))}}
                        </p>
                        <strong> Tempat Pemasangan Reklame:</strong>
                        <p class="text-muted">
                            {{$item->tempat_reklame}}
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <strong> Scan KTP:</strong>
                        <p class="text-muted">
                            <a href="{{url("$item->scan_ktp")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                        </p>
                        <strong> Scan NPWP:</strong>
                        <p class="text-muted">
                            <a href="{{url("$item->scan_npwp")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                        </p>
                        <strong> Contoh Reklame:</strong>
                        <p class="text-muted">
                            <a href="{{url("$item->contoh_reklame")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                        </p>
                        <strong> Scan Persetujuan:</strong>
                        <p class="text-muted">
                            <a href="{{url("$item->scan_persetujuan")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                        </p>
                        <strong>Scan Izin Lama (bila ada):</strong>
                        <p class="text-muted">
                            <a href="{{url("$item->scan_izin_lama")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                        </p>
                        <strong> Scan Surat Pengantar:</strong>
                        <p class="text-muted">
                            <a href="{{url("$item->scan_pengantar")}}" class="btn btn-info btn-xs" target="_blank">Lihat</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="addNo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            @foreach($id as $id)
                <form action="{{route('no_sk',[$item->kode,$id->pemohon_id,$item->slug])}}" method="post">
            @endforeach
                    @csrf
                    <div class="form-group">
                        <label for="" class="label-control">No Surat Keputusan Izin Mendirikan Bangunan</label>
                        <br>
                        <b>NOMOR :
                        <input type="text" readonly  name="no_sk[]" value="503.12" style="width:50px !important"> / 
                        <input type="text" name="no_sk[]" style="width:50px !important"> /
                        <input type="text" readonly  name="no_sk[]" value="R" style="width:50px !important">/
                        <input type="text" readonly  name="no_sk[]" value="{{date('Y')}}" style="width:50px !important">
                        </b>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>          
    </div>
</div>