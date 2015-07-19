<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBulletinColumn extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('sermons', function (Blueprint $table) {
            $table->string('bulletin')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('sermons', function (Blueprint $table) {
            $table->dropColumn('bulletin');
        });
    }
}
