<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'id' => $faker->numberBetween(1, 100),
        'title' => $faker->word,
        'body' => $faker->text($maxNbChars = 6),
        'user_id' => $faker->numberBetween(1, 100),
        'solved' => $faker->numberBetween(0,1),
        'created_at' => $now
    ];
});
