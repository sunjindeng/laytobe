<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Text;
use Faker\Generator as Faker;

$factory->define(\App\Models\Texts::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'name' => $faker->userName,
        'age' => $faker->numberBetween(1,120),
        'email' => $faker->freeEmail,
        'password' => $faker->password,
        'state'=>$faker->numberBetween(1,5)
    ];
});
