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
        $prodi = [
            [
                'nim' => '205150701111030',
                'nama' => 'Averil Primayuda',
                'angkatan' => 2020,
                'prodiId' => 1,
                'password' => Hash::make('averil123')
            ]
            ];

            foreach ($prodi as $key => $value) {
                Mahasiswa::create($value);
            }
    }
}
