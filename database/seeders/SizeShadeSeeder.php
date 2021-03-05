<?php

namespace Database\Seeders;

use App\Models\SizeShade;
use Illuminate\Database\Seeder;

class SizeShadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(0, 20) as $i) {
            SizeShade::create([
                'size' => rand(1, 99) . '"',
                'shade' => rand(0, 100) . '%',
                'quantity' => rand(1, 1000),
                'price' => rand(1, 1000)
            ]);
        }
    }
}
