<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Booking;

class BookingTest extends TestCase
{
    use RefreshDatabase;

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

    /** @test */
    public function a_room_can_be_booked()
    {
        $this->withoutExceptionHandling();

        $this->seed([
            'UserSeeder',
            'RoomSeeder',
        ]);

        $this->post('api/bookings', [
            'user_id' => 1,
            'room_id' => 1,
            'date_start' => '2021-06-01 08:00:00',
            'date_end' => '2021-06-01 17:00:00',
        ]);

        $booking = Booking::find(1);
        $this->assertEquals(1, $booking->id);
    }

    /** @test */
    public function a_room_is_required()
    {
        $this->seed([
            'UserSeeder',
            'RoomSeeder',
        ]);

        $response = $this->post('api/bookings', [
            'user_id' => 1,
            'room_id' => '',
            'date_start' => '2021-06-01 08:00:00',
            'date_end' => '2021-06-01 17:00:00',
        ]);

        $response->assertSessionHasErrors('room_id');
    }

}
