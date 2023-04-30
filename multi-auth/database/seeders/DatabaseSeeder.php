<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Role::create([
            'name' => 'Manager'
        ]);

        Role::create([
            'name' => 'Supervisor'
        ]);

        Role::create([
            'name' => 'Staff'
        ]);

        Role::create([
            'name' => 'User'
        ]);
    }
}
