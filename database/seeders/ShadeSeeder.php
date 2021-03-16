<?php

namespace Database\Seeders;

use App\Models\Shade;
use App\Models\SizeShade;
use Illuminate\Database\Seeder;

class ShadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(0, 10) as $i) {
            Shade::create([
                'shade' => rand(0, 100) . '%'
            ]);
        }
    }
}
