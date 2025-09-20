<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use Illuminate\Database\Seeder;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Food & Groceries',
            ],
            [
                'name' => 'Transportation',
            ],
            [
                'name' => 'Utilities',
            ],
            [
                'name' => 'Healthcare',
            ],
            [
                'name' => 'Education',
            ],
            [
                'name' => 'Entertainment',
            ],
            [
                'name' => 'Shopping',
            ],
            [
                'name' => 'Others',
            ],
        ];

        foreach ($categories as $category) {
            ExpenseCategory::updateOrCreate(['name' => $category['name']]);
        }
    }
}
