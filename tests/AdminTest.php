<?php

class AdminTest extends TestCase
{
    /** @test */
    public function it_loads_the_admin()
    {
        $this->visit('/admin')
            ->andType('user@example.com', 'email')
            ->andType('secret', 'password')
            ->press('Login')
            ->andSee('Admin Pages')
            ->onPage('/admin');
    }
}
