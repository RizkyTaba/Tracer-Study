<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KonsentrasiKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $konsentrasiKeahlian = [
            [
                'id_program_keahlian' => 1, // Sesuaikan dengan id_program_keahlian yang ada
                'kode_konsentrasi_keahlian' => 'KK001',
                'konsentrasi_keahlian' => 'Pengembangan Aplikasi Web',
            ],
            [
                'id_program_keahlian' => 1,
                'kode_konsentrasi_keahlian' => 'KK002',
                'konsentrasi_keahlian' => 'Pengembangan Aplikasi Mobile',
            ],
            [
                'id_program_keahlian' => 2, // Sesuaikan dengan id_program_keahlian yang ada
                'kode_konsentrasi_keahlian' => 'KK003',
                'konsentrasi_keahlian' => 'Manajemen Basis Data',
            ],
            [
                'id_program_keahlian' => 2,
                'kode_konsentrasi_keahlian' => 'KK004',
                'konsentrasi_keahlian' => 'Analisis Sistem Informasi',
            ],
            [
                'id_program_keahlian' => 3, // Sesuaikan dengan id_program_keahlian yang ada
                'kode_konsentrasi_keahlian' => 'KK005',
                'konsentrasi_keahlian' => 'Jaringan Komputer',
            ],
            [
                'id_program_keahlian' => 3,
                'kode_konsentrasi_keahlian' => 'KK006',
                'konsentrasi_keahlian' => 'Keamanan Jaringan',
            ],
            [
                'id_program_keahlian' => 4, // Sesuaikan dengan id_program_keahlian yang ada
                'kode_konsentrasi_keahlian' => 'KK007',
                'konsentrasi_keahlian' => 'Desain Grafis',
            ],
            [
                'id_program_keahlian' => 4,
                'kode_konsentrasi_keahlian' => 'KK008',
                'konsentrasi_keahlian' => 'Animasi 3D',
            ],
            [
                'id_program_keahlian' => 5, // Sesuaikan dengan id_program_keahlian yang ada
                'kode_konsentrasi_keahlian' => 'KK009',
                'konsentrasi_keahlian' => 'Teknik Elektronika Industri',
            ],
            [
                'id_program_keahlian' => 5,
                'kode_konsentrasi_keahlian' => 'KK010',
                'konsentrasi_keahlian' => 'Robotika',
            ],
            [
                'id_program_keahlian' => 6, // Sesuaikan dengan id_program_keahlian yang ada
                'kode_konsentrasi_keahlian' => 'KK011',
                'konsentrasi_keahlian' => 'Teknik Listrik Industri',
            ],
            [
                'id_program_keahlian' => 6,
                'kode_konsentrasi_keahlian' => 'KK012',
                'konsentrasi_keahlian' => 'Pembangkit Tenaga Listrik',
            ],
            [
                'id_program_keahlian' => 7, // Sesuaikan dengan id_program_keahlian yang ada
                'kode_konsentrasi_keahlian' => 'KK013',
                'konsentrasi_keahlian' => 'Teknik Mesin Produksi',
            ],
            [
                'id_program_keahlian' => 7,
                'kode_konsentrasi_keahlian' => 'KK014',
                'konsentrasi_keahlian' => 'Teknik Pemesinan',
            ],
            [
                'id_program_keahlian' => 8, // Sesuaikan dengan id_program_keahlian yang ada
                'kode_konsentrasi_keahlian' => 'KK015',
                'konsentrasi_keahlian' => 'Teknik Otomotif Lanjutan',
            ],
        ];

        DB::table('tbl_konsentrasi_keahlian')->insert($konsentrasiKeahlian);
    }
}