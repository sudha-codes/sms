<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sudha.com',
            'password' => bcrypt('sudha'), // default password
            'is_admin' => true,
        ]);
    }
}
