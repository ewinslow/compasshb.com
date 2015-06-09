<?php

class AdminTest extends TestCase
{
    /** @test */
    public function it_loads_the_admin()
    {
        $this->visit('/admin')
            ->type('user@example.com', 'email')
            ->type('secret', 'password')
            ->press('Login')
            ->see('Admin Pages')
            ->onPage('/admin');
    }
}
