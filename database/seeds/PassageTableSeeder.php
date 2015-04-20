<?php

use CompassHB\Www\Passage;
use Illuminate\Database\Seeder;

class PassageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('passages')->delete();

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Passage::create([
            'user_id' => 1,
            'title' => 'Matthew 1',
            'published_at' => '2015-03-10 00:00:00',
        ]);

        Passage::create([
            'user_id' => 1,
            'title' => 'Matthew 2',
            'published_at' => '2015-03-11 00:00:00',
        ]);

        Passage::create([
            'user_id' => 1,
            'title' => 'Matthew 3',
            'published_at' => '2015-03-12 00:00:00',
        ]);

        Passage::create([
            'user_id' => 1,
            'title' => 'Matthew 4',
            'published_at' => '2015-03-13 00:00:00',
        ]);

        Passage::create([
            'user_id' => 1,
            'title' => 'Matthew 5',
            'published_at' => '2015-03-16 00:00:00',
        ]);

        Passage::create([
            'user_id' => 1,
            'title' => 'Matthew 6',
            'published_at' => '2015-03-17 00:00:00',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
