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
    //2.ORDER(maorder, makhachhang, tensanpham, soluong , yeucautukhachhang,dongia,tonggiatriorder,thoigianorder,trangthai)
    public function up()
    {
        Schema::create('item_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_name');
            $table->integer('quantity');
            $table->text('request');
            $table->integer('price');
            $table->integer('total_price');
            $table->date('order_time');
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
        Schema::dropIfExists('item_orders');
    }
};
