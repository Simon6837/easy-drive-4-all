<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'user_id' => 3,
            'address' => 'straat 2',
            'city' => 'stad',
            'postal_code' => '7971bc',
            'lessons_to_go' => 25,
        ]);
    }
}
