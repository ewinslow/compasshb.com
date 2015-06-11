<?php

class FeedTest extends TestCase
{
    public function testFeedJson()
    {
        $this->call('GET', '/feed/sermon.json');

  //      $this->assertEquals(404, $this->statusCode());
    }

    public function testFeedSermons()
    {
        $this->visit('/feed/sermons');
    }

    public function testFeedSongs()
    {
        $this->visit('/feed/songs.xml');
    }

    public function testFeedBlog()
    {
        $this->visit('/feed/blog.xml');
    }

    public function testFeedRead()
    {
        $this->visit('/feed/read.xml');
    }
}
