<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_product extends Model
{
    //
	protected $fillable = [
        'product_id','supplier_id', 'category_id','product_name','quantity',
		'image', 'price'
    ];

}
