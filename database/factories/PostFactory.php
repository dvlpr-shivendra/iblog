<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $title = $faker->sentence,
        'slug' => Str::slug($title),
        'description' => $faker->paragraph,
        'thumbnail' => "https://source.unsplash.com/random/1280x720",
        'user_id' => factory(App\User::class),
        'body' => $faker->paragraph,
    ];
});
