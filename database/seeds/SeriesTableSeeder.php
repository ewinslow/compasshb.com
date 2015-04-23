<?php

use CompassHB\Www\Series;
use Illuminate\Database\Seeder;

class SeriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('series')->delete();

        Series::create([
            'user_id' => 1,
            'title' => '3 Most Important Words',
            'body' => 'Details go here',
            'image' => 'http://www.example.com/#',
            'slug' => '3-most-important-words',
        ]);

        Series::create([
            'user_id' => 1,
            'title' => 'Attributes of God',
            'body' => 'Beginning April 12, 2015, Compass Bible Church will begin a new Sunday School series on the Attributes of God. Please join us at 9:00 am in room 102 for breakfast. The teaching beings at 9:30 am.',
            'image' => 'http://www.example.com/#',
            'slug' => 'attributes-of-god',
            'ministry' => 'sundayschool',
        ]);

        Series::create([
            'user_id' => 1,
            'title' => 'Road to Emmaus',
            'body' => 'Description',
            'image' => 'http://www.example.com/#',
            'slug' => 'road-to-emmaus',
            'ministry' => 'sundayschool',
        ]);
    }
}
