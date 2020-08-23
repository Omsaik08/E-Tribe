<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_customer extends Model
{
    //

	protected $fillable = [
        'cust_id','cust_photo','cust_name','cust_phone', 'cust_email','cust_password','cust_home_addr','cust_office_addr'
    ];

}
