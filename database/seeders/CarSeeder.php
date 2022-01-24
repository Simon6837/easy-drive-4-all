<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            'type' => 'benzine',
            'brand' => 'seat',
            'model' => 'arosa',
            'license_plate' => '70-ht-tp',
        ]);
    }
}
