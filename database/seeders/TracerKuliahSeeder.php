<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TracerKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tracerKuliahData = [];
        $faker = \Faker\Factory::create();

        $alumniIds = DB::table('tbl_alumni')->pluck('id_alumni')->toArray();

        for ($i = 0; $i < 50; $i++) {
            $tracerKuliahData[] = [
                'id_alumni' => $alumniIds[array_rand($alumniIds)],
                'tracer_kuliah_kampus' => substr($faker->company, 0, 45),
                'tracer_kuliah_status' => substr($faker->randomElement(['Aktif', 'Tidak Aktif']), 0, 45),
                'tracer_kuliah_jenjang' => substr($faker->randomElement(['S1', 'S2', 'S3']), 0, 45),
                'tracer_kuliah_jurusan' => substr($faker->randomElement(['Teknik Informatika', 'Sistem Informasi', 'Teknik Elektro']), 0, 45),
                'tracer_kuliah_linier' => substr($faker->randomElement(['Linier', 'Tidak Linier']), 0, 45),
                'tracer_kuliah_alamat' => substr($faker->address, 0, 45),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('tbl_tracer_kuliah')->insert($tracerKuliahData);
    }
}