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
        padding: 1cm 2cm 2cm 2cml
    }
    #tabel{
        font-size:10pt;
    }
    p{
        margin:0;
        font-size:11pt;
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
<body onload="window.print()">

<p align="center"><img  src="{{url('img/logosurat.jpg')}}" alt=""></p>
<p style="font-size:14pt" align="center">PEMERINTAH KABUPATEN PEMALANG</p>
<p style="font-size:16pt" align="center"><b>KECAMATAN PEMALANG</b></p>
<p style="font-size:12pt;margin-top:3pt" align="center"><b>KEPUTUSAN CAMAT PEMALANG</b></p>
<p style="font-size:10.5pt" align="center"><b>NOMOR: {{$item->no_sk}}</b></p>
<p style="font-size:12pt" align="center"><b>TENTANG</b></p>
<p style="font-size:12pt" align="center"><b>IZIN MENDIRIKAN BANGUNAN</b></p><br>
<p style="font-size:12pt" align="center"><b>CAMAT PEMALANG</b></p>
<br>
<table>
    <tr>
        <td valign="top">
            <p id="isi"><b>Membaca</b></p>
        </td>
        <td valign="top">:</td>
        <td>
            <ol>
                <li><p align="justify">Surat permohonan dari Sdr. {{$item->nama}} alamat : {{$item->jalan}} Rt {{$item->rt}} .Rw. {{$item->rw}} {{$item->jenis_daerah}} {{$item->nama_daerah}} tanggal {{date('d',strtotime($tanggal))}} {{$m}} {{date('Y',strtotime($tanggal))}} perihal Permohonan Izin Mendirikan Bangunan. </p></li>
                <li><p align="justify">Surat pemeriksaan Unit Pengelola Pekerjaan Umum Kabupaten Pemalang Wilayah IV Kabupaten Pemalang. Tanggal. {{date('d',strtotime($tanggal))}} {{$m}} {{date('Y',strtotime($tanggal))}}  </p></li>
            </ol>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <p id="isi"><b>Menimbang</b></p>
        </td>
        <td valign="top">:</td>
        <td>
            <ol type="a">
                <li><p align="justify">
                bahwa rencana pembangunan termaksud dengan segala persyaratan telah memenuhi ketentuan
                </p></li>
                <li><p align="justify">
                bahwa sehubungan hal tersebut huruf a diatas, maka perlu menetapkan Keputusan Camat Pemalang tentang Izin Mendirikan Bangunan.
                </p></li>
            </ol>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <p id="isi"><b>Mengingat</b></p>
        </td>
        <td valign="top">:</td>
        <td>
            <ol type="1">
                <li><p align="justify">
                Undang-Undang Nomor 26 Tahun 2007 tentang Penataan Ruang;
                </p></li>
                <li><p align="justify">
                Peraturan Daerah Kabupaten Pemalang Nomor 6 Tahun 2006 tentang Bangunan Gedung;
                </p></li>
                <li><p align="justify">
                Peraturan Daerah Kabupaten Pemalang Nomor 14 Tahun 2008 tentang Organisasi dan Tata Kerja Kecamatan di Kabupaten Pemalang;
                </p></li>
                <li><p align="justify">
                Peraturan Daerah Kabupaten Pemalang Nomor 4 Tahun 2012 tentang Retribusi Perizinan Tertentu;
                </p></li>
                <li><p align="justify">
                Peraturan Bupati Pemalang Nomor 49 Tahun 2012 tentang Pelimpahan sebagian kewenangan Bupati kepada Camat;
                </p></li>
                <li><p align="justify">
                Peraturan Bupati Pemalang Nomor 16 Tahun 2013 tentang Pelimpahan sebagian kewenangan Bupati kepada Camat di bidang perizinan dan non perizinan;
                </p></li>
                <li><p align="justify">
                Peraturan Bupati Pemalang Nomor 33 Tahun 2013 tentang Standar Pelayanan Administrasi Terpadu Kecamatan di Kabupaten Pemalang
                </p></li>
            </ol>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <p id="isi"><b></b></p>
        </td>
        <td valign="top">:</td>
        <td>
           <p align="center"><b>MEMUTUSKAN</b></p>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <p id="isi"><b>Menetapkan</b></p>
        </td>
        <td valign="top">:</td>
        <td>
           <p align="justify">
           KEPUTUSAN CAMAT PEMALANG TENTANG PEMBERIAN IZIN MENDIRIKAN BANGUNAN 
           </p>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <p id="isi"><b>KESATU</b></p>
        </td>
        <td valign="top">:</td>
        <td>
            <p align="justify">
            Memberikan "IZIN MENDIRIKAN BANGUNAN" Kepada : 
            </p>
            <table>
                <tr>
                    <td valign="top" style="width:4cm"><p>- Nama dan Pekerjaan</p></td>
                    <td valign="top"><p>:</p></td>
                    <td><p>{{$item->nama}}, {{$item->pekerjaan}}</p></td>
                </tr>
                <tr>
                    <td valign="top"><p>- Alamat</p></td>
                    <td valign="top"><p>:</p></td>
                    <td><p>{{$item->jalan}} Rt {{$item->rt}} .Rw. {{$item->rw}} {{$item->jenis_daerah}} {{$item->nama_daerah}} Kec. Pemalang Kab. Pemalang</p></td>
                </tr>
                <tr>
                    <td valign="top"><p>- Untuk Keperluan</p></td>
                    <td valign="top"><p>:</p></td>
                    <td><p>{{$item->keperluan_bangunan}}</p></td>
                </tr>
                <tr>
                    <td valign="top"><p>- Konstruksi Bangunan</p></td>
                    <td valign="top"><p>:</p></td>
                    <td><p>{{$item->konstruksi_bangunan}}</p></td>
                </tr>
                <tr>
                    <td valign="top"><p>- Luas Bangunan</p></td>
                    <td valign="top"><p>:</p></td>
                    <td><p>{{$item->luas_bangunan}} M<sup>2</sup></p></td>
                </tr>
                <tr>
                    <td valign="top"><p>- Letak Bangunan</p></td>
                    <td valign="top"><p>:</p></td>
                    <td><p>{{$item->letak_bangunan}}</p></td>
                </tr>
                <tr>
                    <td valign="top"><p>- Letak Tanah Milik</p></td>
                    <td valign="top"><p>:</p></td>
                    <td><p>{{$item->tanah_milik}} Luas Tanah : {{$item->luas_tanah}} M<sup>2</sup> </p></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <p id="isi"><b>KEDUA</b></p>
        </td>
        <td valign="top">:</td>
        <td>
           <p align="justify">
           Pemegang Izin Mendirikan Bangunan dilarang memperluas atau merubah bangunan sebelum mendapatkan Izin Mendirikan Bangunan tersendiri atas perubahan tersebut. 
           </p>
        </td>
    </tr>
        <tr>
        <td valign="top">
            <p id="isi"><b>KEDUA</b></p>
        </td>
        <td valign="top">:</td>
        <td>
           <p align="justify">
           Keputusan ini mulai berlaku pada tanggal ditetapkan.
           </p>
        </td>
    </tr>
</table>
<table>
    <tr>
        <td style="width:10cm"></td>
        <td style="width:50%"><p>Ditetapkan di Pemalang</p></td>
    </tr>
    <tr>
        <td></td>
        <td><p>pada tanggal {{date('d')}} {{$bulan}} {{date('Y')}}</p></td>
    </tr>
    <tr>
        <td></td>
        <td><p><hr></p></td>
    </tr>
    <tr>
        <td></td>
        <td><p align="center">An. BUPATI PEMALANG</p></td>
    </tr>
    <tr>
        <td></td>
        <td><p align="center">CAMAT PEMALANG</p><br><br><br><br></td>
    </tr>
    <tr>
        <td>
            <p>Tembusan :</p>
        </td>
        @foreach($daerah as $items)
        <td><p align="center"><b>{{$items->kepala_daerah}}</b><br>Pembina</p></td>
    </tr>
    <tr>
        <td>
            <ol>
                <li><p>Kepala DPU Kabupaten Pemalang</p></li>
                <li><p>Kepala KPPT Kabupaten Pemalang</p></li>
                <li><p>Kepala Satpol PP Kabupaten Pemalang</p></li>
                <li><p>Kepala Unit Pengelola PU Kab. Pemalang Wilayah</p></li>
                <li><p>Kepala {{$item->jenis_daerah}} {{$item->nama_daerah}} </p></li>
            </ol>
        </td>
        <td valign="top"><p align="center">NIP. {{$items->nip}}</p></td>
        @endforeach
    </tr>
</table>
<br>
<p align="center">
    Jl. DI Panjaitan Nomor 205 Pemalang Telp/Fax (0284) 321004
</p>
</body>
@endforeach