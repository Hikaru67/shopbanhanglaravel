<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'brand_name', 'brand_slug', 'brand_desc', 'brand_status'
    ];
    protected $primaryKey = 'brand_id';
    protected $table = 'tbl_brand';

//    public function product(){
//        return $this->belongsTo();
//    }
}
