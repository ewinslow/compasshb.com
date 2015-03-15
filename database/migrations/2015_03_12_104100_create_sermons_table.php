<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSermonsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sermons', function (Blueprint $table) {
            // @todo: worksheet pdf and announcements pdf, questions and recommended reading
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('worksheet');
            $table->text('body');
            $table->string('teacher');
            $table->string('text');
            $table->string('video')->nullable();
            $table->string('series');
            $table->string('sku');
            $table->timestamps();
            $table->timestamp('published_at');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('sermons');
    }
}
