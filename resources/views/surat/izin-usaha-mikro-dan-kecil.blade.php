<style>
    @media print{
        visibility:hidden;
        body,page{
            margin:0;
            box-shadow:0;
        }
    }
    page{
        background:white;
        display:block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
    }
    page[size="F4"]{
        width:21.6cm;
        height:35.56cm;
        padding: 1cm 2cm 2cm 2cm;
    }
    #tabel{
        font-size:10pt;
    }
    p{
        margin:0;
        margin-bottom:1pt !important;
        font-size:12pt;
    }
    img{
        width:6%
    }
</style>
@foreach ($layanan as $item)
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
    switch(date("m")){
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
@endphp
<body onload="window.print()" style="padding: 1cm 2cm 2cm 2cm">
<div>
            <div style="padding-top:6cm">
                <p align="center" style="font-size:15pt">
                   <b> PEMERINTAH KABUPATEN PEMALANG <br>KECAMATAN PEMALANG</b>
                </p>
                <p align="center" style="font-size:13pt">
                    <b>SURAT IZIN USAHA MIKRO DAN KECIL <br>
                    <span style="font-size:12pt">Nomor : {{$item->no_sk}}</span>
                </b>
                </p>
                <p align="justify" id="isi">
                Berdasarkan Peraturan Presiden Nomor 98 Tahun 2014 tentang Perizinan untuk Usaha Mikro dan Kecil (Lembar Negara Republik Indonesia Tahun 2014 Nomor 222); Peraturan Menteri Dalam Negeri Republik Indonesia Nomor 83 Tahun 2014 tentang Pedoman Pemberian Izin Usaha Mikro dan Kecil;
                </p>
                <span style="padding-top=-1cm" id="isi"><p>Serta:</p></span>
                <table id="isi">
                    <tr>
                        <td valign="top" style="width:35%"><p>Nomor Perhub Pemalang</p></td>
                        <td valign="top" style="width:5%">:</td>
                        <td valign="top"><p>33 Tahun 2015</p></td>
                    </tr>
                    <tr>
                        <td valign="top">Tentang</td>
                        <td valign="top">:</td>
                        <td ><p align="justify">
                        Perubahan Atas Peraturan Bupati Pemalang Nomor 49 Tahun 2012 Tentang Pelimpahan Sebagian Kewenangan Bupati Kepada Camat
                        </p></td>
                    </tr>
                    <tr>
                        <td colspan="3"><p>Bersama ini menyatakan dan memberikan izin kepada :</p> </td>
                    </tr>
                    <tr>
                        <td><p>Nama</p></td>
                        <td>:</td>
                        <td><p>{{$item->nama}}</p></td>
                    </tr>
                    <tr>
                        <td><p>Nomor KTP</p></td>
                        <td>:</td>
                        <td><p>{{$item->nik}}</p></td>
                    </tr>
                    <tr>
                        <td><p>Nomor Handphone</p></td>
                        <td>:</td>
                        <td><p>{{$item->telepon}}</p></td>
                    </tr>
                    <tr>
                        <td colspan="3"><p align="justify">
                        Untuk mendirikan Usaha Mikro dan Kecil yang mencakup perizinan dasar yang berupa : menempati lokasi / domisili, melakukan kegiatan usaha baik produksi maupun penjualan barang dan jasa, dengan identitas : 
                        </p></td>
                    </tr>
                    <tr>
                        <td><p>Nama Usaha / Nama Toko </p></td>
                        <td>:</td>
                        <td><p>{{$item->nama_usaha}}</p></td>
                    </tr>
                    <tr><td><p>Alamat</p></td></tr>
                    <tr>
                        <td><p>Provinsi</p></td>
                        <td>:</td>
                        <td><p>JAWA TENGAH</p></td>
                    </tr>
                    <tr>
                        <td><p>Kabupaten</p></td>
                        <td>:</td>
                        <td><p>PEMALANG</p></td>
                    </tr>
                    <tr>
                        <td><p>Kecamatan</p></td>
                        <td>:</td>
                        <td><p>PEMALANG</p></td>
                    </tr>
                    <tr>
                        <td><p>Desa</p></td>
                        <td>:</td>
                        <td><p>{{$item->nama_daerah}}</p></td>
                    </tr>
                    <tr>
                        <td><p>Nama Jalan / Dusun</p></td>
                        <td>:</td>
                        <td><p>{{$item->alamat_usaha}}</p></td>
                    </tr>
                    <tr>
                        <td><p>Kode Pos</p></td>
                        <td>:</td>
                        <td><p>{{$item->kodepos}}</p></td>
                    </tr>
                    <tr>
                        <td><p>Sektor Usaha</p></td>
                        <td>:</td>
                        <td><p>{{$item->sektor_usaha}}</p></td>
                    </tr>
                    <tr>
                        <td><p>Sarana yang digunakan</p></td>
                        <td>:</td>
                        <td><p>{{$item->sarana}}</p></td>
                    </tr>
                    <tr>
                        <td><p>Jumlah Modal Usaha</p></td>
                        <td>:</td>
                        <td><p>{{"Rp ".number_format($item->modal,2,',','.')}}</p></td>
                    </tr>
                    <tr>
                        <td><p>NPWP</p></td>
                        <td>:</td>
                        <td><p>{{$item->npwp}}</p></td>
                    </tr>
                    <tr>
                        <td><p>Klasifikasi Usaha</p></td>
                        <td>:</td>
                        <td><p>{{$item->klasifikasi}}</p></td>
                    </tr>
                    <tr>
                        <td colspan="2" >
                           <center> <img src="{{url("$item->foto")}}" style="height:4cm;width:3cm"></center>
                        </td>
                        <td valign="top">
                            <center>
                                <table>
                                    <tr>
                                        <td><p>Ditetapkan di</p></td>
                                        <td>:</td>
                                        <td><p>Pemalang</p></td>
                                    </tr>
                                    <tr>
                                        <td><p>Pada Tanggal</p></td>
                                        <td>:</td>
                                        <td><p>{{date('d')}} {{$bulan}} {{date('Y')}}</p></td>
                                    </tr>
                                </table>
                                @foreach($daerah as $items)
                                <p style="font-size:10pt"><b>CAMAT PEMALANG</b>
                                <br><br><br><br><br>
                                <b>{{$items->kepala_daerah}}</b><br>
                                <b>Pembina Tingkat I</b><br>
                                <b>NIP. {{$items->nip}}</b></p>
                                @endforeach
                            </center>
                        </td>
                    </tr>
                </table>
            
            </div>
        </div>
</body>
@endforeach