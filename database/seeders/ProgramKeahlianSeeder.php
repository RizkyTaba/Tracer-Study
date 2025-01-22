<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $programKeahlian = [
            [
                'id_bidang_keahlian' => 1, // Sesuaikan dengan id_bidang_keahlian yang ada
                'kode_program_keahlian' => 'PK001',
                'program_keahlian' => 'Rekayasa Perangkat Lunak',
            ],
            [
                'id_bidang_keahlian' => 1,
                'kode_program_keahlian' => 'PK002',
                'program_keahlian' => 'Sistem Informasi',
            ],
            [
                'id_bidang_keahlian' => 2, // Sesuaikan dengan id_bidang_keahlian yang ada
                'kode_program_keahlian' => 'PK003',
                'program_keahlian' => 'Teknik Komputer dan Jaringan',
            ],
            [
                'id_bidang_keahlian' => 2,
                'kode_program_keahlian' => 'PK004',
                'program_keahlian' => 'Multimedia',
            ],
            [
                'id_bidang_keahlian' => 3, // Sesuaikan dengan id_bidang_keahlian yang ada
                'kode_program_keahlian' => 'PK005',
                'program_keahlian' => 'Teknik Elektronika',
            ],
            [
                'id_bidang_keahlian' => 3,
                'kode_program_keahlian' => 'PK006',
                'program_keahlian' => 'Teknik Listrik',
            ],
            [
                'id_bidang_keahlian' => 4, // Sesuaikan dengan id_bidang_keahlian yang ada
                'kode_program_keahlian' => 'PK007',
                'program_keahlian' => 'Teknik Mesin',
            ],
            [
                'id_bidang_keahlian' => 4,
                'kode_program_keahlian' => 'PK008',
                'program_keahlian' => 'Teknik Otomotif',
            ],
            [
                'id_bidang_keahlian' => 5, // Sesuaikan dengan id_bidang_keahlian yang ada
                'kode_program_keahlian' => 'PK009',
                'program_keahlian' => 'Teknik Sipil',
            ],
            [
                'id_bidang_keahlian' => 5,
                'kode_program_keahlian' => 'PK010',
                'program_keahlian' => 'Teknik Bangunan',
            ],
            [
                'id_bidang_keahlian' => 6, // Sesuaikan dengan id_bidang_keahlian yang ada
                'kode_program_keahlian' => 'PK011',
                'program_keahlian' => 'Teknik Kimia',
            ],
            [
                'id_bidang_keahlian' => 6,
                'kode_program_keahlian' => 'PK012',
                'program_keahlian' => 'Teknik Lingkungan',
            ],
            [
                'id_bidang_keahlian' => 7, // Sesuaikan dengan id_bidang_keahlian yang ada
                'kode_program_keahlian' => 'PK013',
                'program_keahlian' => 'Teknik Fisika',
            ],
            [
                'id_bidang_keahlian' => 7,
                'kode_program_keahlian' => 'PK014',
                'program_keahlian' => 'Teknik Nuklir',
            ],
            [
                'id_bidang_keahlian' => 8, // Sesuaikan dengan id_bidang_keahlian yang ada
                'kode_program_keahlian' => 'PK015',
                'program_keahlian' => 'Teknik Biologi',
            ],
        ];

        DB::table('tbl_program_keahlian')->insert($programKeahlian);
    }
}