<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('tbl_bidang_keahlian')->insert([
            [
                'kode_bidang_keahlian' => 'BK001',
                'bidang_keahlian' => 'Teknik Informatika',
            ],
            [
                'kode_bidang_keahlian' => 'BK002',
                'bidang_keahlian' => 'Sistem Informasi',
            ],
            [
                'kode_bidang_keahlian' => 'BK003',
                'bidang_keahlian' => 'Teknik Elektro',
            ],
            [
                'kode_bidang_keahlian' => 'BK004',
                'bidang_keahlian' => 'Teknik Mesin',
            ],
            [
                'kode_bidang_keahlian' => 'BK005',
                'bidang_keahlian' => 'Teknik Sipil',
            ],
            [
                'kode_bidang_keahlian' => 'BK006',
                'bidang_keahlian' => 'Teknik Kimia',
            ],
            [
                'kode_bidang_keahlian' => 'BK007',
                'bidang_keahlian' => 'Teknik Fisika',
            ],
            [
                'kode_bidang_keahlian' => 'BK008',
                'bidang_keahlian' => 'Teknik Biologi',
            ],
            [
                'kode_bidang_keahlian' => 'BK009',
                'bidang_keahlian' => 'Teknik Matematika',
            ],
            [
                'kode_bidang_keahlian' => 'BK010',
                'bidang_keahlian' => 'Teknik Statistika',
            ],
            [
                'kode_bidang_keahlian' => 'BK011',
                'bidang_keahlian' => 'Teknik Ekonomi',
            ],
            [
                'kode_bidang_keahlian' => 'BK012',
                'bidang_keahlian' => 'Teknik Manajemen',
            ],
            [
                'kode_bidang_keahlian' => 'BK013',
                'bidang_keahlian' => 'Teknik Akuntansi',
            ],
            [
                'kode_bidang_keahlian' => 'BK014',
                'bidang_keahlian' => 'Teknik Keuangan',
            ],
            [
                'kode_bidang_keahlian' => 'BK015',
                'bidang_keahlian' => 'Teknik Pemasaran',
            ],
        ]);
    }
}