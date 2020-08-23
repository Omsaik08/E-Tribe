<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_payment extends Model
{
    //
	protected $fillable = [
        'payment_id','bill_id', 'payment_type',  'payment_date'
    ];
}
