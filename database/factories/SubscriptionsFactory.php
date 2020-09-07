<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Subscription::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory(\App\Models\User::class)->create()->id;
        },
        'channels_id' => function(){
            return factory(\App\Models\Channels::class)->create()->id;
        }
    ];
});
