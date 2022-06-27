<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();;
             $table->string('zip')->nullable();;
              $table->string('country')->nullable();;
               $table->string('facebook')->nullable();;
                $table->string('instagram')->nullable();;
                 $table->string('twitter')->nullable();;
                  $table->string('linkedin')->nullable();;
            $table->longtext('about')->nullable();;
            $table->string('address')->nullable();
            $table->integer('role_id')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
