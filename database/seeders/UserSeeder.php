<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Administrador',
            'email' => 'admin',
            'password' => bcrypt('1234')
        ]);

        $user->assignRole('Admin');

        $user = User::create([
            'name' => 'Yanibis',
            'email' => 'yanibis.alian',
            'password' => bcrypt('1234')
        ]);

        $user->assignRole('View');
    }
}
