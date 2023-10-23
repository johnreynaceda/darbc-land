<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class AdditionalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'name' => 'Livelihood Program',
        ]);

        Status::create([
            'name' => 'Facility',
        ]);

        Status::create([
            'name' => 'UNPLANTED (AGREED WITH DAR, DARBC & DOLE)',
        ]);

        Status::create([
            'name' => 'Additional Lot',
        ]);

        Status::create([
            'name' => 'Deleted Area as Planted Pineapple',
        ]);

        Status::create([
            'name' => 'DARBC Quarry',
        ]);
    }
}
