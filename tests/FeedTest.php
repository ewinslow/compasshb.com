<?php

class FeedTest extends TestCase
{
    /** @test */
    public function it_loads_the_json()
    {
        $this->call('GET', '/feed/sermon.json');

  //      $this->assertEquals(404, $this->statusCode());
    }

    /** @test */
    public function it_loads_the_sermons()
    {
        $this->visit('/feed/sermons');
    }

    /** @test */
    public function it_loads_the_songs()
    {
        $this->visit('/feed/songs.xml');
    }

    /** @test */
    public function it_loads_the_blog()
    {
        $this->visit('/feed/blog.xml');
    }

    /** @test */
    public function it_loads_the_read()
    {
        $this->visit('/feed/read.xml');
    }
}
