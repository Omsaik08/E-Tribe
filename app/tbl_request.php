<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_request extends Model
{
    //
	protected $fillable = [
        'supplier_id','category_id','product_name','quantity','image','price','request_status'
    ];
}
