<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Messenger;
use Faker\Generator as Faker;

$factory->define(Messenger::class, function (Faker $faker) {
    return [
        'customer_id' => rand(1,3),
        'receiver_id' => rand(1,3),
        'content' => $faker->sentence,
        'type_message' => TYPE_MESSAGE['TEXT'],
    ];
});
