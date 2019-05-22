@extends('layout.admin') 
@section('konten')
@php
$banyak = count($pelayanan);
$banyakD = count($daerah);
@endphp
<div class="main-content-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$hariIni}}</h3>
                        <p>Data Hari Ini</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document"></i>
                    </div>
                    <a href="" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
             <!-- /div data hari ini -->
             <div class="col-sm-3">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{$dataTotal}}</h3>
                        <p>Total Data Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document"></i>
                    </div>
                    <a href="{{url('kecamatan/layanan')}}" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
             <!-- /div total data masuk -->
             <div class="col-sm-3">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$dataAdmin}}</h3>
                        <p>Admin Online</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
             <!-- /div total data masuk -->
             <div class="col-sm-3">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>{{$totalPelayanan}}</h3>
                        <p>Total Pelayanan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{url('kecamatan/pelayanan')}}" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
             <!-- /div total data masuk -->
        <div>
        <!-- /div kotak kotak -->

        </div>
    </div>
    <div class="row">
    <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Data masuk berdasarkan Daerah</h3>
                </div>
                <div class="box-body">
                    <canvas id="bukan"></canvas>
                </div>
            </div>
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
<script src="{{url('js/charts.js')}}"></script>

<script>
var ctx = document.getElementById('bukan').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            @foreach ($daerah as $daerah)
            @php
                $daerah= $daerah['nama_daerah'];
            @endphp
                '{{"$daerah"}}',
                
            @endforeach
        ],
        datasets: [{
            label: 'Banyak',
            data: [
                @foreach ($daer as $item)
                    '{{$pemohon->where("daerah_id",$item->id)->count()}}',
                @endforeach
            ],
            backgroundColor: [
                @for($i=0;$i<$banyakD;$i++)
                    '#{{substr(str_shuffle("abcdef1234567890"),0,6)}}',
                
                @endfor
            ],
            borderColor: [
               @for($i=0;$i<$banyakD;$i++)
                   '#{{substr(str_shuffle("abcdef1234567890"),0,6)}}',
               
               @endfor
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endsection