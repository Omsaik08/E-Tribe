<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_supplier_product extends Model
{
    //
	protected $fillable = [
        'supplier_id', 'supplier_name', 
		 'phone', 'supplier_email','supplier_password'
    ];
	
}
