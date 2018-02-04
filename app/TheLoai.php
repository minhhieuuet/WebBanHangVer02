<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table="theloai";

    public function loaitin()
    {
    	return $this->hasMany('App\LoaiTin','idTL','id');
    }
    public function tin()
    {
    	return $this->hasManyThrough('App\Tin','App\LoaiTin','idTL','idLT','id');
    }
}
