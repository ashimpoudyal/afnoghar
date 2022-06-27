<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->String('name');
            $table->String('email');
            $table->String('phone');
            $table->String('address');
            $table->String('city');
            $table->String('state');
            $table->String('pincode');
            $table->String('coupon_code')->nullable();
            $table->integer('coupon_value')->nullable();
            $table->integer('total_amount');
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
        Schema::dropIfExists('order_items');
    }
}
