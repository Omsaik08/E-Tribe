<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_offers extends Model
{
    //
	protected $fillable = [
	//product_id  (product_id,discount)
	
        'discount_amount', 'product_id', 'offer_start_date', 'offer_end_date'
    ];
}
