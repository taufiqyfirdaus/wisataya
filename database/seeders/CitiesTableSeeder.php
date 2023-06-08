<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            'province_id' => '1',
            'name' => 'Surabaya',
            'slug' => 'surabaya'
        ]);
        City::create([
            'province_id' => '1',
            'name' => 'Malang',
            'slug' => 'malang'
        ]);
        City::create([
            'province_id' => '1',
            'name' => 'Probolinggo',
            'slug' => 'probolinggo'
        ]);
    }
}
