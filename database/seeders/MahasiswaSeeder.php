<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mhs = [
            [
                'nim' => '205150701111030',
                'nama' => 'Averil Primayuda',
                'angkatan' => 2020,
                'prodiId' => 1,
                'password' => Hash::make('averil123')
            ],
            [
                'nim' => '205150700111054',
                'nama' => 'Gilbert Aryaduta Pinem',
                'angkatan' => 2020,
                'prodiId' => 2,
                'password' => Hash::make('pinem123')
            ]
            ];

            foreach ($mhs as $key => $value) {
                Mahasiswa::create($value);
            }
    }
}
