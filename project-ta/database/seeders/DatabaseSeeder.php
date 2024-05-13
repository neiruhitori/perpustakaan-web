<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::updateOrCreate([
            'nis' => '2141750010',
            'name' => 'Admin',
            'password' => bcrypt('admin'),

        ]);
    }
}
