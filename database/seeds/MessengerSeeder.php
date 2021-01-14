<?php

use Illuminate\Database\Seeder;

class MessengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Messenger = factory(App\Messenger::class, 55)->create();
    }
}
