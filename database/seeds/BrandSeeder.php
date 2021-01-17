<?php

use App\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'brand_name' => 'APPLE',
                'brand_slug' => 'apple',
                'brand_desc' => 'Apple',
                'brand_status'=> STATUS['ACTIVE'],
                'created_at' => now(),
            ],
            [
                'brand_name' => 'SAMSUNG',
                'brand_slug' => 'samsung',
                'brand_desc' => 'Apple',
                'brand_status'=> STATUS['ACTIVE'],
                'created_at' => now(),
            ],
            [
                'brand_name' => 'XIAOMI',
                'brand_slug' => 'xiaomi',
                'brand_desc' => 'Xiaomi',
                'brand_status'=> STATUS['ACTIVE'],
                'created_at' => now(),
            ],
            [
                'brand_name' => 'OTHER',
                'brand_slug' => 'other',
                'brand_desc' => 'Other',
                'brand_status'=> STATUS['ACTIVE'],
                'created_at' => now(),
            ],
        ];

        Brand::insert($data);
    }
}

