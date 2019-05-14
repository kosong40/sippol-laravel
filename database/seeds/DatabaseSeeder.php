<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daerahs')->insert([
            ['nama_daerah'=>'Banjarmulya','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Bojongbata','jenis_daerah'=>'Kelurahan','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Bojongnangka','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Danasari','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Kebondalem','jenis_daerah'=>'Kelurahan','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Kramat','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Lawangrejo','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Mengori','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Mulyoharjo','jenis_daerah'=>'Kelurahan','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Paduraksa','jenis_daerah'=>'Kelurahan','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Pegongsoran','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Pelutan','jenis_daerah'=>'Kelurahan','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Pemalang','jenis_daerah'=>'Kecamatan','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Saradan','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Sewaka','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Sugihwaras','jenis_daerah'=>'Kelurahan','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Sungapan','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Surajaya','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Tambakrejo','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Wanamulya','jenis_daerah'=>'Desa','kepala_daerah'=>'-','nip'=>null],
            ['nama_daerah'=>'Widuri','jenis_daerah'=>'Kelurahan','kepala_daerah'=>'-','nip'=>null],

        ]);
        DB::table('admins')->insert([
            [
                'username'=>'AdminKecamatan',
                'password'=>bcrypt('AdminKecamatan'),
                'email'=>'mdcnugroho@gmail.com',
                'nama'=>'Muchammad Dwi Cahyo Nugroho',
                'kontak'=>'082326464265',
                'daerah_id' =>13 ,
                'level' => "1",
                'created_at' => now(+7.00)
            ]
        ]);
        DB::table('levels')->insert([
            ['level'=>'Kecamatan'],
            ['level'=>'Desa/Kelurahan']
        ]);
        DB::table('daerahs')->where('nama_daerah','Pemalang')->update([
            'admin_id' => 1
        ]);

        $ter    =   "Perizinan Terstruktur";
        $tidk   =   "Perizinan Tidak Terstruktur";
        $imb    =   "Izin Mendirikan Bangunan";
        $ir     =   "Izin Reklame";
        $iumk   =   "Izin Usaha Mikro dan Kecil";
        $iup    =   "Izin Usaha Pariwisata";
        $skpp   =   "Surat Keterangan Pindah Penduduk";
        $dp     =   "Dispensasi Nikah";
        $rpks   =   "Rekomendasi Pendirian Kelompok Seni";
        $sk     =   "Salon Kecantikan";
        $rm     =   "Rumah Makan";
        $gk     =   "Gelanggang Ketangkasan";
        $aw     =   "Atraksi Wisata";
        $ppdd   =   "Pindah Pergi Datang Antar Desa";
        $ppakec =   "Pindah Pergi Antar Kecamatan";
        $pdakec =   "Pindah Datang Antar Kecamatan";
        $ppakab =   "Pindah Pergi Antar Kabupaten";
        $pdakab =   "Pindah Datang Antar Kabupaten";

        function slug($string){
            return strtolower(str_replace(" ","-",$string));
        }
        DB::table('pelayanans')->insert([
            ['pelayanan'=>"$imb",'jenis_pelayanan'=>"$ter",'slug'=>slug($imb)],
            ['pelayanan'=>"$ir",'jenis_pelayanana'=>"$ter",'slug'=>slug($ir)],
            ['pelayanan'=>"$iumk",'jenis_pelayanan'=>"$ter",'slug'=>slug($iumk)],
            ['pelayanan'=>"$iup",'jenis_pelayanan'=>"$ter",'slug'=>slug($iup)],
            ['pelayanan'=>"$skpp",'jenis_pelayanan'=>"$tidk",'slug'=>slug($skpp)],
            ['pelayanan'=>"$dp",'jenis_pelayanan'=>"$tidk",'slug'=>slug($dp)],
            ['pelayanan'=>"$rpks",'jenis_pelayanan'=>"$tidk",'slug'=>slug($rpks)],
           
        ]);
        DB::table('sublayanans')->insert([
            ['subpelayanan'=>"$sk",'jenis_pelayanan'=>"$ter",'slug'=>slug($sk),'id_pelayanan'=>4],
            ['subpelayanan'=>"$rm",'jenis_pelayanan'=>"$ter",'slug'=>slug($rm),'id_pelayanan'=>4],
            ['subpelayanan'=>"$gk",'jenis_pelayanan'=>"$ter",'slug'=>slug($gk),'id_pelayanan'=>4],
            ['subpelayanan'=>"$aw",'jenis_pelayanan'=>"$ter",'slug'=>slug($aw),'id_pelayanan'=>4],
            ['subpelayanan'=>"$ppdd",'jenis_pelayanan'=>"$tidk",'slug'=>slug($ppdd),'id_pelayanan'=>5],
            ['subpelayanan'=>"$ppakec",'jenis_pelayanan'=>"$tidk",'slug'=>slug($ppakec),'id_pelayanan'=>5],
            ['subpelayanan'=>"$pdakec",'jenis_pelayanan'=>"$tidk",'slug'=>slug($pdakec),'id_pelayanan'=>5],
            ['subpelayanan'=>"$ppakab",'jenis_pelayanan'=>"$tidk",'slug'=>slug($ppakab),'id_pelayanan'=>5],
            ['subpelayanan'=>"$pdakab",'jenis_pelayanan'=>"$tidk",'slug'=>slug($pdakab),'id_pelayanan'=>5],
        ]);
        
    }
}
