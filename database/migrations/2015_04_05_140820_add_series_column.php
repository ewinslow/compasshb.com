<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeriesColumn extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('sermons', function (Blueprint $table) {
            $table->integer('series_id')->unsigned()->nullable();
            $table->string('ministry')->nullable();

            $table->foreign('series_id')
            ->references('id')
            ->on('series')
            ->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('sermons', function (Blueprint $table) {
            $table->dropColumn('series_id');
            $table->dropColumn('ministry');
        });
    }
}
