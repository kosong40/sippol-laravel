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
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'sidebar' =>  $sidebar,
        ];
        return view('desa/pengaturan',$data);
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
        return redirect()->back()->with('sukses','Berhasil mengajukan permohonan');
    }
}
