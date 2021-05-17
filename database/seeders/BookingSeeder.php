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
                'date_start' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 08:00'),
                'date_end' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 08:30'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('bookings')
            ->insert([
                'user_id' => '2',
                'room_id' => '2',
                'date_start' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 08:00'),
                'date_end' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 08:30'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('bookings')
            ->insert([
                'user_id' => '1',
                'room_id' => '3',
                'date_start' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 09:00'),
                'date_end' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 09:30'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('bookings')
            ->insert([
                'user_id' => '2',
                'room_id' => '1',
                'date_start' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 09:00'),
                'date_end' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 09:30'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('bookings')
            ->insert([
                'user_id' => '1',
                'room_id' => '2',
                'date_start' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 10:00'),
                'date_end' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 10:30'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('bookings')
            ->insert([
                'user_id' => '2',
                'room_id' => '3',
                'date_start' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 10:00'),
                'date_end' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 10:30'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('bookings')
            ->insert([
                'user_id' => '1',
                'room_id' => '1',
                'date_start' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 11:00'),
                'date_end' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 11:30'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('bookings')
            ->insert([
                'user_id' => '2',
                'room_id' => '2',
                'date_start' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 11:00'),
                'date_end' => Carbon::createFromFormat('Y-m-d H:i', '2021-06-01 11:30'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
