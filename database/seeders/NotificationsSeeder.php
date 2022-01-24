<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('notifications')->insert([
            'role' => 'leerling',
            'title' => 'Welkom',
            'notification' => 'Welkom bij easyDrive4All',
            'valid_until' => $now,
        ]); DB::table('notifications')->insert([
            'role' => 'instructeur',
            'title' => 'Welkom',
            'notification' => 'Welkom in onze nieuwe applicatie',
            'valid_until' => $now,
        ]);
    }
}
