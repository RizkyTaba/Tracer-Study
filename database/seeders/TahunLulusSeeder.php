<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunLulusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tahunLulus = [];
        for ($tahun = 2015; $tahun <= 2024; $tahun++) {
            $tahunLulus[] = [
                'tahun_lulus' => $tahun,
                'keterangan' => 'Tahun Lulus ' . $tahun,
            ];
        }

        DB::table('tb_tahun_lulus')->insert($tahunLulus);
    }
}