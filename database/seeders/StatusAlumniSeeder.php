<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusAlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statusAlumni = [];
        for ($i = 1; $i <= 3; $i++) {
            // Alternatif antara "Bekerja", "Kuliah", dan "Belum Diatur"
            $status = ($i % 3 === 0) ? 'Kuliah' : (($i % 3 === 1) ? 'Bekerja' : 'Belum Diatur');
            $statusAlumni[] = [
                'status' => $status,
            ];
        }

        DB::table('tbl_status_alumni')->insert($statusAlumni);
    }
}