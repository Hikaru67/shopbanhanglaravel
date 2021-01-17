<?php

use Illuminate\Database\Seeder;
use App\Conversations;

class ConversationsSeeder extends Seeder
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
                'id' => 1,
                'avatar' => AVATAR_USER_DATA[rand(1)],
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'created_at' => now(),
            ],
            [
                'id' => 4,
                'created_at' => now(),
            ],
            [
                'id' => 5,
                'created_at' => now(),
            ],
            [
                'id' =>6,
                'created_at' => now(),
            ],
        ];
        Conversations::insert($data);
    }
}
