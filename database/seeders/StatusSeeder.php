<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'name' => 'Loss in Case',
        ]);

        Status::create([
            'name' => 'Cancelled CLOA',
        ]);

        Status::create([
            'name' => 'Exchange Lot',
        ]);

        Status::create([
            'name' => 'Free Lot',
        ]);

        Status::create([
            'name' => 'Compromise Agreement',
        ]);

        Status::create([
            'name' => 'DARBC Projects',
        ]);
    }
}
