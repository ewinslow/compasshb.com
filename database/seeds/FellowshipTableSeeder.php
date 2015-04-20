<?php

use CompassHB\Www\Fellowship;
use Illuminate\Database\Seeder;

class FellowshipTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('fellowships')->delete();

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Fellowship::create([
            'user_id' => 1,
            'title' => 'Jones',
            'description' => '',
            'location' => 'Smith Home',
            'day' => 'Thursday',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
