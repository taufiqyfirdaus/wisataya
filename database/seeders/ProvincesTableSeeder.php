<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Province::create([
            'name' => 'Jawa Timur',
            'slug' => 'jawa-timur'
        ]);
        Province::create([
            'name' => 'Jawa Barat',
            'slug' => 'jawa-barat'
        ]);
        Province::create([
            'name' => 'Jawa Tengah',
            'slug' => 'jawa-tengah'
        ]);
        Province::create([
            'name' => 'Bali',
            'slug' => 'bali'
        ]);
    }
}
