@php
    $tanggal = $item->created_at;
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
                        <strong> Keperluan Bangunan:</strong>
                        <p class="text-muted">
                            {{$item->keperluan_bangunan}}
                        </p>
                        <strong> Letak Bangunan:</strong>
                        <p class="text-muted">
                            {{$item->letak_bangunan}}
                        </p>
                        <strong> Luas Bangunan:</strong>
                        <p class="text-muted">
                            {{$item->luas_bangunan}} M<sup>2</sup>
                        </p>
                        <strong> Luas Tanah:</strong>
                        <p class="text-muted">
                            {{$item->luas_tanah}} M<sup>2</sup>
                        </p>
                        <strong> Pemilik Tanah:</strong>
                        <p class="text-muted">
                            {{$item->tanah_milik}}
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <strong> Scan KTP:</strong>
                        <p class="text-muted">
                            <a href="#a" class="btn btn-info btn-xs" data-toggle="modal">Lihat</a>
                        </p>
                        <strong> Scan Surat Persetujuan dari Tetangga:</strong>
                        <p class="text-muted">
                            <a href="#b" class="btn btn-info btn-xs" data-toggle="modal">Lihat</a>
                        </p>
                        <strong> Scan Kepemilikan Tanah:</strong>
                        <p class="text-muted">
                            <a href="#c" class="btn btn-info btn-xs" data-toggle="modal">Lihat</a>
                        </p>
                        <strong> Scan SPPT PBB Terakhir:</strong>
                        <p class="text-muted">
                            <a href="#d" class="btn btn-info btn-xs" data-toggle="modal">Lihat</a>
                        </p>
                        <strong> Gambar Rencana Bangunan:</strong>
                        <p class="text-muted">
                            <a href="#e" class="btn btn-info btn-xs" data-toggle="modal">Lihat</a>
                        </p>
                        <strong> Scan Pernyataan:</strong>
                        <p class="text-muted">
                            <a href="#f" class="btn btn-info btn-xs" data-toggle="modal">Lihat</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="a" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <img class="img-thumbnail" src="{{url("$item->scan_ktp")}}" >
        </div>          
    </div>
</div>
<div id="b" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <img class="img-thumbnail" src="{{url("$item->scan_persetujuan_tetangga")}}" >
        </div>          
    </div>
</div>
<div id="c" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <img class="img-thumbnail" src="{{url("$item->scan_fc_kepemilikan_tanah")}}" >
        </div>          
    </div>
</div>
<div id="d" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <img class="img-thumbnail" src="{{url("$item->scan_fc_sppt_pbb_terakhir")}}" >
        </div>          
    </div>
</div>
<div id="e" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <img class="img-thumbnail" src="{{url("$item->scan_gambar_rencana")}}" >
        </div>          
    </div>
</div>
<div id="f" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <img class="img-thumbnail" src="{{url("$item->scan_pengantar")}}" >
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
                <form action="{{route('no_sk',[$id->pemohon_id,$item->slug])}}" method="post">
            @endforeach
                    @csrf
                    <div class="form-group">
                        <label for="" class="label-control">No Surat Keputusan Izin Mendirikan Bangunan</label>
                        <br>
                        <b>NOMOR :
                        <input type="text" readonly  name="no_sk[]" value="503.4" style="width:50px !important"> / 
                        <input type="text" name="no_sk[]" style="width:50px !important"> /
                        <input type="text" readonly  name="no_sk[]" value="B" style="width:50px !important">/
                        <input type="text" readonly  name="no_sk[]" value="{{date('Y')}}" style="width:50px !important">
                        </b>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>          
    </div>
</div>