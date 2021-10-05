<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
           [
            'username' => 'admin1',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
            'is_admin' => 1,
            'created_at' => Carbon::now()
           ],

          [
            'username' => 'sarjid',
            'name' => 'Sarjid Islam',
            'email' => 'sarjid@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
            'is_admin' => 0,
            'created_at' => Carbon::now()
          ],

          [
            'username' => 'jishan',
            'name' => 'Jishan Khan',
            'email' => 'jishan@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
            'is_admin' => 0,
            'created_at' => Carbon::now()
          ]

        ]);

    }
}
