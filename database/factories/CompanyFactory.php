<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Company::class, function (Faker $faker) {
    return [
        'email' => $faker->companyEmail,
        'name' => $faker->company,
        'url' => $faker->url
    ];
});
