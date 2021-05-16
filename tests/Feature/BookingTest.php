<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function api_is_accessible()
    {
        $this->withoutExceptionHandling();

        $this->json('get', 'api/bookings')
            ->assertStatus(200);
    }

}
