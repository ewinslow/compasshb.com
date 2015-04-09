<?php

class DashboardTest extends TestCase
{
    /** @test */
    public function it_loads_scripture_of_the_day()
    {
        $this->visit('/read');
    }

    /** @test */
    public function it_loads_fellowships()
    {
        $this->visit('/fellowship');
    }

    /** @test */
    public function it_loads_sermons()
    {
        $this->visit('/sermons');
    }

    /** @test */
    public function it_loads_the_blog()
    {
        $this->visit('/blog');
    }

    /** @test */
    public function it_loads_the_pray_page()
    {
        $this->visit('/pray');
    }

    /** @test */
    public function it_loads_the_songs()
    {
        $this->visit('/songs');
    }
}
