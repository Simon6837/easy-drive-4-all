<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('absence')->insert([
            'instructor_id' => 1,
            'reason' => 'straat 2',
            'start_date' => Carbon::now(),
        ]);
    }
}
