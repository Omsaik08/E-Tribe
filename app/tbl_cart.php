<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_cart extends Model
{
    //
    protected $fillable = [
        'cart_id','cust_id','product_id'
    ];
}
