<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeederTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function seeder_can_be_run()
    {
        $command = $this->artisan('db:seed');

        $command->assertExitCode(0);
    }
}
