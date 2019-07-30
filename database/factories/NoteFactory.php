<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Note;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->paragraph($nbSentences = 8, $variableNbSentences = true),
        'notebooks_id' => $faker->numberBetween(1, 15)
    ];
});
