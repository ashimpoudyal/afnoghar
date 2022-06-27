<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->integer('price')->nullable();;
            $table->tinyInteger('status')->default(1);
            $table->date('date')->nullable();
            $table->string('time')->nullable();
            $table->longtext('description')->nullable();
            $table->string('excerpt')->nullable();
            $table->string('map')->nullable();
            $table->string('slug');
            $table->integer('category_id')->unsigned();
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
        Schema::dropIfExists('events');
    }
}
