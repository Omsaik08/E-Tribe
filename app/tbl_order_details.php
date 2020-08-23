<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_order_details extends Model
{
    //
	protected $fillable = [
        'order_id','cust_id','product_id','quantity',
		'order_date','total_price','ship_date'
    ];
}
