<?php

use Illuminate\Database\Seeder;
use App\Messenger;

class MessengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$data = [
            [
                'sender_id' => 2,
                'conversation_id' => 1,
                'content' => "Hello babe",
                'type_message' => TYPE_MESSAGE['TEXT'],
                'created_at' => now(),
            ],
            [
                'sender_id' => 2,
                'conversation_id' => 1,
                'content' => "Hello babe",
                'type_message' => TYPE_MESSAGE['TEXT'],
                'created_at' => now(),
            ],
        ];

        Messenger::insert($data);*/
        $Messenger = factory(App\Messenger::class, 55)->create();
    }
}
