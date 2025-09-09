<?php

namespace Database\Seeders;

use App\Models\ExpensesCategory;
use Illuminate\Database\Seeder;

class ExpensesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Medicine/Healthcare',
            ],
            [
                'name' => 'Vegitables',
            ],
            [
                'name' => 'Grocerry',
            ],
        ];

        foreach ($categories as $category) {
            ExpensesCategory::updateOrCreate([
                'name' => $category['name'],
            ]);
        }
    }
}
