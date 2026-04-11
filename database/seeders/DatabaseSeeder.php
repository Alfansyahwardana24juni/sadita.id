<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Jalankan seeder AdminUserSeeder
        $this->call([
            AdminUserSeeder::class,
        ]);
    }
}