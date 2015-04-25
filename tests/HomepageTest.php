<?php

class HomepageTest extends TestCase
{
    /** @test */
    public function it_loads_the_hompeage()
    {
        $this->visit('/');
    }

    /** @test */
    public function it_loads_the_who_we_are_page()
    {
        $this->visit('/')
             ->click('Who We Are')
             ->SeePageIs('/who-we-are');
    }

    /** @test */
    public function it_loads_the_kids_page()
    {
        $this->visit('/')
             ->click('Kids Ministry')
             ->SeePageIs('/kids');
    }

    /** @test */
    public function it_loads_the_youth_page()
    {
        $this->visit('/')
             ->click('Youth Ministry')
             ->SeePageIs('/youth');
    }

    /** @test */
    public function it_loads_the_eight_distinctives_page()
    {
        $this->visit('/')
             ->click('8 Distinctives')
             ->SeePageIs('/eight-distinctives');
    }

    /** @test */
    public function it_loads_the_believe_page()
    {
        $this->visit('/')
             ->click('What We Believe')
             ->SeePageIs('/what-we-believe');
    }

    /** @test */
    public function it_loads_the_ice_cream_evangelism_page()
    {
        $this->visit('/')
             ->click('Ice Cream Evangelism')
             ->SeePageIs('/ice-cream-evangelism');
    }

    /** @test */
    public function it_loads_the_photos_page()
    {
        $this->visit('/photos');
    }

    /** @test */
    public function it_loads_the_give_page()
    {
        $this->visit('/')
             ->click('Give')
             ->SeePageIs('/give');
    }

    /** @test */
    public function it_loads_the_sitemap()
    {
        $this->visit('/sitemap.xml');
    }
}
