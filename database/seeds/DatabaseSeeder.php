<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');
        $this->call('SongTableSeeder');
        $this->call('PassageTableSeeder');
        $this->call('FellowshipTableSeeder');
        $this->call('SermonTableSeeder');
        $this->call('SeriesTableSeeder');
        $this->call('BlogTableSeeder');
        $this->call('SlideTableSeeder');
    }
}
