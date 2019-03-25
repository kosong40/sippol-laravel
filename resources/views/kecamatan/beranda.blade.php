@extends('layout.admin') 
@section('konten')
<div class="main-content-inner">
    <div class="container-fluid">
        <div class="row">
            
        </div>
    </div>
</div>
<!-- main content area end -->
@endsection
 
@section('judul','Dashboard Admin Kecamatan') 
@section('css')
<link rel="stylesheet" href="{{url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('js')
<script src="{{url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#pelayanan').DataTable({
            
        })
    });
</script>
@endsection