<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'meta_keywords' => '<p>may tinh, laptop, pc</p>',
                'category_name' => 'Máy tính',
                'category_desc' => '<p>M&aacute;y t&iacute;nh</p>',
                'slug_category_product' => 'may-tinh',
                'category_status'=> STATUS['ACTIVE'],
                'created_at' => now(),
            ],
            [
                'meta_keywords' => '<p>dien thoai, phone, smartphone, điện thoại, android</p>',
                'category_name' => 'Điện thoại',
                'category_desc' => '<p>Điện thoại</p>',
                'slug_category_product' => 'dien-thoai',
                'category_status'=> STATUS['ACTIVE'],
                'created_at' => now(),
            ],
            [
                'meta_keywords' => '<p>phu kien, phụ kiện</p>',
                'category_name' => 'Phụ kiện',
                'category_desc' => '<p>Phụ kiện</p>',
                'slug_category_product' => 'phu-kien',
                'category_status'=> STATUS['ACTIVE'],
                'created_at' => now(),
            ],

        ];

        Category::insert($data);
    }
}
