<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'admin_id', 'admin_name', 'admin_username', 'admin_password', 'admin_email', 'admin_phone'
    ];
    protected $primaryKey = 'admin_id';
    protected $table = 'tbl_admin';
}
