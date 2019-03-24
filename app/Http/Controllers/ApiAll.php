<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pelayanan;
use App\Sublayanan;
use App\Admin;
use App\Daerah;

class ApiAll extends Controller
{
    public function pelayanan()
    {
        $pelayanan = Pelayanan::get();
        return response()->json([
            'pelayanan'    => $pelayanan,
        ]);
        
    }
    public function desakelurahan()
    {
        $daerah = Daerah::get();
        return response()->json([
            'daerah' => $daerah
        ]);
    }
}
