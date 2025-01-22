<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $testimoniData = [];
        $faker = \Faker\Factory::create();

        $alumniIds = DB::table('tbl_alumni')->pluck('id_alumni')->toArray();

        for ($i = 0; $i < 20; $i++) {
            $testimoniData[] = [
                'id_alumni' => $alumniIds[array_rand($alumniIds)],
                'testimoni' => substr($faker->paragraph(5), 0, 1000),
                'tgl_testimoni' => $faker->date('Y-m-d', '2020-01-01'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('tbl_testimoni')->insert($testimoniData);
    }
}