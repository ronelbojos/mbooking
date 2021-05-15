<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')
            ->insert([
                'user_id' => '1',
                'room_id' => '1',
                'date_start' => Carbon::now()->next('Tuesday')->next('8:00'),
                'date_end' => Carbon::now()->next('Tuesday')->next('10:00'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
