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
}
