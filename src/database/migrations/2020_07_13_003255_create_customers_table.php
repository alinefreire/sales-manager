<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('code')->autoIncrement();
            $table->string('name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('observation');
            $table->json('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
