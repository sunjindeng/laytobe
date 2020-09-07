<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Channels;

$factory->define(Channels::class, function (Faker $faker) {
    return [
        'name' => $faker->name(10),
        'user_id' => function(){
            return factory(\App\Models\User::class)->create()->id;
        },
        'description' => $faker->sentence(30),
    ];
});
