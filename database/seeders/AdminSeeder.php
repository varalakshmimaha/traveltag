<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@traveltag.in'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('admin123'),
                'role' => 'super_admin',
            ]
        );
    }
}
