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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('quantity');
            $table->dropColumn('quantity_stock');
            $table->dropColumn('category_id');
            $table->dropColumn('coupon_id');
            $table->dropColumn('brand_id');
            $table->unsignedBigInteger('categories_id')->nullable();
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->unsignedBigInteger('coupons_id')->nullable();
            $table->foreign('coupons_id')->references('id')->on('coupon');
            $table->unsignedBigInteger('brands_id')->nullable();
            $table->foreign('brands_id')->references('id')->on('brands');
            $table->unsignedBigInteger('subcategories_id')->nullable();
            $table->foreign('subcategories_id')->references('id')->on('subcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
