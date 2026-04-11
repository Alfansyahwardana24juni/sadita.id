<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Buat role admin jika belum ada
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Buat user admin
        $admin = User::firstOrCreate(
            ['email' => 'saditaindonesia@gmail.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('sadita2025'),
            ]
        );

        // Assign role admin ke user
        $admin->assignRole($adminRole);
    }
}