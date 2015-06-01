<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExcerptColum extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('sermons', function (Blueprint $table) {
            $table->text('excerpt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('sermons', function (Blueprint $table) {
            $table->dropColumn('excerpt');
        });
    }
}
