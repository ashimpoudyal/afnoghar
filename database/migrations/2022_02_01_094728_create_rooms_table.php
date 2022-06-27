<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_title');
            $table->string('slug');
            $table->integer('category_id')->unsigned();
            $table->longText('post_content');
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('view_count')->default(0);
            $table->string('ammeties')->nullable();
            $table->string('rating')->nullable();
            $table->string('type')->nullable();
            $table->string('cp')->nullable();
            $table->string('sp')->nullable();
            // $table->string('seo_description')->nullable();
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
        Schema::dropIfExists('rooms');
    }
}
