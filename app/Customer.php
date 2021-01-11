<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'customer_username', 'customer_name', 'customer_password', 'customer_email', 'customer_phone'
    ];
    protected $primaryKey = 'customer_id';
    protected $table = 'tbl_customers';
}
