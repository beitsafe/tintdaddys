<?php

namespace Database\Seeders;

use App\Models\SizeShade;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(0, 10) as $i) {
            Size::create([
                'size' => rand(1, 99) . '"',
            ]);
        }
    }
}
