<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
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
                'customer_username' => 'tuankiet',
                'customer_password' => md5('mamamama'),
                'customer_email' => 'tiasetma2@gmail.com',
                'customer_name' => 'Danh hào tuấn kiệt',
                'avatar' => AVATAR_USER_DATA[2],
                'customer_phone' => '0372056670',
                'created_at' => now(),
            ],
            [
                'customer_username' => 'khabanh',
                'customer_password' => md5('mamamama'),
                'customer_email' => 'tiasetma3@gmail.com',
                'customer_name' => 'Khá bảnh',
                'avatar' => AVATAR_USER_DATA[1],
                'customer_phone' => '0372056670',
                'created_at' => now(),
            ],
            [
                'customer_username' => 'huanhh',
                'customer_password' => md5('mamamama'),
                'customer_email' => 'tiasetma5@gmail.com',
                'customer_name' => 'Huấn hoa hồng',
                'avatar' => AVATAR_USER_DATA[0],
                'customer_phone' => '0372056670',
                'created_at' => now(),
            ],
        ];

        Customer::insert($data);
    }
}
