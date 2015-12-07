<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use App\Models\Key\Key;
use App\Models\Messages\Message;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Key::class, new KeyModelFactory());
$factory->define(Message::class, new MessageModelFactory());
//$factory->define(Key::class, function ($faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->email,
//        'password' => str_random(10),
//        'remember_token' => str_random(10),
//    ];
//});
