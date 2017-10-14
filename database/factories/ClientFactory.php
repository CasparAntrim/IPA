<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    static $password;

    return [
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'username' => $faker->username,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'company_id' => 1,
        'user_id'   => 1,
        'intake_id' => 1,
        'remember_token' => str_random(10),
    ];
});
