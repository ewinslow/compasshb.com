<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteSlidesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::drop('slides');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('url');
            $table->string('image');
            $table->timestamp('published_at');
            $table->timestamp('expired_at');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }
}
