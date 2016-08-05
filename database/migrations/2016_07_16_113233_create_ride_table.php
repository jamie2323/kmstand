<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('time');
            $table->timestamp('date');  

            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')
                ->references('id')->on('type')
                ->onDelete('cascade');

            $table->integer('location_id')->unsigned();
            $table->foreign('location_id')
                ->references('id')->on('location')
                ->onDelete('cascade');

            $table->integer('billabletime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ride');
    }
}
