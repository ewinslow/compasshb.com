<?php

// use Laracasts\TestDummy\Factory as TestDummy;

/* Test Navigation and Static Pages

** Admin test
*->visit('/admin')
->andType('integration testing', 'query')
->press('Search')
->andSee('You post was added')
->onPage('admin/xxx')
*/

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
}
