<?php

use CompassHB\Www\Song;
use Illuminate\Database\Seeder;

class SongTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('songs')->delete();

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Song::create([
            'user_id' => 1,
            'title' => 'O For the Robe of Whiteness',
            'excerpt' => '"Someday Ill see the lamb..."',
            'body' => 'The verses in this song were written by Charitie Lees Smith and were first published in 1860, following a massive revival that took place in Ireland. Charitie was the daughter of a pastor and only about 19 years old when she penned these lyrics. She clearly had a desire to be in heaven and longed to see the Lamb, Jesus Christ, face to face! When Pastor Bobby preached through the Book of Revelation while he was pastoring the youth ministry at Compass Bible Church in Aliso Viejo, he and I sat down to write a chorus for this beautiful hymn.  Someday, I’ll see the Lamb I hope to see you there my friend Shining in his glory Before the throne Someday, I’ll see the Lamb And there my soul will stand With joy I have never known Before the throne This is the confident and sure hope all Christians have: someday, we will see the Lamb upon his throne and I hope to see you there, my friend! By Ryan Pierce',
            'video' => 'https://vimeo.com/109406449',
            'audio' => 'https://s3-us-west-1.amazonaws.com/compasshb-worship/O-For-the-Robe-of-Whiteness.mp3',
            'published_at' => '2015-03-17 00:00:00',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
