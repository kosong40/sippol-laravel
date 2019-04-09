@extends('layout.admin') 
@section('konten') 
@foreach ($layanan as $layanan) 
{{-- bagian title --}} 
@section('judul') Data
{{$layanan->pelayanan}}
@endsection
 {{-- bagian konten utama --}}
<div class="main-content-inner">
  <div style="margin-bottom:15px">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{url('kecamatan/')}}"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="{{url('kecamatan/layanan')}}"><i class="fa fa-info"></i> Data Layanan</a></li>
        <li><a href="#">{{$layanan->pelayanan}}</a></li>
      </ol>
    </section>
  </div>
  <div class="container-fluid">
    <div style="margin-bottom:30px">
      <h3 align="center">{{$layanan->pelayanan}}</h3>
    </div>
    @if (count($sublayanan) == 0) 
    <div class="box box-danger">
        <div class="box-body with-border">
        <table class="table  table-hover table-condensed" id="layanan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemohon</th>
                    <th>Desa / Kelurahan</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>
        </table>
        </div>
    </div>
    @else
    <div class="row">
      <div class="col-sm-9">
        <p>
          Terdapat {{count($sublayanan)}} sublayanan dari {{ $layanan->pelayanan }}, pilih salah satu sublayanan dari {{ $layanan->pelayanan
          }} untuk dilihat datanya
        </p>
      </div>
      <div class="col-sm-3">
        <ul class="list-group">
          <li class="list-group-item active">Sublayanan {{ $layanan->pelayanan }}</li>
          @foreach ($sublayanan as $item)
          <li class="list-group-item"><a href="#" data-toggle="tab">{{$item['subpelayanan']}} <small class="label pull-right bg-green">{{$pemohon->where('sublayanan_id',$item->id)->count()}} </small></a></li>
          @endforeach
        </ul>
      </div>
    </div>
    @endif
  </div>
</div>
@endforeach
@endsection
 
@section('css')
<link rel="stylesheet" href="{{url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
 
@section('js')
<script src="{{url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(function () {
    $('#layanan').DataTable({
            "processing"    :true,
            "serverSide"    :true,
            "ajax"          : "{{url('api/layanan/'.$layanan->slug)}}",
            "columns"       :[
                    {"data" : "DT_RowIndex"},
                    {"data" : "nama"},
                    {"data" : "nama_daerah"},
                    {'data' : 'status'},
                    {"data" : "action","orderable": false, "searchable": false}
            ]
        });
    });

</script>
@endsection
