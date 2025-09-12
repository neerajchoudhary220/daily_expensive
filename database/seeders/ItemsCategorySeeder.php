<?php

namespace Database\Seeders;

use App\Models\ItemsCategory;
use Illuminate\Database\Seeder;

class ItemsCategorySeeder extends Seeder
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
            ItemsCategory::updateOrCreate([
                'name' => $category['name'],
            ]);
        }
    }
}
