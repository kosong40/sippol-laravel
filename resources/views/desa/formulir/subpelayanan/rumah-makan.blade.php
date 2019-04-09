<div class="box box-solid box-warning">
    <div class="box-header">
        <h3 class="box-title">Formulir</h3>
    </div>
    <div class="box-body" style="height: 670px;overflow-y: scroll;">
        <form action="{{route('formulir_rm')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="" class="label-control">Nama Pemohon</label>
                <input type="text" class="form-control" placeholder="Nama Pemohon" name="nama_pemohon">
            </div>
            <div class="form-group">
                <label for="" class="label-control">NIK</label>
                <input type="text" class="form-control" placeholder="NIK" name="nik">
            </div>
            <div class="form-group">
                <label for="" class="label-control">No. Telepon</label>
                <input type="text" class="form-control" placeholder="Nomor Telepon" name="telepon">
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
                         <input type="hidden" name="pelayanan_id" value="{{$pelayanan->id}}">
                         <input type="hidden" name="sublayanan_id" value="{{$sub->id}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="label-control">Jenis Permohonan</label>
                <select name="jenis" class="form-control" id="jenis_permohonan">
                    <option value="">Pilih Jenis Permohonan</option>
                    <option value="new">Permohonan Baru</option>
                    <option value="du">Daftar Ulang</option>
                    <option value="bn">Balik Nama</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="label-control">Nama Usaha</label>
                <input type="text" name="nama_usaha"  class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Alamat Usaha</label>
                <input type="text" name="alamat_usaha"  class="form-control">
            </div>
            <div class="form-group" id="balik_nama">
                <label for="" class="label-control">Nama Usaha Baru</label>
                <input type="text" name="nama_usaha_baru"  class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan KTP</label>
                <input type="file" class="form-control" name="ktp">
            </div>
            <div class="form-group">
                <label for="" class="label-control">Scan pengantar dari {{$daerah->jenis_daerah}} terkait lokasi usaha</label>
                <input type="file" class="form-control" name="scan_pengantar">
            </div>
            <div class="form-group">
                <input type="submit" value="Proses" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
@section('js')
<script>
    $(document).ready(function(){
        $("#balik_nama").hide('true');
        $('#jenis_permohonan').on('change',function(){
        var optionText = $(this).val();
        if(optionText == "bn"){
            $("#balik_nama").show('true');
        }else{
            $("#balik_nama").hide('true');
        }
    });
    });
</script>
@endsection