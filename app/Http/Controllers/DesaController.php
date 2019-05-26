<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Helpers\kustom;
use App\Admin;
use App\Daerah;
use App\Pelayanan;
use App\Sublayanan;
use App\Pemohon;
use App\imb;
use Datatables;

class DesaController extends Controller
{
    public function generateKode()
    {
        $string = "ABCDEFGHIJKLMNOPQRETUVWXYZabcdefghijklmnopqrstuwvxyz1234567890";
        $acak = substr(str_shuffle($string),0,16);
        return $acak;
    }
    public function homeDesa()
    {
        
        $sidebar    =   Pelayanan::get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'sidebar' =>  $sidebar,
        ];
        return view('desa/beranda',$data);
    }
    public function pagePengaturan()
    {
        $sidebar    =   Pelayanan::get();
        $admin      =   Admin::where('username',session('username'))->get();
        $daerah     =   Daerah::get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'sidebar'   =>  $sidebar,
            'admin'     =>  $admin,
            'daerah'    =>  $daerah
        ];
        return view('desa/pengaturan',$data);
    }
    public function editAkunDesa(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kontak' => 'numeric|required',
            'email' => 'email|required'
        ],Kustom::validasi());
        Admin::where('username',$request['username'])->update([
            'nama'      => $request['nama'],
            'kontak'    => $request['kontak'],
            'email'     =>  $request['email'],
            'status'    => '0',
            'remember_token' => '',
            'updated_at' => now(+7.00)
        ]);
        session()->flush();
        return redirect('/login');
    }
    public function editPassAdminDesa(Request $request)
    {
        $admin      =   Admin::where('username',session('username'))->get();
        $request->validate([
            'passlama'  => 'required',
            'passbaru'  => 'required|min:8',
            'passulang' =>  'required|min:8|same:passbaru'
        ],Kustom::validasi());

        foreach($admin as $admin){
            if(Hash::check($request['passlama'], $admin->password)){
               Admin::where('username',session('username'))->update([
                'password'     =>  bcrypt($request['passbaru']),
                'status'    => '0',
                'remember_token' => '',
                'updated_at' => now(+7.00)
               ]);
               session()->flush();
                return redirect('/login');
            }else{
                return redirect()->back()->with('gagal','Password lama anda salah');
            }
        }
    }
    public function gantiInfoDesa($id,Request $request)
    {
        $request->validate([
            'kades'  => 'required',
            'nip'   =>  'required|numeric'
        ],Kustom::validasi());
        Daerah::where('id',$id)->update([
            'kepala_daerah' => $request['kades'],
            'nip'           =>  $request['nip']
        ]);
        return redirect()->back()->with('sukses','Berhasil mengubah informasi Desa');
    }
    public function formulirPelayanan($slug)
    {
        $pelayanan     =   Pelayanan::where('slug',$slug)->get();
        $sidebar        =   Pelayanan::get();
        foreach($pelayanan as $item){
            $sublayanan = Sublayanan::where('id_pelayanan',$item['id'])->get();
        }
        $daerah         =   Daerah::where('nama_daerah',str_replace('Admin','',session('username')))->get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'sidebar'   =>  $sidebar,
            'pelayanan' =>  $pelayanan,
            'sublayanan'    =>  $sublayanan,
            'daerah'    =>  $daerah
        ];
        return view('desa/formulir',$data);
    }
    public function formulirSublayanan($slug1,$slug2)
    {
        $pelyananan     =   Pelayanan::where('slug',$slug1)->get();
        $sublayanan     =   Sublayanan::where('slug',$slug2)->get();
        $sidebar        =   Pelayanan::get();
        $daerah         =   Daerah::where('nama_daerah',str_replace('Admin','',session('username')))->get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'sidebar'   =>  $sidebar,
            'pelayanan' =>  $pelyananan,
            'sublayanan'    =>  $sublayanan,
            'daerah'    =>  $daerah
        ];
        return view('desa/formulir/subpelayanan/'.$slug1,$data);
    }
    //IMB
    public function imb(Request $request)
    {
        $request->validate([
            'nama_pemohon'              => 'required',
            'nik'                       => 'required|min:16|max:18',
            'telepon'                   => 'required',
            'pekerjaan'                 => 'required',
            'rt'                        => 'required',
            'rw'                        => 'required',
            'jalan'                     => 'required',
            'keperluan_bangunan'        => 'required',
            'konstruksi_bangunan'       => 'required',
            'luas_bangunan'             => 'required',
            'luas_tanah'                => 'required',
            'letak_bangunan'            => 'required',
            'pemilik_tanah'             => 'required',
            'ktp'                       => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_persetujuan_tetangga' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_fc_kepemilikan_tanah' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_fc_sppt_pbb_terakhir' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_gambar_rencana'       => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_pengantar'            => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
        ],Kustom::validasi());
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama_pemohon'],
            'kode'  => $this->generateKode(),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['daerah_id'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $id_pemohon = $pemohon->id;
        
        $a  =   $request->file('ktp');
        $b  =   $request->file('scan_persetujuan_tetangga');
        $c  =   $request->file('scan_fc_kepemilikan_tanah');
        $d  =   $request->file('scan_fc_sppt_pbb_terakhir');
        $e  =   $request->file('scan_gambar_rencana');
        $f  =   $request->file('scan_pengantar');
        $path_a =   "berkas/imb/a/";
        $nama_a =   $id_pemohon."_ktp.".$a->getClientOriginalExtension();
        $request->file('ktp')->move($path_a,$nama_a);
        $path_b =   "berkas/imb/b/";
        $nama_b =   $id_pemohon."_scan_persetujuan_tetangga.".$b->getClientOriginalExtension();
        $request->file('scan_persetujuan_tetangga')->move($path_b,$nama_b);
        $path_c =   "berkas/imb/c/";
        $nama_c =   $id_pemohon."_scan_fc_kepemilikan_tanah.".$c->getClientOriginalExtension();
        $request->file('scan_fc_kepemilikan_tanah')->move($path_c,$nama_c);
        $path_d =   "berkas/imb/d/";
        $nama_d =   $id_pemohon."_scan_fc_sppt_pbb_terakhir.".$d->getClientOriginalExtension();
        $request->file('scan_fc_sppt_pbb_terakhir')->move($path_d,$nama_d);
        $path_e =   "berkas/imb/e/";
        $nama_e =   $id_pemohon."_scan_gambar_rencana.".$e->getClientOriginalExtension();
        $request->file('scan_gambar_rencana')->move($path_e,$nama_e);
        $path_f =   "berkas/imb/f/";
        $nama_f =   $id_pemohon."_scan_pengantar.".$f->getClientOriginalExtension();
        $request->file('scan_pengantar')->move($path_f,$nama_f);
        
        imb::create($data = [
            'id_pemohon'                => $id_pemohon,
            'keperluan_bangunan'        => $request['keperluan_bangunan'],
            'konstruksi_bangunan'       => $request['konstruksi_bangunan'],
            'luas_bangunan'             => $request['luas_bangunan'],
            'luas_tanah'                => $request['luas_tanah'],
            'letak_bangunan'            => $request['letak_bangunan'],
            'tanah_milik'               => $request['pemilik_tanah'],
            'scan_ktp'                  => $path_a.$nama_a,
            'scan_persetujuan_tetangga' => $path_b.$nama_b,
            'scan_fc_kepemilikan_tanah' => $path_c.$nama_c,
            'scan_fc_sppt_pbb_terakhir' => $path_d.$nama_d,
            'scan_gambar_rencana'       => $path_e.$nama_e,
            'scan_pengantar'            => $path_f.$nama_f,
            'created_at'                => now(+7.00),
            'updated_at'                => null
        ]);
        return redirect()->back()->with('sukses','Berhasil mengajukan permohonan Izin Mendirikan Bangunan');
    }
    
    // REKMLAME
    function reklameForm(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_pemohon'              => 'required',
            'nik'                       => 'required|min:16|max:18',
            'telepon'                   => 'required',
            'pekerjaan'                 => 'required',
            'rt'                        => 'required',
            'rw'                        => 'required',
            'jalan'                     => 'required',
            'jenis_reklame'        => 'required',
            'banyak'       => 'required',
            'pesan_produk'             => 'required',
            'tempat_reklame'                => 'required',
            'tanggal_awal'            => 'required|before:tanggal_akhir',
            'tanggal_akhir'             => 'required',
            'ktp'                       => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_npwp'                 => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'contoh_reklame' => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_persetujuan'       => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_izin_lama'       => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_pengantar'            => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
        ],Kustom::validasi());
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama_pemohon'],
            'kode'  => $this->generateKode(),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['id_daerah'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $id_pemohon = $pemohon->id;
        $a  =   $request->file('ktp');
        $b  =   $request->file('scan_npwp');
        $c  =   $request->file('contoh_reklame');
        $d  =   $request->file('scan_persetujuan');
        $e  =   $request->file('scan_izin_lama');
        $f  =   $request->file('scan_pengantar');
        //scan ktp
        $path_a =   "berkas/reklame/a/";
        $nama_a =   $id_pemohon."_ktp.".$a->getClientOriginalExtension();
        $request->file('ktp')->move($path_a,$nama_a);
            //scan npwp
        $path_b =   "berkas/reklame/b/";
        $nama_b =   $id_pemohon."_scan_npwp.".$b->getClientOriginalExtension();
        $request->file('scan_npwp')->move($path_b,$nama_b);
            //scan contoh reklame
        $path_c =   "berkas/reklame/c/";
        $nama_c =   $id_pemohon."_contoh_reklame.".$c->getClientOriginalExtension();
        $request->file('contoh_reklame')->move($path_c,$nama_c);
            //  scann persetujuan
        $path_d =   "berkas/reklame/d/";
        $nama_d =   $id_pemohon."_scan_persetujuan.".$d->getClientOriginalExtension();
        $request->file('scan_persetujuan')->move($path_d,$nama_d);
            //scan surat izin lama
        $path_e =   "berkas/reklame/e/";
        $nama_e =   $id_pemohon."_scan_izin_lama.".$e->getClientOriginalExtension();
        $request->file('scan_izin_lama')->move($path_e,$nama_e);
            //scan pengantar
        $path_f =   "berkas/reklame/f/";
        $nama_f =   $id_pemohon."_scan_pengantar.".$f->getClientOriginalExtension();
        $request->file('scan_pengantar')->move($path_f,$nama_f);

        DB::table('izin-reklame')->insert([
            'id_pemohon'                => $id_pemohon,
            'jenis_reklame' => $request['jenis_reklame'],
            'banyak'        =>  $request['banyak'],
            'pesan_produk'  =>  $request['pesan_produk'],
            'tanggal_awal'  =>  $request['tanggal_awal'],
            'tanggal_akhir' =>  $request['tanggal_akhir'],
            'tempat_reklame'    => $request['tempat_reklame'],
            'scan_ktp'          => $path_a.$nama_a,
            'scan_npwp'         => $path_b.$nama_b,
            'contoh_reklame'    => $path_c.$nama_c,
            'scan_persetujuan'  => $path_d.$nama_d,
            'scan_izin_lama'    => $path_e.$nama_e,
            'scan_pengantar'    => $path_f.$nama_f,
            'created_at'        => now(+7.00),
            'updated_at'        => null
        ]);
        return redirect()->back()->with('sukses','Berhasil mengajukan permohonan Izin Reklame');
    }

    //IUMK
    public function iumkForm(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_pemohon'              => 'required',
            'nik'                       => 'required|min:16|max:18',
            'telepon'                   => 'required',
            'pekerjaan'                 => 'required',
            'rt'                        => 'required',
            'rw'                        => 'required',
            'jalan'                     => 'required',
            'nama_usaha'        => 'required',
            'alamat_usaha'       => 'required',
            'kodepos'                => 'required|numeric',
            'sektor_usaha'            => 'required',
            'klasifikasi' => 'required',
            'sarana'             => 'required',
            'modal'             => 'required|numeric',
            'npwp'             => 'required',
            'ktp'                       => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_kk'                 => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'foto'       => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_pengantar'            => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
        ],Kustom::validasi());
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama_pemohon'],
            'kode'  => $this->generateKode(),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['id_daerah'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $id_pemohon = $pemohon->id;
        $a  =   $request->file('ktp');
        $b  =   $request->file('scan_kk');
        $c  =   $request->file('scan_pengantar');
        $d  =   $request->file('foto');
            // scan ktp
        $path_a =   "berkas/iumk/a/";
        $nama_a =   $id_pemohon."_ktp.".$a->getClientOriginalExtension();
        $request->file('ktp')->move($path_a,$nama_a);
            //scan kk
        $path_b =   "berkas/iumk/b/";
        $nama_b =   $id_pemohon."_scan_kk.".$b->getClientOriginalExtension();
        $request->file('scan_kk')->move($path_b,$nama_b);
            //scan pengantar dari desa
        $path_c =   "berkas/iumk/c/";
        $nama_c =   $id_pemohon."_scan_pengantar.".$c->getClientOriginalExtension();
        $request->file('scan_pengantar')->move($path_c,$nama_c);
            //  scann pas foto 4X6
        $path_d =   "berkas/iumk/d/";
        $nama_d =   $id_pemohon."_foto.".$d->getClientOriginalExtension();
        $request->file('foto')->move($path_d,$nama_d);
        DB::table('izin-usaha-mikro-dan-kecil')->insert([
            'id_pemohon'    => $id_pemohon,
            'nama_usaha'    => $request['nama_usaha'],
            'alamat_usaha'  =>  $request['alamat_usaha'],
            'kodepos'       =>  $request['kodepos'],
            'sektor_usaha'  =>  $request['sektor_usaha'],
            'sarana'        =>  $request['sarana'],
            'modal'         =>  $request['modal'],
            'npwp'         =>  $request['npwp'],
            'klasifikasi'         =>  $request['klasifikasi'],
            'scan_ktp'          => $path_a.$nama_a,
            'scan_kk'         => $path_b.$nama_b,
            'scan_pengantar'    => $path_c.$nama_c,
            'foto'  => $path_d.$nama_d,
            'created_at'        => now(+7.00),
            'updated_at'        => null
        ]);
        return redirect()->back()->with('sukses','Berhasil mengajukan permohonan Izin Usaha Mikro dan Kecil');
    }

    //SALON FORM
    public function salonForm(Request $request)
    {
        $request->validate([
            'nama_pemohon'              => 'required',
            'nik'                       => 'required|min:16|max:18',
            'telepon'                   => 'required',
            'pekerjaan'                 => 'required',
            'rt'                        => 'required',
            'rw'                        => 'required',
            'jalan'                     => 'required',
            'jenis'                     => 'required',
            'nama_usaha'                => 'required',
            'alamat_usaha'              => 'required',
            'ktp'                       => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_pengantar'            => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
        ],Kustom::validasi());
        // dd($request->all());
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama_pemohon'],
            'kode'  => $this->generateKode(),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['id_daerah'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'sublayanan_id' =>$request['sublayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $id_pemohon = $pemohon->id;
        $a  =   $request->file('ktp');
        $b  =   $request->file('scan_pengantar');
            //scan ktp
        $path_a =   "berkas/salon-kecantikan/a/";
        $nama_a =   $id_pemohon."_ktp.".$a->getClientOriginalExtension();
        $request->file('ktp')->move($path_a,$nama_a);
            //scan kk
        $path_b =   "berkas/salon-kecantikan/b/";
        $nama_b =   $id_pemohon."_scan_pengantar.".$b->getClientOriginalExtension();
        $request->file('scan_pengantar')->move($path_b,$nama_b);
        $jenis;
        if($request['jenis'] == "new"){
            $jenis = "Permohonan Baru";
        }elseif($request['jenis'] == "du"){
            $jenis = "Daftar Ulang";
        }else{
            $jenis = "Balik Nama";
        }
        if($request['jenis'] == "bn"){
            DB::table('salon-kecantikan')->insert([
                'id_pemohon'    => $id_pemohon,
                'jenis'=>$jenis,
                'nama_usaha'    => $request['nama_usaha'],
                'alamat_usaha'  =>  $request['alamat_usaha'],
                'nama_usaha_baru'    =>  $request['nama_usaha_baru'],
                'scan_ktp'      => $path_a.$nama_a,
                'scan_pengantar'         => $path_b.$nama_b,
                'created_at'    =>  now(+7.00),
                'updated_at'   => null
            ]);
        }else{
            DB::table('salon-kecantikan')->insert([
                'id_pemohon'    => $id_pemohon,
                'jenis'=>$jenis,
                'nama_usaha'    => $request['nama_usaha'],
                'alamat_usaha'  =>  $request['alamat_usaha'],
                'nama_usaha_baru'    =>  "-",
                'scan_ktp'      => $path_a.$nama_a,
                'scan_pengantar'         => $path_b.$nama_b,
                'created_at'    =>  now(+7.00),
                'updated_at'   => null
            ]);
        }
        return redirect()->back()->with('sukses','Berhasil mengajukan permohonan Izin Salon Kecantikan');
    }
    public function rmForm(Request $request)
    {
        $request->validate([
            'nama_pemohon'              => 'required',
            'nik'                       => 'required|min:16|max:18',
            'telepon'                   => 'required',
            'pekerjaan'                 => 'required',
            'rt'                        => 'required',
            'rw'                        => 'required',
            'jalan'                     => 'required',
            'jenis'                     => 'required',
            'nama_usaha'                => 'required',
            'alamat_usaha'              => 'required',
            'ktp'                       => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_pengantar'            => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
        ],Kustom::validasi());
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama_pemohon'],
            'kode'  => $this->generateKode(),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['id_daerah'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'sublayanan_id' =>$request['sublayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $id_pemohon = $pemohon->id;
        $a  =   $request->file('ktp');
        $b  =   $request->file('scan_pengantar');
            //scan ktp
        $path_a =   "berkas/rumah-makan/a/";
        $nama_a =   $id_pemohon."_ktp.".$a->getClientOriginalExtension();
        $request->file('ktp')->move($path_a,$nama_a);
            //scan kk
        $path_b =   "berkas/rumah-makan/b/";
        $nama_b =   $id_pemohon."_scan_pengantar.".$b->getClientOriginalExtension();
        $request->file('scan_pengantar')->move($path_b,$nama_b);
        $jenis;
        if($request['jenis'] == "new"){
            $jenis = "Permohonan Baru";
        }elseif($request['jenis'] == "du"){
            $jenis = "Daftar Ulang";
        }else{
            $jenis = "Balik Nama";
        }
        if($request['jenis'] == "bn"){
            DB::table('rumah-makan')->insert([
                'id_pemohon'    => $id_pemohon,
                'jenis'=>$jenis,
                'nama_usaha'    => $request['nama_usaha'],
                'alamat_usaha'  =>  $request['alamat_usaha'],
                'nama_usaha_baru'    =>  $request['nama_usaha_baru'],
                'scan_ktp'      => $path_a.$nama_a,
                'scan_pengantar'         => $path_b.$nama_b,
                'created_at'    =>  now(+7.00),
                'updated_at'   => null
            ]);
        }else{
            DB::table('rumah-makan')->insert([
                'id_pemohon'    => $id_pemohon,
                'jenis'=>$jenis,
                'nama_usaha'    => $request['nama_usaha'],
                'alamat_usaha'  =>  $request['alamat_usaha'],
                'nama_usaha_baru'    =>  "-",
                'scan_ktp'          => $path_a.$nama_a,
                'scan_pengantar'         => $path_b.$nama_b,
                'created_at'    =>  now(+7.00),
                'updated_at'   => null
            ]);
        }
        return redirect()->back()->with('sukses','Berhasil mengajukan permohonan Izin Rumah Makan');
    }
    //Gelanggang Ketangkasan
    public function gkForm(Request $request)
    {
        $request->validate([
            'nama_pemohon'              => 'required',
            'nik'                       => 'required|min:16|max:18',
            'telepon'                   => 'required',
            'pekerjaan'                 => 'required',
            'rt'                        => 'required',
            'rw'                        => 'required',
            'jalan'                     => 'required',
            'jumlah_monitor'            => 'required|numeric',
            'nama_usaha'                => 'required',
            'alamat_usaha'              => 'required',
            'ktp'                       => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_pengantar'            => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_pernyataan_desa'            => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
        ],Kustom::validasi());
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama_pemohon'],
            'kode'  => $this->generateKode(),
            'nik'   =>  $request['nik'],
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['id_daerah'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'sublayanan_id' =>$request['sublayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $id_pemohon = $pemohon->id;
        $a  =   $request->file('ktp');
        $b  =   $request->file('scan_pengantar');
        $c  =   $request->file('scan_pernyataan_desa');
            //scan ktp
        $path_a =   "berkas/gelanggang-ketangkasan/a/";
        $nama_a =   $id_pemohon."_ktp.".$a->getClientOriginalExtension();
        $request->file('ktp')->move($path_a,$nama_a);
            //scan pengantar
        $path_b =   "berkas/gelanggang-ketangkasan/b/";
        $nama_b =   $id_pemohon."_scan_pengantar.".$b->getClientOriginalExtension();
        $request->file('scan_pengantar')->move($path_b,$nama_b);
            // scan pernyataan bermaterai
        $path_c =   "berkas/gelanggang-ketangkasan/c/";
        $nama_c =   $id_pemohon."_scan_pernyataan_desa.".$c->getClientOriginalExtension();
        $request->file('scan_pernyataan_desa')->move($path_c,$nama_c);
        DB::table('gelanggang-ketangkasan')->insert([
            'id_pemohon'    => $id_pemohon,
            'nama_usaha'    => $request['nama_usaha'],
            'alamat_usaha'  =>  $request['alamat_usaha'],
            'jumlah_monitor'    =>$request['jumlah_monitor'],
            'scan_ktp'      => $path_a.$nama_a,
            'scan_pengantar'         => $path_b.$nama_b,
            'scan_pernyataan_desa'  =>$path_c.$nama_c,
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        return redirect()->back()->with('sukses','Berhasil mengajukan permohonan Izin Gelanggang Ketangkasan');
    }
    //Atraksi Wisata
    public function awForm(Request $request)
    {
        $request->validate([
            'nama_pemohon'              => 'required',
            'nik'                       => 'required|min:16|max:18',
            'telepon'                   => 'required',
            'pekerjaan'                 => 'required',
            'rt'                        => 'required',
            'rw'                        => 'required',
            'jalan'                     => 'required',
            'jumlah_karyawan'            => 'required|numeric',
            'nilai_aset'            => 'required|numeric',
            'umur'  => 'required|numeric',
            'nama_usaha'                => 'required',
            'alamat_usaha'              => 'required',
            'ktp'                       => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_pengantar'            => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'scan_pernyataan_desa'            => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
            'struktur_organisasi'            => 'required | mimes:jpeg,jpg,png,PNG,pdf,txt | max:2048',
        ],Kustom::validasi());
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama_pemohon'],
            'nik'   =>  $request['nik'],
            'kode'      => $this->generateKode(),
            'telepon'   =>  $request['telepon'],
            'pekerjaan' =>  $request['pekerjaan'],
            'rt'    =>  $request['rt'],
            'rw'    =>  $request['rw'],
            'jalan' =>  $request['jalan'],
            'daerah_id'    =>  $request['id_daerah'],
            'pelayanan_id'  => $request['pelayanan_id'],
            'sublayanan_id' =>$request['sublayanan_id'],
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        $id_pemohon = $pemohon->id;
        $a  =   $request->file('ktp');
        $b  =   $request->file('scan_pengantar');
        $c  =   $request->file('scan_pernyataan_desa');
        $d  =   $request->file('struktur_organisasi');
        //scan ktp
        $path_a =   "berkas/atraksi-wisata/a/";
        $nama_a =   $id_pemohon."_ktp.".$a->getClientOriginalExtension();
        $request->file('ktp')->move($path_a,$nama_a);
            //scan pengantar
        $path_b =   "berkas/atraksi-wisata/b/";
        $nama_b =   $id_pemohon."_scan_pengantar.".$b->getClientOriginalExtension();
        $request->file('scan_pengantar')->move($path_b,$nama_b);
            // scan pernyataan bermaterai
        $path_c =   "berkas/atraksi-wisata/c/";
        $nama_c =   $id_pemohon."_scan_pernyataan_desa.".$c->getClientOriginalExtension();
        $request->file('scan_pernyataan_desa')->move($path_c,$nama_c);
            // scan struktur organ
        $path_d =   "berkas/atraksi-wisata/d/";
        $nama_d =   $id_pemohon."_struktur_organisasi.".$d->getClientOriginalExtension();
        $request->file('struktur_organisasi')->move($path_d,$nama_d);
        DB::table('atraksi-wisata')->insert([
            'id_pemohon'    => $id_pemohon,
            
            'umur'      => $request['umur'],
            'nama_usaha'    => $request['nama_usaha'],
            'alamat_usaha'  =>  $request['alamat_usaha'],
            'jumlah_karyawan'    =>$request['jumlah_karyawan'],
            'nilai_aset'    =>  $request['nilai_aset'],
            'scan_ktp'      => $path_a.$nama_a,
            'scan_pengantar'         => $path_b.$nama_b,
            'scan_pernyataan_desa'  =>$path_c.$nama_c,
            'struktur_organisasi' => $path_d.$nama_d,
            'created_at'    =>  now(+7.00),
            'updated_at'   => null
        ]);
        return redirect()->back()->with('sukses','Berhasil mengajukan permohonan Izin Atraksi Wisata');
    }




    // buat daftar data layanan
    public function data()
    {
        $sidebar    =   Pelayanan::get();
        $pemohon    =   Pemohon::get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'pelayanan' =>  $sidebar,
            'sidebar'   =>  $sidebar,
            'pemohon'   =>  $pemohon,
        ];
        return view('desa/data',$data);
    }
    public function dataPelayanan($slug)
    {
        $sidebar    =   Pelayanan::get();
        $pemohon    =   Pemohon::get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'pelayanan' =>  Pelayanan::where('slug',$slug)->get(),
            'sidebar'   =>  $sidebar,
            'pemohon'   =>  $pemohon,
        ];
        return view('desa/dataPelayanan',$data);
    }
}
