<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    protected $guarded = ['id'];
    public function imb()
    {
        return $this->hasOne('App\imb');
    }
}
