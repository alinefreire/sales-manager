<?php

use App\Models\SalesOrder;
use Illuminate\Database\Seeder;

class SalesOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SalesOrder::class, 10)->create();
    }
}
