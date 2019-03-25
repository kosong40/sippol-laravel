<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\Daerah;
use App\Pelayanan;
use App\Sublayanan;
use Datatables;

class AdminController extends Controller
{
    public function login(Request $request)
    {
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
                            'nama' => $admins->nama,
                            'username' => $admins->username,
                            'level' => $admins->level,
                            'token' => $request['_token']
                        ]);
                        return redirect('/kecamatan');
                    }else{
                        session([
                            'nama' => $admins->nama,
                            'username' => $admins->username,
                            'level' => $admins->level,
                            'daerah'    => $admins->daerah_id,
                            'token' => $request['_token']
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
        return redirect('/');
    }
    public function homeKec()
    {
        $sidebar  =   Pelayanan::get();
        $pelayanan = Pelayanan::get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'sidebar' =>  $sidebar,
            'pelayanan' =>  $pelayanan,
        ];
        return view('kecamatan/beranda',$data);
    }
    public function AkunAdmin()
    {
        $datas = Daerah::leftJoin('admins','daerahs.id','=','admins.daerah_id')->where('nama_daerah','<>','Pemalang')->get();
        $sidebar  =   Pelayanan::get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'sidebar'    =>  $sidebar,
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
        ]);
        $nama   =   $request['nama'];
        $kontak  =   $request['kontak'];
        $email  =   $request['email'];
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
    public function dataPelayanan()
    {
        $pelayanan = Pelayanan::get();
        $data = [
            'nama'      =>  session('nama'),
            'username'  =>  session('username'),
            'level'     =>  session('level'),
            'token'     =>  session('token'),
            'pelayanan' =>  $pelayanan,
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
          'layanan' =>  $pelayanan,
          'sublayanan' =>  $sublayanan,
          'sidebar' =>  $sidebar,
      ];
      return view('kecamatan/data',$data);
    }


    //DESA
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
 
}
