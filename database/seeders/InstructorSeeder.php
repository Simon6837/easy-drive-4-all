<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instructors')->insert([
            'user_id' => 2,
            'address' => 'straat 2',
            'city' => 'stad',
            'postal_code' => '7971bc',
            'description' => 'hallo ik ben user 20,',
            'image' => '',
        ]);
    }
}
