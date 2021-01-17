<?php

use Illuminate\Database\Seeder;
use App\Participants;

class ParticipantsSeeder extends Seeder
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
                'conversation_id' => 1,
                'customer_id' => 1,
                'created_at' => now(),
            ],
            [
                'conversation_id' => 1,
                'customer_id' => 2,
                'created_at' => now(),
            ],
            [
                'conversation_id' => 2,
                'customer_id' => 1,
                'created_at' => now(),
            ],
            [
                'conversation_id' => 2,
                'customer_id' => 3,
                'created_at' => now(),
            ],
            [
                'conversation_id' => 3,
                'customer_id' => 1,
                'created_at' => now(),
            ],
            [
                'conversation_id' => 4,
                'customer_id' => 3,
                'created_at' => now(),
            ],
            [
                'conversation_id' => 5,
                'customer_id' => 2,
                'created_at' => now(),
            ],
            [
                'conversation_id' => 6,
                'customer_id' => 2,
                'created_at' => now(),
            ],
            [
                'conversation_id' => 6,
                'customer_id' => 3,
                'created_at' => now(),
            ],
        ];
        Participants::insert($data);
    }
}
