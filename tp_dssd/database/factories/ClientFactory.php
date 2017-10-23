<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'lastname' => $faker->lastname,
      'numCli' => random_int(1,10000),
      'user_id' => random_int(1,10)
    ];
});
