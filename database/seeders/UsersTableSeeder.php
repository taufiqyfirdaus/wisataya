<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administrator = User::create([
            'name' => 'Taufiqy Firdaus',
            'email' => 'taufiqyfirdaus@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $administrator->assignRole('administrator');

        $administrator = User::create([
            'name' => 'Dwi Paga Ayuba',
            'email' => 'dwipaga@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $administrator->assignRole('administrator');

        $contributor = User::create([
            'name' => 'M Rom Doni',
            'email' => 'mromdoni@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $contributor->assignRole('contributor');
    }
}
