<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             BrandSeeder::class,
             CategorySeeder::class,
             ProductSeeder::class,
             CustomerSeeder::class,
             AdminSeeder::class,
             ConversationsSeeder::class,
             ParticipantsSeeder::class,
             MessengerSeeder::class,
         ]);

    }
}
