<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Notebook;
use Faker\Generator as Faker;

$factory->define(Notebook::class, function (Faker $faker) {
    return [
      'name' => $faker->word,
      'users_id' => $faker->numberBetween(1, 30),
    ];
});
