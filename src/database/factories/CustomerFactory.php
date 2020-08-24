<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
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

$factory->define(Customer::class, function (Faker $faker) {
    $address = factory(Address::class)->make();

    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone_number' => $faker->phoneNumber,
        'observation' => $faker->text,
        'address'   => $address->toArray()
    ];
});
