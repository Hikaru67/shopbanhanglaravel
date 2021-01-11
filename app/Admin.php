<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'admin_id', 'admin_email', 'admin_name', 'admin_username', 'admin_password', 'phone'
    ];
    protected $primaryKey = 'admin_id';
    protected $table = 'tbl_admin';
}
