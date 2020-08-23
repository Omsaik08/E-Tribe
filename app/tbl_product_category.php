<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_product_category extends Model
{
    //
	protected $fillable = [
        'category_id', 'category_name', 'description'
    ];
}
