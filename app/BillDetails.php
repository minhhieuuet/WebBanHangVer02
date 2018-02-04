<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetails extends Model
{
    //
    protected $table="bill_detail";
    public function bills()
    {
    	return $this->belongsTo('App\Bills','id_bill','id');
    }

    public function products()
    {
    	return $this->hasOne('App\Products','id');
    }

    
}
