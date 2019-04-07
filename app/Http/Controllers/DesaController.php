<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Admin;
use App\Daerah;
use App\Pelayanan;
use App\Sublayanan;
use App\Pemohon;
use App\imb;
use Datatables;

class DesaController extends Controller
{
    public function CustomValidation()
    {
        $pesan = [
            'required'  => 'Form :attribute mohon untuk di isi dan tidak boleh kosong',
            'numeric'   => 'Form :attribute harus di isi angka',
            'email'     => 'Form :attribute sesuai dengan format Email contoh NamaAnda12@email.com',
            'min'       => 'Form :attribute minimal :min karakter',
            'same'      => 'Form :attribute nilainya harus sama dengan form :other'
        ];
        return $pesan;
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
        ],$this->CustomValidation());
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
        ],$this->CustomValidation());

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
        ],$this->CustomValidation());
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
    public function imb(Request $request)
    {
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama_pemohon'],
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
    
    function reklameForm(Request $request)
    {
        // dd($request->all());
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama_pemohon'],
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
        $e  =   $request->file('scan_persetujuan');
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
    public function iumkForm(Request $request)
    {
        // dd($request->all());
        $pemohon = Pemohon::create([
            'nama'  =>  $request['nama_pemohon'],
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
        DB::table('izin-usaha-mirko-dan-kecil')->insert([
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
}
