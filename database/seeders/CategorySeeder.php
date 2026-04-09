<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Day Trips', 'slug' => 'day-trips', 'description' => 'One-day excursions and local experiences'],
            ['name' => 'Domestic Trips', 'slug' => 'domestic-trips', 'description' => 'Travel programs across India'],
            ['name' => 'International Trips', 'slug' => 'international-trips', 'description' => 'Global student mobility programs'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
