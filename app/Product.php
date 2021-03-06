<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'product_name', 'product_desc', 'product_content', 'product_price', 'product_image', 'category_id', 'brand_id', 'product_status'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';
}
