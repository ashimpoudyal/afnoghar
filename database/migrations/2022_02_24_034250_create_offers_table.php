<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('price')->nullable();
            $table->string('icon1')->nullable();
            $table->string('service1')->nullable();
            $table->string('icon2')->nullable();
            $table->string('service2')->nullable();
            $table->string('icon3')->nullable();
            $table->string('service3')->nullable();
            $table->string('icon4')->nullable();
            $table->string('service4')->nullable();
            $table->string('icon5')->nullable();
            $table->string('service5')->nullable();
            $table->string('icon6')->nullable();
            $table->string('service6')->nullable();
            $table->string('icon7')->nullable();
            $table->string('service7')->nullable();
            $table->string('icon8')->nullable();
            $table->string('service8')->nullable();
             $table->string('icon9')->nullable();
            $table->string('service9')->nullable();
             $table->string('icon10')->nullable();
            $table->string('service10')->nullable();

            $table->string('field1')->nullable();
            $table->string('field2')->nullable();

            $table->string('field3')->nullable();
            $table->string('field4')->nullable();
            $table->string('field5')->nullable();
            $table->string('field6')->nullable();
            $table->string('field7')->nullable();
            $table->string('image')->nullable();
            $table->string('rating')->nullable();

            $table->tinyInteger('featured')->default(0);



            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('offers');
    }
}
