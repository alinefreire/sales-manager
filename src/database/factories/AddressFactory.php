<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Address::class, function (Faker $faker) {

    return [
        'city'          => $faker->city,
        'state'         => $faker->state,
        'street'        => $faker->streetName,
        'number'        => $faker->randomNumber(3),
        'postal_code'   => $faker->postcode,
        'neighborhood'  => $faker->firstNameMale,
        'complement'    => $faker->text
    ];
});
