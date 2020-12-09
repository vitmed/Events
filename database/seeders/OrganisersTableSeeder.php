<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrganisersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mytime = Carbon::now();

        DB::table('organisers')->insert([
            'name' => "aaaaa",
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('organisers')->insert([
            'name' => "bbbb",
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);

        DB::table('organisers')->insert([
            'name' => "cccc",
            'created_at' => $mytime,
            'updated_at' => $mytime,
        ]);
    }
}
