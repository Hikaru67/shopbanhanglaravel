<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Messenger;
use Faker\Generator as Faker;

$factory->define(Messenger::class, function (Faker $faker) {
    return [
        'sender_id' => rand(1,3),
        'conversation_id' => rand(1,6),
        'content' => $faker->sentence,
        'type_message' => TYPE_MESSAGE['TEXT'],
    ];
});
