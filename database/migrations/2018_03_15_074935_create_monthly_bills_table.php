<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month',50);
            $table->integer('house_rent');
            $table->integer('utility_bill');
            $table->integer('food_bill');
            $table->integer('due_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_bills');
    }
}
