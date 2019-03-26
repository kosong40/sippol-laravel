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
    public function HalamanAkun()
    {
        $datas = Daerah::leftJoin('admins','daerahs.id','=','admins.daerah_id')->where('nama_daerah','<>','Pemalang')
        ->select('daerahs.id as id','nama_daerah','kepala_daerah','username','nama','kontak','email')->get();
        return DataTables::of($datas)
        ->setRowId('id')
        ->setRowClass('tombol')
        ->addColumn('action',function($data){
            if($data->username == null){
                return "<a href='#add".$data->nama_daerah."'  class='btn btn-primary btn-sm' data-toggle='modal'>Tambah</a>";
            }else{
                return "<a href='#edit".$data->nama_daerah."' class='btn btn-warning btn-sm' data-toggle='modal'>Ubah</a>";
            }
        })
        ->addIndexColumn()->make(true);
    }
    public function desakelurahan()
    {
        $daerah = Daerah::get();
        return response()->json([
            'daerah' => $daerah
        ]);
    }
}
