<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
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
                'nama' => 'Teknologi Informasi'
            ],
            [
                'nama' => 'Sistem Informasi'
            ],
            [
                'nama' => 'Pendidikan Teknologi Informasi'
            ],
            [
                'nama' => 'Teknik Informatika'
            ],
            [
                'nama' => 'Teknik Komputer'
            ]
            ];

            foreach ($prodi as $key => $value) {
                Prodi::create($value);
            }
    }
}
