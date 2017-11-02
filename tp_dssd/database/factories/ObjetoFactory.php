<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Objeto::class, function (Faker $faker) {
  return [
      'nombre' => $faker->name,
      'codigo' => random_int(1,10000),
      //'precio' => random_int(1,1000),
    ];
});
