<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
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
        self::assertEquals(1, $booking->id);
        self::assertInstanceOf(Carbon::class, $booking->date_start);
        self::assertInstanceOf(Carbon::class, $booking->date_end);
        self::assertEquals('2021-06-01 08:00:00', $booking->date_start->format('Y-m-d H:i:s'));
        self::assertEquals('2021-06-01 17:00:00', $booking->date_end->format('Y-m-d H:i:s'));
    }

    /** @test */
    public function a_booking_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->seed([
            'UserSeeder',
            'RoomSeeder',
            'BookingSeeder',
        ]);

        $booking = Booking::first();

        $this->patch('api/bookings/' . $booking->id, [
            'user_id' => 1,
            'room_id' => 1,
            'date_start' => '2021-06-02 08:00:00',
            'date_end' => '2021-06-02 17:00:00',
        ]);

        self::assertInstanceOf(Carbon::class, $booking->date_start);
        self::assertEquals('2021-06-02 08:00:00', Booking::first()->date_start->format('Y-m-d H:i:s'));
        self::assertEquals('2021-06-02 17:00:00', Booking::first()->date_end->format('Y-m-d H:i:s'));
    }

    /** @test */
    public function a_booking_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $this->seed([
            'UserSeeder',
            'RoomSeeder',
            'BookingSeeder',
        ]);

        $booking = Booking::first();

        self::assertEquals(1, Booking::all()->count());

        $this->delete('api/bookings/' . $booking->id);

        self::assertEquals(0, Booking::all()->count());
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

    /** @test */
    public function a_user_is_required()
    {
        $this->seed([
            'UserSeeder',
            'RoomSeeder',
        ]);

        $response = $this->post('api/bookings', [
            'user_id' => '',
            'room_id' => '1',
            'date_start' => '2021-06-01 08:00:00',
            'date_end' => '2021-06-01 17:00:00',
        ]);

        $response->assertSessionHasErrors('user_id');
    }

    /** @test */
    public function a_date_start_is_required()
    {
        $this->seed([
            'UserSeeder',
            'RoomSeeder',
        ]);

        $response = $this->post('api/bookings', [
            'user_id' => '1',
            'room_id' => '1',
            'date_start' => '',
            'date_end' => '2021-06-01 17:00:00',
        ]);

        $response->assertSessionHasErrors('date_start');
    }


    /** @test */
    public function a_date_end_is_required()
    {
        $this->seed([
            'UserSeeder',
            'RoomSeeder',
        ]);

        $response = $this->post('api/bookings', [
            'user_id' => '1',
            'room_id' => '1',
            'date_start' => '2021-06-01 08:00:00',
            'date_end' => '',
        ]);

        $response->assertSessionHasErrors('date_end');
    }

}
