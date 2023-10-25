<?php

namespace Database\Seeders;

use App\Models\TitleStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TitleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TitleStatus::create([
            'name' => 'Titled with CLOA (TWC)',
        ]);

        TitleStatus::create([
            'name' => 'Titled without CLOA (TWOC)',
        ]);

        TitleStatus::create([
            'name' => 'Untitled with CLOA (UWC)',
        ]);

        TitleStatus::create([
            'name' => 'Untitled without CLOA (UWOC)',
        ]);
    }
}
