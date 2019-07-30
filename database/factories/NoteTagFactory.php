<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\NoteTag;
use Faker\Generator as Faker;

$factory->define(NoteTag::class, function (Faker $faker) {
    return [
        'notes_id' => $faker->numberBetween(1,60) ,
        'tags_id' => $faker->numberBetween(1, 45)
    ];
});
