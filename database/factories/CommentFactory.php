<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $postsIds = \DB::table('posts')->pluck('id');
    $user = factory(App\User::Class)->create();    
    return [
        'user_id' => $user->id,
        'body' => $faker->sentence,
        'post_id' => $faker->randomElement($array = $postsIds),
    ];
});
