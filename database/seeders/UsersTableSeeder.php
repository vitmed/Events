<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
    php artisan migrate:refresh --seed
     **/
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $mytime = Carbon::now();

        DB::table('users')->insert([
            'name' => "aaaaa",
            'email' => "ll@g.lh",
            'role' => "user",
            'password' => Hash::make('asdfghjkl'),
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('users')->insert([
        'name' => "bbbb",
        'email' => "bb@g.lh",
        'role' => "user",
            'password' => Hash::make('asdfghjkl'),
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('users')->insert([
            'name' => "cccc",
            'email' => "cc@g.lh",
            'role' => "user",
            'password' => Hash::make('asdfghjkl'),
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);
    }
}
