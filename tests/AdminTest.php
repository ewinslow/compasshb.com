<?php

class AdminTest extends TestCase
{
    public function testAdmin()
    {
        $this->visit('/admin')
            ->type('user@example.com', 'email')
            ->type('secret', 'password')
            ->press('Login')
            ->see('Admin Pages')
            ->onPage('/admin');
    }

    public function testCreateSermon()
    {
        $this->visit('/sermons/create');
    }
}
