<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    //
    protected $table="bills";

    public function customer()
    {
    	return $this->belongsTo('App\Customer','id_customer','id');
    }

    public function billdetails()
    {
    	return $this->hasMany('App\BillDetails','id_bill','id');
    }

    
}
