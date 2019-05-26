<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;
use App\Helpers\kustom;
use App\Admin;
use App\Daerah;
use App\Pelayanan;
use App\Sublayanan;
use App\Pemohon;
use App\imb;
use Datatables;
use PDF;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'kode' => 'required|same:kode_capcha'
        ],Kustom::validasi());
        $username   =   $request['username'];
        $password   =   $request['password'];
        $getAdmin   =   Admin::where('username',$username)->get();
        if(count($getAdmin) == 1){
            foreach($getAdmin as $admins){
                if(Hash::check($password, $admins->password)){
                    session([
                        'nama' => $admins->nama,
                        'username' => $admins->username,
                        'level' => $admins->level
                    ]);
                    Admin::where('username',$username)->update([
                        'status' => '1',
                        'remember_token' => $request['_token'],
                        'updated_at' => now(+7.00)
                    ]);
                    if($admins->level == "1"){
                        session([
                            'nama'      => $admins->nama,
                            'username'  => $admins->username,
                            'level'     => $admins->level,
                            'token'     => $request['_token']
                        ]);
                        return redirect('/kecamatan');
                    }else{
                        session([
                            'nama'      => $admins->nama,
                            'username'  => $admins->username,
                            'level'     => $admins->level,
                            'daerah'    => $admins->daerah_id,
                            'token'     => $request['_token']
                        ]);
                        return redirect('/desa');
                    }
                }else{
                    return redirect()->back()->with('gagal','Username atau Password salah');
                }
            }
        }else{
            return redirect()->back()->with('gagal','Username atau Password salah');
        }
    }
    public function keluar()
    {
        $username   =   session('username');
        Admin::where('username',$username)->update([
            'status' => '0',
            'remember_token' => '',
            'updated_at' => now(+7.00)
        ]);
        session()->flush();
        $cookie = \Cookie::forget('token_login');
        return redirect('/')->withCookie($cookie);
    }
    public function homeKec()
    {
        $dataMasuk = count(DB::table("pemohons")->whereDate('created_at', DB::raw('CURDATE()'))->get());
        $dataTotal = count(DB::table('pemohons')->get());
        $pelayanan = Pelayanan::get();
        $pemohon = Pemohon::get();
        $daerah = Daerah::where('nama_daerah','<>','Pemalang')->get();
        $dataLayanan = count($pelayanan);
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'pelayanan' =>  $pelayanan,
            'hariIni'   =>  $dataMasuk,
            'dataTotal' =>  $dataTotal,
            'totalPelayanan' => $dataLayanan,
            'pemohon' => $pemohon,
            'daerah' => $daerah,
            'daer' =>$daerah,
            'dataAdmin' => count(Admin::where('daerah_id','<>',13)->where('status',1)->where('remember_token','<>',null)->get())
        ];
        return view('kecamatan/beranda',$data);
    }
    public function AkunAdmin()
    {
        $datas = Daerah::leftJoin('admins','daerahs.id','=','admins.daerah_id')->where('nama_daerah','<>','Pemalang')->get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'akun'      =>  $datas
        ];

        return view('kecamatan/akun',$data);
    }
    public function AkunAddDesa(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kontak' => 'numeric|required',
            'email' => 'email|required'
        ],Kustom::validasi());
        $nama   =   $request['nama'];
        $kontak  =   $request['kontak'];
        $email  =   $request['email'];
        $cekEmail = Admin::where('email',$email)->get();
        if(count($cekEmail) == 1){
            return redirect()->back()->with('gagal','Email sudah terdaftar');
        }else{
        $daerah  =   Daerah::where('nama_daerah',str_replace("Admin","",$request['username']))->get();

        foreach($daerah as $a){
            Admin::create([
                'username'  =>  $request['username'],
                'nama'      =>  $nama,
                'password'  =>  bcrypt($request['username']),
                'email'     =>  $email,
                'kontak'    =>  $kontak,
                'daerah_id' =>  $a->id,
                'status'    =>  '0',
                'level'     =>  '2',
                'created_at' => now(+7.00)
            ]);
        }
        $admin  =   Admin::where('username',$request['username'])->get();
        foreach($admin as $admin){
            Daerah::where('nama_daerah',str_replace("Admin","",$request['username']))->update([
                'admin_id' => $admin->id
            ]);
        }
        return redirect()->back()->with('sukses','Berhasil menambahkan admin');
    }
    }
    public function editAkun($username,Request $request)
    {
        // dd($request->all());
        $admin  =   Admin::where('username',$username)->update([
            'nama'      =>  $request['nama'],
            'kontak'    =>  $request['kontak'],
            'email'     =>  $request['email']
        ]);
        return redirect()->back()->with('sukses','Berhasil mengubah data admin');
    }
    public function resetPass($username)
    {
        $admin  =   Admin::where('username',$username)->update([
            'password'  =>  bcrypt($username)
        ]);
        return redirect()->back()->with('sukses','Berhasil mereset password');
    }
    public function pelayanan()
    {
        $pelayanan  =   Pelayanan::get();
        $pelayananz  =   Pelayanan::get();
        $sidebar  =   Pelayanan::get();
        $data = [
        'nama'      =>  session('nama'),
        'username'  =>  session('username'),
        'level'     =>  session('level'),
        'token'     =>  session('token'),
        'pelayanan' =>  $pelayanan,
        'pelayananz' =>  $pelayananz,
        'sidebar' =>  $sidebar,
        ];
        return view('kecamatan/pelayanan',$data);
    }
    public function setPelayanan($slug)
    {
        $pelayanan = Pelayanan::where('slug',$slug)->get();
        $sidebar  =   Pelayanan::get();
        foreach($pelayanan as $item){
            $sublayanan = Sublayanan::where('id_pelayanan',$item['id'])->get();
        }
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'pelayanan' =>  $pelayanan,
            'sublayanan' =>  $sublayanan,
            'sidebar' =>  $sidebar,
        ];
        return view('kecamatan/pelayanan-setting',$data);
    }
    public function ubahKetPelayanan($slug, Request $request)
    {
        $pelayanan = Pelayanan::where('slug',$slug)->update([
            'keterangan' => $request['posting']
        ]);
        return redirect()->back()->with('sukses','Berhasil mengubah keterangan');
    }
    public function ubahKetSublayanan($slug , Request $request)
    {
        $pelayanan = Sublayanan::where('slug',$slug)->update([
            'keterangan' => $request['posting']
        ]);
        return redirect()->back()->with('sukses','Berhasil mengubah keterangan');
    }
    public function dataPelayanan()
    {
        // dd(Kustom::CountPrint());
        $dataPrint = Kustom::CountPrint();
        $dataSetuju = Kustom::CountSetuju();
        $dataBelum = Kustom::CountBelum();
        $dataMasuk = count(DB::table("pemohons")->whereDate('created_at', DB::raw('CURDATE()'))->get());
        $pemohon    =   [];
        $pelayanan = Pelayanan::get();
        $pemohon    =   Pemohon::get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'pemohon'   =>  $pemohon,
            'data'      => $dataMasuk,
            'pelayanan' =>  $pelayanan,
            'dataPrint' => $dataPrint,
            'dataSetuju'=> $dataSetuju,
            'dataBelum' => $dataBelum
        ];
        return view('kecamatan/data-pelayanan',$data);
    }
    public function setSublayanan($slug,$slug2)
    {
        $sublayanan     =   Sublayanan::where('slug',$slug2)->get();
        $pelayanan      =   Pelayanan::where('slug',$slug)->get();
        $sidebar  =   Pelayanan::get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'pelayanan' =>  $pelayanan,
            'sublayanan' =>  $sublayanan,
            'sidebar' =>  $sidebar,
        ];
        return view('kecamatan/sublayanan-setting',$data);
    }
    public function dataLayanan($slug)

    {

      $dataMasuk = count(DB::table("pemohons")->whereDate('created_at', DB::raw('CURDATE()'))->get());
      $pelayanan = Pelayanan::where('slug',$slug)->get();
      $pemohon    =   Pemohon::get();
      $sidebar  =   Pelayanan::get();
      foreach($pelayanan as $item){
          $sublayanan = Sublayanan::where('id_pelayanan',$item['id'])->get();
      }
      $data = [
          'nama'      =>  session('nama'),
          'username'  =>  session('username'),
          'level'     =>  session('level'),
          'token'     =>  session('token'),
          'layanan' =>  $pelayanan,
          'sublayanan' =>  $sublayanan,
          'sidebar' =>  $sidebar,
          'pemohon' => $pemohon,
          'Today'   => $dataMasuk
      ];
      return view('kecamatan/data',$data);
    }
    public function dataSublayanan($slug1,$slug2)
    {
        $pelayanan  = Pelayanan::where('slug',$slug1)->get();
        $sublayanan     = Sublayanan::where('slug',$slug2)->get();
        $pemohon    =   Pemohon::get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'sublayanan' => $sublayanan,
            'pelayanan' =>  $pelayanan
        ];
        return view('kecamatan/data-sublayanan',$data);
    }
    public function dataLayananDetail($slug,$id)
    {
        // dd($slug);
        $id_pemohon = substr($id,16,16);
        $layanan = DB::table("$slug")
        ->join('pemohons','pemohons.id','=',"$slug.id_pemohon")
        ->join('daerahs','daerahs.id','=','pemohons.daerah_id')
        ->join('pelayanans','pelayanans.id','=','pemohons.pelayanan_id')
        ->where("$slug.id_pemohon",$id_pemohon)
        ->get();
        // dd($layanan);
        $pelayanan = DB::table("$slug")->where("$slug.id_pemohon",$id_pemohon)->get(["id as pemohon_id"]);
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'layanan' => $layanan,
            'id'    => $pelayanan
        ];
        return view('kecamatan/detail',$data);
    }
    public function dataSublayananDetail($slug2,$id)
    {
        $id_pemohon = substr($id,16,16);
        $layanan = DB::table("$slug2")
        ->join('pemohons','pemohons.id','=',"$slug2.id_pemohon")
        ->join('daerahs','daerahs.id','=','pemohons.daerah_id')
        ->join('pelayanans','pelayanans.id','=','pemohons.pelayanan_id')
        ->join('sublayanans','sublayanans.id','=','pemohons.sublayanan_id')
        ->where("$slug2.id_pemohon",$id_pemohon)
        ->get();
        $pelayanan = DB::table("$slug2")->where("$slug2.id_pemohon",$id_pemohon)->get(["id as pemohon_id"]);
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'layanan' => $layanan,
            'id'    => $pelayanan
        ];
        return view('kecamatan/detail',$data);
    }
    public function ubahDataAdmin()
    {
        $sidebar    =   Pelayanan::get();
        $admin      =   Admin::where('username',session('username'))->get();
        $daerah     =   Daerah::get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'admin'     =>  $admin,
            'daerah'    =>  $daerah
        ];
        return view('kecamatan/profil',$data);
    }
    public function setujuPermohonan($slug,$id)
    {
        $id_pemohon = substr($id,16,16);
        DB::table("$slug")->where('id_pemohon',$id_pemohon)->update([
            // 'status' => "Setuju",
            'pesan' => "Surat keputusan sudah bisa dicetak",
            'updated_at' => now(+7.00)
        ]);
        Pemohon::where('id',$id_pemohon)->update([
            'status' => 'Setuju'
        ]);
        return redirect()->back()->with('sukses','Berhasil menambah No.SK');
    }
    public function cetakSKLayanan($slug,$id)
    {
        $id_pemohon = substr($id,16,16);
        $daerah = Daerah::where('nama_daerah','Pemalang')->get();
        $layanan = DB::table("$slug")
        ->join('pemohons','pemohons.id','=',"$slug.id_pemohon")
        ->join('daerahs','daerahs.id','=','pemohons.daerah_id')
        ->join('pelayanans','pelayanans.id','=','pemohons.pelayanan_id')
        ->where("$slug.id_pemohon",$id_pemohon)
        ->get();
        // dd($layanan);
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'layanan' => $layanan,
            'daerah' => $daerah
        ];
        return view("surat/$slug",$data);
    }
    public function cetakSKLayananPDF($slug,$id)
    {
        $id_pemohon = substr($id,16,16);
        $daerah = Daerah::where('nama_daerah','Pemalang')->get();
        $layanan = DB::table("$slug")
        ->join('pemohons','pemohons.id','=',"$slug.id_pemohon")
        ->join('daerahs','daerahs.id','=','pemohons.daerah_id')
        ->join('pelayanans','pelayanans.id','=','pemohons.pelayanan_id')
        ->where("$slug.id_pemohon",$id_pemohon)
        ->get();
        // dd($layanan);
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'layanan' => $layanan,
            'daerah' => $daerah
        ];
        $pdf = PDF::loadview("surat/$slug",$data);
        // return $pdf->stream("$slug-pdf-$id");
        return $pdf->stream();
        // return view("surat/$slug",$data);
    }
    public function cetakSKSubayanan($slug2,$id)
    {
        $id_pemohon = substr($id,16,16);
        $layanan = DB::table("$slug2")
        ->join('pemohons','pemohons.id','=',"$slug2.id_pemohon")
        ->join('daerahs','daerahs.id','=','pemohons.daerah_id')
        ->join('pelayanans','pelayanans.id','=','pemohons.pelayanan_id')
        ->join('sublayanans','sublayanans.id','=','pemohons.sublayanan_id')
        ->where("$slug2.id_pemohon",$id_pemohon)
        ->get();
        $daerah = Daerah::where('nama_daerah','Pemalang')->get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'layanan' => $layanan,
            'daerah' => $daerah
        ];
        return view("surat/$slug2",$data);
    }
    public function cetakSKSubayananPDF($slug2,$id)
    {
        $id_pemohon = substr($id,16,16);
        $layanan = DB::table("$slug2")
        ->join('pemohons','pemohons.id','=',"$slug2.id_pemohon")
        ->join('daerahs','daerahs.id','=','pemohons.daerah_id')
        ->join('pelayanans','pelayanans.id','=','pemohons.pelayanan_id')
        ->join('sublayanans','sublayanans.id','=','pemohons.sublayanan_id')
        ->where("$slug2.id_pemohon",$id_pemohon)
        ->get();
        $daerah = Daerah::where('nama_daerah','Pemalang')->get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'layanan' => $layanan,
            'daerah' => $daerah
        ];
        $pdf = PDF::loadview("surat/$slug2",$data)->setPaper('letter','potrait');
        // return $pdf->download("$slug2-pdf-$id");
        return $pdf->stream();
    }
    public function editAkunKecamatan(Request $request)
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
    public function editAkunKecamatanPass(Request $request)
    {
        // dd($request->all());
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
    public function editInfoKecamatan($id,Request $request)
    {
        $request->validate([
            'camat'  => 'required',
            'nip'   =>  'required'
        ],Kustom::validasi());
        Daerah::where('id',$id)->update([
            'kepala_daerah' => $request['camat'],
            'nip'           =>  $request['nip']
        ]);
        return redirect()->back()->with('sukses','Berhasil mengubah informasi Kecamatan');
    }
    public function testing(Request $request)
    {
        $request->validate([
            'gambar'    =>  'required | mimes:jpeg,jpg,png,PNG | max:2048',
        ]);
        $gambar = $request->file('gambar');
        $ktp    =   "imbxx.".$gambar->getClientOriginalExtension();
        $path   =   "berkas/imb/ktp/";
        $upload = $request->file('gambar')->move($path,$ktp);
        dd($path.$ktp);
       
        
    }
    public function noSKLayanan($kode,$id,$slug,Request $request)
    {
        // dd(implode("/",$request->no_sk));
        // dd(DB::table("$slug")->where('id',$id)->get());
        $add    =   DB::table("$slug")->where('id',$id)->update([
            'no_sk' => implode("/",$request->no_sk),
            // 'status' => "Sudah ada nomor SK",
            'pesan' => "Sudah diberi nomor SK, Tinggal tunggu disetujui maka surat izin akan diterbitkan",
            'updated_at' => now(+7.00)
        ]);
        Pemohon::where('kode',$kode)->update([
            'status' => "Sudah ada nomor SK",
        ]);
        return redirect()->back()->with('sukses','Berhasil menambah No.SK');
    }
    public function cek()
    {
        dd("Testing");
    }
}
