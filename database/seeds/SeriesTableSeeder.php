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
    }
}
