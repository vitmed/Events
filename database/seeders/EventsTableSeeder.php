<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mytime = Carbon::now();

        DB::table('events')->insert([
            'name' => "aaaaa",
            'price' => "10",
            'location' => "kns",
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('events')->insert([
            'name' => "bbbb",
            'price' => "100",
            'location' => "knss",
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('events')->insert([
            'name' => "cccc",
            'price' => "102",
            'location' => "knsd",
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);
    }
}
