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
    public function dataLayanan($slug)
    {
        $layanan = DB::table("$slug")
        ->join('pemohons','pemohons.id','=',"$slug.id_pemohon")
        ->join('daerahs','daerahs.id','=','pemohons.daerah_id')
        ->join('pelayanans','pelayanans.id','=','pemohons.pelayanan_id')
        ->get();

        return DataTables::of($layanan)
        ->addColumn('action',function($data){
            if($data->status == "Belum"){
                return '<a class="btn btn-info btn-sm" href='.url('/kecamatan/layanan').'/'.$data->slug.'/'.$data->kode.$data->id_pemohon.'>Detail </a>';
            }elseif($data->status == "Setuju"){
                return '<a class="btn btn-primary btn-sm" href='.url('/kecamatan/layanan').'/'.$data->slug.'/'.$data->kode.$data->id_pemohon.'/cetak'.'><i class="glyphicon glyphicon-print"></i> Cetak </a>';
            }
            else{
                return '<a class="btn btn-success btn-sm" href='.url('/kecamatan/layanan').'/'.$data->slug.'/'.$data->kode.$data->id_pemohon.'/setujui'.'>Setujui </a>';
            }
            
        })
        ->addIndexColumn()
        ->make(true);
    }
    public function dataSublayanan($slug1,$slug2)
    {
        $layanan = DB::table("$slug2")
        ->join('pemohons','pemohons.id','=',"$slug2.id_pemohon")
        ->join('daerahs','daerahs.id','=','pemohons.daerah_id')
        ->join('pelayanans','pelayanans.id','=','pemohons.pelayanan_id')
        ->join('sublayanans','sublayanans.id','=','pemohons.sublayanan_id')
        ->get();
        return DataTables::of($layanan)
        ->addColumn('action',function($data){
        if($data->status == "Belum"){
            return '<a class="btn btn-info btn-sm" href='.url('/kecamatan/sublayanan').'/'.$data->slug.'/'.$data->kode.$data->id_pemohon.'/detail'.'>Detail </a>';
        }elseif($data->status == "Setuju"){
            return '<a class="btn btn-primary btn-sm" href='.url('/kecamatan/sublayanan').'/'.$data->slug.'/'.$data->kode.$data->id_pemohon.'/cetak'.'><i class="glyphicon glyphicon-print"></i> Cetak  </a>';
        }
        else{
            return '<a class="btn btn-success btn-sm" href='.url('/kecamatan/sublayanan').'/'.$data->slug.'/'.$data->kode.$data->id_pemohon.'/setujui'.'>Setujui </a>';
        }
        })
        ->addIndexColumn()
        ->make(true);
    }
}
