<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_bill extends Model
{
    //
	protected $fillable = [
        'bill_id', 'order_id','bill_date' , 'discount', 
		'total_bill' 
    ];
}
