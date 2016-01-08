<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FlyersControllerTest extends TestCase
{
    /** @test */
    public function show_form_to_create_new_flyer()
    {
        $this->visit('flyers/create');
    }
}
