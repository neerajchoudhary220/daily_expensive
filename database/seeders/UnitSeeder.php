<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            [
                'name' => 'Kg',
            ],
            [
                'name' => 'Gm',
            ],
            [
                'name' => 'Packet',
            ],
            [
                'name' => 'Ltr',
            ],
            [
                'name' => 'XL',
            ],
            [
                'name' => 'M',
            ],
            [
                'name' => 'S',
            ],
            [
                'name' => 'XXL',
            ],
            [
                'name' => 'Piece',
            ],
        ];

        foreach ($units as $unit) {
            Unit::updateOrCreate([
                'name' => $unit['name'],
            ]);
        }
    }
}
