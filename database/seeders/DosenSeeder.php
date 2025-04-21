<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // You can add manual seeding like this if needed
        // \App\Models\Dosen::create([
        //     'nama' => 'Dr. Example',
        //     'nik' => '1234567890',
        //     'email' => 'example@university.edu',
        //     'nohp' => '081234567890',
        //     'keahlian' => 'Web Framework',
        //     'alamat' => 'Jl. University Campus',
        // ]);

        // Using factory to create 30 dosen records
        \App\Models\Dosen::factory(30)->create();
    }
}
