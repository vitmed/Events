<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mytime = Carbon::now();

        DB::table('comments')->insert([
            'event_id'=> "1",
            'text' => "adfghj",
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('comments')->insert([
            'event_id'=> "1",
            'text' => "vvvvvvvv",
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('comments')->insert([
            'event_id'=> "2",
            'text' => "pmmmmm",
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);
    }
}
