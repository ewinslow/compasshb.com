<?php

use CompassHB\Www\Blog;
use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('blogs')->delete();

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Blog::create([
            'user_id' => 1,
            'title' => 'Sample blog',
            'body' => 'This is a test blog.',
            'published_at' => '2015-03-17 00:00:00',
        ]);

        Blog::create([
            'user_id' => 1,
            'title' => 'Another blog',
            'body' => 'This is a test blog.',
            'published_at' => '2015-03-15 00:00:00',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
