<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TracerKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tracerKerjaData = [];
        $faker = \Faker\Factory::create();

        $alumniIds = DB::table('tbl_alumni')->pluck('id_alumni')->toArray();

        for ($i = 0; $i < 50; $i++) {
            $tracerKerjaData[] = [
                'id_alumni' => $alumniIds[array_rand($alumniIds)],
                'tracer_kerja_pekerjaan' => substr($faker->jobTitle, 0, 50),
                'tracer_kerja_nama' => substr($faker->company, 0, 50),
                'tracer_kerja_jabatan' => substr($faker->jobTitle, 0, 50),
                'tracer_kerja_status' => substr($faker->randomElement(['Aktif', 'Tidak Aktif']), 0, 50),
                'tracer_kerja_lokasi' => substr($faker->city, 0, 50),
                'tracer_kerja_alamat' => substr($faker->address, 0, 50),
                'tracer_kerja_tgl_mulai' => $faker->date('Y-m-d', '2020-01-01'),
                'tracer_kerja_gaji' => substr($faker->randomElement(['Rp 5.000.000', 'Rp 10.000.000']), 0, 50),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('tbl_tracer_kerja')->insert($tracerKerjaData);
    }
}