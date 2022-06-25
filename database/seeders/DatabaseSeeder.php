<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create(['phone' => '89163403610',
            'email' => 'admin',
            'fullname' => 'Самойлов Даниил Андреевич',
            'role' => 'admin',
            'password' => bcrypt('secret')]);
    }
}
