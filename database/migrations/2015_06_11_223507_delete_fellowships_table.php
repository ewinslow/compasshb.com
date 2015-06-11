<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteFellowshipsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::drop('fellowships');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::create('fellowships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('description');
            $table->string('location');
            $table->string('day');
            $table->string('slug')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }
}
