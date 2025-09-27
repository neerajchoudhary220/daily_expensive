<?php

namespace Database\Seeders;

use App\Models\IncomeSourceCategory;
use Illuminate\Database\Seeder;

class IncomeSourceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Salary',
            ],
            [
                'name' => 'Freelancing',
            ],
            [
                'name' => 'Investment',
            ],
            [
                'name' => 'Business',
            ],
            [
                'name' => 'Other',
            ],
        ];

        foreach ($categories as $category) {
            IncomeSourceCategory::updateOrCreate(['name' => $category['name']]);
        }
    }
}
