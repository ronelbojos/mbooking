<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')
            ->insert([
                'room_name' => 'Conference Room Regular',
                'room_number' => 'CON-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('rooms')
            ->insert([
                'room_name' => 'Conference Room Deluxe',
                'room_number' => 'CON-02',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('rooms')
            ->insert([
                'room_name' => 'Conference Room Ultra',
                'room_number' => 'CON-03',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
