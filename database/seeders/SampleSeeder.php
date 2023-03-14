<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sample;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sample::create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'phone' => '1234567890',
            'address' => '1234 Main St',
        ]);
    }
}
