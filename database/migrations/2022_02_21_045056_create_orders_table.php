<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('tracking_no')->default('0');
            $table->string('tracking_msg')->nullable();
             $table->string('payement_mode')->default('0');
             $table->string('payement_id')->nullable();
             $table->string('payement_status')->default('0');
             $table->string('order_status')->default('0');
              $table->string('cancel_reason')->nullable();
               $table->string('table_no');
              $table->tinyInteger('notify')->defaukt('0');

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
        Schema::dropIfExists('orders');
    }
}
