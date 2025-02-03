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
        for ($i = 1; $i <= 5; $i++) {
            // Alternatif antara "Bekerja", "Kuliah", dan "Kuliah dan Bekerja"
            $status = ($i % 3 === 0) ? 'Kuliah' : (($i % 3 === 1) ? 'Bekerja' : 'Kuliah dan Bekerja');
            $statusAlumni[] = [
                'status' => $status,
            ];
        }

        DB::table('tbl_status_alumni')->insert($statusAlumni);
    }
}