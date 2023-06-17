<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->string('customer_first_name');
            $table->string('customer_email');
            $table->string('customer_last_name');
            $table->string('customer_phone_number');
            $table->string('customer_stress_address');
            $table->date('day_buy_product');
            $table->date('day_thanks');
            $table->date('time_guarantee');
            $table->unsignedBigInteger('bill_id')->nullable();
            $table->foreign('bill_id')->references('id')->on('bill');
            $table->unsignedBigInteger('checkout_id')->nullable();
            $table->foreign('checkout_id')->references('id')->on('checkout');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
