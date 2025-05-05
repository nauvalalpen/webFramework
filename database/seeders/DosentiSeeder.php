<?php

namespace Database\Seeders;

use App\Models\Dosenti;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DosentiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Create 50 dosen records to test pagination
        for ($i = 0; $i < 50; $i++) {
            Dosenti::create([
                'nama' => $faker->name,
                'nik' => $faker->unique()->numerify('##########'),
                'email' => $faker->unique()->safeEmail,
                'nohp' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'bidang' => $faker->randomElement(['Pemrograman', 'Jaringan', 'Multimedia', 'Kecerdasan Buatan', 'Sistem Informasi', 'Database']),
            ]);
        }
    }
}
