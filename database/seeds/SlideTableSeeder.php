<?php

use CompassHB\Www\Slide;
use Illuminate\Database\Seeder;

class SlideTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('slides')->delete();

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Slide::create([
            'user_id' => 1,
            'title' => 'Easter at Compass',
            'url' => '/link-one',
            'image' => '/image-one',
            'published_at' => '2015-03-17 00:00:00',
        ]);

        Slide::create([
            'user_id' => 1,
            'title' => 'Two Services',
            'url' => '/link-one',
            'image' => '/image-one',
            'published_at' => '2015-03-16 00:00:00',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
