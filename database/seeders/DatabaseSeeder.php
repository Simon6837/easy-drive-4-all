<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(TextSeeder::class);

        if (env("APP_DEBUG")) {
            $this->call(StudentSeeder::class);
            $this->call(InstructorSeeder::class);
            $this->call(CarSeeder::class);
            $this->call(AbsenceSeeder::class);
            $this->call(NotificationsSeeder::class);
        }
    }
}
