<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'body' => $faker->word,
        'completed' => false,
    ];
});
