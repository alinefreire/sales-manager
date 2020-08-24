<?php

/** @var Factory $factory */

use App\Models\Items;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

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

$factory->define(Items::class, function (Faker $faker) {
    $prod = factory(Product::class)->create();

    return [
        'price' => $faker->randomFloat(1),
        'quantity' => $faker->randomNumber(2),
        'product' => ['id' => $prod->id, 'description' => $prod->description],
    ];
});
