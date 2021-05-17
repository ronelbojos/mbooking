<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                'name' => 'Mario Bojos',
                'email' => 'mario@gmail.com',
                'password' => Hash::make('mario'),
                'remember_token' => Str::random(10),
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('users')
            ->insert([
                'name' => 'Ronel Bojos',
                'email' => 'ronel@gmail.com',
                'password' => Hash::make('ronel'),
                'remember_token' => Str::random(10),
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
