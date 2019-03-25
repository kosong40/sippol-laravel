<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pelayanan;
use App\Sublayanan;
use App\Admin;
use App\Daerah;
use DataTables;

class ApiAll extends Controller
{
    public function pelayanan()
    {
        $pelayanan = Pelayanan::select('id','pelayanan','jenis_pelayanan','slug')->get();
        return DataTables::of($pelayanan)
        ->addColumn('action',function($slug){
            return '<a class="btn btn-warning btn-sm" href='.url('/kecamatan/pelayanan').'/'.$slug->slug.'>Ubah </a>';
        })->make(true);
        
    }
    public function desakelurahan()
    {
        $daerah = Daerah::get();
        return response()->json([
            'daerah' => $daerah
        ]);
    }
}
