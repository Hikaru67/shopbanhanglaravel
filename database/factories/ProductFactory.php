<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->unique()->name,
        'product_desc' => $faker->paragraph,
        'product_content' => $this->faker->text,
        'product_price' => rand(100000,30000000),
        'product_image' => '91wAp9q0ssL.jpg',
        'category_id' => rand(1,3),
        'brand_id' => rand(1,4),
        'product_status' => STATUS['ACTIVE'],
    ];
});
