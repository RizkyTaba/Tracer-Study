<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $alumniData = [];
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 100; $i++) {
            $alumniData[] = [
                'id_tahun_lulus' => rand(1, 10), // Sesuaikan dengan id_tahun_lulus yang ada
                'id_konsentrasi_keahlian' => rand(1, 15), // Sesuaikan dengan id_konsentrasi_keahlian yang ada
                'id_status_alumni' => rand(1, 2), // Sesuaikan dengan id_status_alumni yang ada
                'nisn' => $faker->unique()->numerify('##########'), // NISN 10 digit
                'nik' => $faker->unique()->numerify('############'), // NIK 16 digit
                'nama_depan' => substr($faker->firstName, 0, 50), // Nama depan tidak lebih dari 50 karakter
                'nama_belakang' => substr($faker->lastName, 0, 50), // Nama belakang tidak lebih dari 50 karakter
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tempat_lahir' => substr($faker->city, 0, 20), // Tempat lahir tidak lebih dari 20 karakter
                'tgl_lahir' => $faker->date('Y-m-d', '2000-01-01'), // Tanggal lahir antara 2000-01-01 dan sekarang
                'alamat' => substr($faker->address, 0, 50), // Alamat tidak lebih dari 50 karakter
                'no_hp' => $faker->numerify('08##########'), // Nomor HP 12 digit
                'akun_fb' => substr($faker->optional()->userName, 0, 50), // Akun FB tidak lebih dari 50 karakter
                'akun_ig' => substr($faker->optional()->userName, 0, 50), // Akun IG tidak lebih dari 50 karakter
                'akun_tiktok' => substr($faker->optional()->userName, 0, 50), // Akun TikTok tidak lebih dari 50 karakter
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // Password default: "password"
                'status_login' => $faker->randomElement(['0', '1']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('tbl_alumni')->insert($alumniData);
    }
}