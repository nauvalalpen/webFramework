<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Jika ingin seeder secara manual
        // \App\Models\Mahasiswa::create([
        //     'nama' => 'Nauval',
        //     'nim' => '123456789',
        //     'email' => 'nauval@gmail.com',
        //     'nohp' => '081234567890',
        //     'jurusan' => 'Teknologi Informasi',
        //     'prodi' => 'Teknik Informatika',
        //     'alamat' => 'Jl. Hijrah Tanah Sirah',
        // ]);

        // Jika ingin menggunakan faker
        \App\Models\Mahasiswa::factory(30)->create();
    }
}
