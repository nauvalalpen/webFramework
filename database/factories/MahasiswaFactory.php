<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nama' => fake()->name(),
            'nim' => fake()->bothify('##########'),
            'email' => fake()->unique->safeEmail(),
            'nohp' => fake()->phoneNumber(),
            'jurusan' => fake()->randomElement(['Teknologi INformasi', 'Teknik Elektro', 'Teknik Mesin', 'Akuntansi', 'Administrasi Niaga']),
            'prodi' => fake()->randomElement(['Teknik Informatika', 'Teknik Elektro', 'Teknik Mesin', 'Teknik Industri', 'Teknik Sipil', 'Teknologi Rekayasa Perangkat Lunak']),
            'alamat' => fake()->address(),
        ];
    }
}
