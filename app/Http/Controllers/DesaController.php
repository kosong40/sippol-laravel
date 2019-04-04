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
}
