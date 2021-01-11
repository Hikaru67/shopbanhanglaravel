<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
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
                'admin_username' => 'admin',
                'admin_password' => md5('admin'),
                'admin_email' => 'shoppingall4you@gmail.com',
                'admin_name' => 'ADMIN',
                'phone' => '0372056670',
                'created_at' => now(),
            ],
            [
                'admin_username' => 'quang',
                'admin_password' => md5('admin'),
                'admin_email' => 'nhatkytuoihoctro1104@gmail.com',
                'admin_name' => 'ADMIN',
                'phone' => '0817200512',
                'created_at' => now(),
            ],
            [
                'admin_username' => 'hikaru',
                'admin_password' => md5('admin'),
                'admin_email' => 'shinigamii.hikaru@gmail.com',
                'admin_name' => 'ADMIN',
                'phone' => '0372056670',
                'created_at' => now(),
            ],
        ];

        Admin::insert($data);
    }
}
