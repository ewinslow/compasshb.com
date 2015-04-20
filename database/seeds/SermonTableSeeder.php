<?php

use CompassHB\Www\Sermon;
use Illuminate\Database\Seeder;

class SermonTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sermons')->delete();

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Sermon::create([
            'user_id' => 1,
            'title' => 'And the Gospel Rings Out',
            'body' => 'Transcript would go here',
            'teacher' => 'Bobby Blakey',
            'text' => '1 Thessalonians 1:8',
            'worksheet' => 'https://compasshb.s3.amazonaws.com/worksheets/1-And-the-Gospel-Rings-Out.pdf',
            'video' => 'https://vimeo.com/105505785',
            'sku' => '1',
            'published_at' => '2014-09-07 00:00:00',
            'slug' => 'and-the-gospel-rings-out',
        ]);

        Sermon::create([
            'user_id' => 1,
            'title' => 'Don\'t Forget His Benefits',
            'body' => 'Forgetting comes naturally. Remembering takes work and we must be determined not to forget his benefits.',
            'teacher' => 'Bobby Blakey',
            'text' => 'Joshua 4:19-24',
            'worksheet' => 'https://compasshb.s3.amazonaws.com/worksheets/19-Dont-Forget-His-Benefits.pdf',
            'video' => 'https://vimeo.com/115935144',
            'sku' => '10',
            'published_at' => '2015-01-14 00:00:00',
            'slug' => 'dont-forget-his-benefits',
        ]);

        Sermon::create([
            'user_id' => 2,
            'title' => 'Self-Existance',
            'body' => 'The Self-Existance of God',
            'teacher' => 'Steve B',
            'text' => 'Various',
            'worksheet' => '',
            'video' => 'https://youtu.be/V4bmzC2-YpQ',
            'sku' => '10',
            'published_at' => '2015-01-14 00:00:00',
            'slug' => 'self-existance',
            'ministry' => 'sundayschool',
        ]);

        Sermon::create([
            'user_id' => 1,
            'title' => 'A Future Sermon',
            'body' => 'Coming soon.',
            'teacher' => 'Bobby Blakey',
            'text' => 'Matthew 1:1',
            'sku' => '100',
            'published_at' => '2025-01-14 00:00:00',
            'slug' => 'a-future-sermon',
            'ministry' => null,
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
