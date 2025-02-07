<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RawStudentData;

class RawStudentDataSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nisn' => '1234567890',
                'nik' => '3573010101010001',
                'nama_depan' => 'Budi',
                'nama_belakang' => 'Santoso',
                'alamat' => 'Jl. Mawar No. 1, Jakarta',
                'tempat_lahir' => 'Jakarta',
            ],
            [
                'nisn' => '0987654321',
                'nik' => '3573010101010002',
                'nama_depan' => 'Siti',
                'nama_belakang' => 'Rahayu',
                'alamat' => 'Jl. Melati No. 2, Surabaya',
                'tempat_lahir' => 'Surabaya',
            ],
            [
                'nisn' => '1122334455',
                'nik' => '3573010101010003',
                'nama_depan' => 'Ahmad',
                'nama_belakang' => 'Hidayat',
                'alamat' => 'Jl. Anggrek No. 3, Bandung',
                'tempat_lahir' => 'Bandung',
            ],
            [
                'nisn' => '5544332211',
                'nik' => '3573010101010004',
                'nama_depan' => 'Dewi',
                'nama_belakang' => 'Kusuma',
                'alamat' => 'Jl. Dahlia No. 4, Semarang',
                'tempat_lahir' => 'Semarang',
            ],
            [
                'nisn' => '6677889900',
                'nik' => '3573010101010005',
                'nama_depan' => 'Rudi',
                'nama_belakang' => 'Hermawan',
                'alamat' => 'Jl. Kenanga No. 5, Yogyakarta',
                'tempat_lahir' => 'Yogyakarta',
            ],
            [
                'nisn' => '5544331211',
                'nik' => '35730101010100111',
                'nama_depan' => 'Dewi',
                'nama_belakang' => 'Bebek',
                'alamat' => 'Jl. Dahlia No. 5, Surabaya',
                'tempat_lahir' => 'Surabaya',
            ],
        ];


        foreach ($data as $record) {
            RawStudentData::create($record);
        }
    }
} 