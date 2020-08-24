<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Constants\StatusConstants;
use App\Models\SalesOrder;
use App\Models\Items;
use App\Models\Customer;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

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

$factory->define(SalesOrder::class, function (Faker $faker) {
    $items = factory(Items::class,2)->make()->toArray();
    $customer = factory(Customer::class)->create();

    $statuses = [
        StatusConstants::NOT_STARTED,
        StatusConstants::DISAPPROVED,
        StatusConstants::APPROVED,
        StatusConstants::PRODUCE_PENDING,
        StatusConstants::IN_PRODUCTION,
        StatusConstants::DELIVERED,
        StatusConstants::CANCELED,
        StatusConstants::FINISHED,
    ];

    $current_status = [
        "code" => Arr::random($statuses),
        "created_at" => Carbon::now()->toIso8601String()

    ];
    return [
        'customer' => ['id' => $customer->id, 'name' => $customer->name],
        'items'     => $items,
        'delivery_date' => $faker->dateTime(),
        'current_status' => $current_status,
        'status_log' => [$current_status],
    ];
});

$factory->state(SalesOrder::class, 'not_started', [
    'current_status' => ["code" => StatusConstants::NOT_STARTED],
]);

$factory->state(SalesOrder::class, 'approved', [
    'current_status' => ["code" => StatusConstants::APPROVED],
]);

$factory->state(SalesOrder::class, 'produce_pending', [
    'current_status' => ["code" => StatusConstants::PRODUCE_PENDING],
]);

$factory->state(SalesOrder::class, 'in_production', [
    'current_status' => ["code" => StatusConstants::IN_PRODUCTION],
]);

$factory->state(SalesOrder::class, 'delivered', [
    'current_status' => ["code" => StatusConstants::DELIVERED],
]);

$factory->state(SalesOrder::class, 'finished', [
    'current_status' => ["code" => StatusConstants::FINISHED],
]);

