<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAclAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->tinyInteger('post_c')->default(0);
            $table->tinyInteger('post_r')->default(0);
            $table->tinyInteger('post_u')->default(0);
            $table->tinyInteger('post_d')->default(0);



            $table->tinyInteger('manageuser_c')->default(0);
            $table->tinyInteger('manageuser_r')->default(0);
            $table->tinyInteger('manageuser_u')->default(0);
            $table->tinyInteger('manageuser_d')->default(0);



            $table->tinyInteger('admin_c')->default(0);
            $table->tinyInteger('admin_r')->default(0);
            $table->tinyInteger('admin_u')->default(0);
            $table->tinyInteger('admin_d')->default(0);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            //
        });
    }
}
