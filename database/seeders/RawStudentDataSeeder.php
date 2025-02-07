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
                'nik' => '3573010101010011',
                'nama_depan' => 'Dewi',
                'nama_belakang' => 'Bebek',
                'alamat' => 'Jl. Dahlia No. 5, Surabaya',
                'tempat_lahir' => 'Surabaya',
            ],
            [
                'nisn' => '2233445566',
                'nik' => '3573010101010012',
                'nama_depan' => 'Joko',
                'nama_belakang' => 'Susilo',
                'alamat' => 'Jl. Melati No. 6, Malang',
                'tempat_lahir' => 'Malang',
            ],
            [
                'nisn' => '3344556677',
                'nik' => '3573010101010013',
                'nama_depan' => 'Rina',
                'nama_belakang' => 'Wati',
                'alamat' => 'Jl. Cempaka No. 7, Bali',
                'tempat_lahir' => 'Bali',
            ],
            [
                'nisn' => '4455667788',
                'nik' => '3573010101010014',
                'nama_depan' => 'Tono',
                'nama_belakang' => 'Prabowo',
                'alamat' => 'Jl. Flamboyan No. 8, Medan',
                'tempat_lahir' => 'Medan',
            ],
            [
                'nisn' => '5566778899',
                'nik' => '3573010101010015',
                'nama_depan' => 'Sari',
                'nama_belakang' => 'Murni',
                'alamat' => 'Jl. Angsana No. 9, Palembang',
                'tempat_lahir' => 'Palembang',
            ],
            [
                'nisn' => '6677889901',
                'nik' => '3573010101010016',
                'nama_depan' => 'Eko',
                'nama_belakang' => 'Setiawan',
                'alamat' => 'Jl. Kenanga No. 10, Makassar',
                'tempat_lahir' => 'Makassar',
            ],
            [
                'nisn' => '7788990012',
                'nik' => '3573010101010017',
                'nama_depan' => 'Lina',
                'nama_belakang' => 'Sari',
                'alamat' => 'Jl. Melati No. 11, Surabaya',
                'tempat_lahir' => 'Surabaya',
            ],
            [
                'nisn' => '8899001123',
                'nik' => '3573010101010018',
                'nama_depan' => 'Fajar',
                'nama_belakang' => 'Hidayat',
                'alamat' => 'Jl. Mawar No. 12, Jakarta',
                'tempat_lahir' => 'Jakarta',
            ],
            [
                'nisn' => '9900112234',
                'nik' => '3573010101010019',
                'nama_depan' => 'Nina',
                'nama_belakang' => 'Sari',
                'alamat' => 'Jl. Cempaka No. 13, Bandung',
                'tempat_lahir' => 'Bandung',
            ],
            [
                'nisn' => '1011121314',
                'nik' => '3573010101010020',
                'nama_depan' => 'Dani',
                'nama_belakang' => 'Prasetyo',
                'alamat' => 'Jl. Flamboyan No. 14, Yogyakarta',
                'tempat_lahir' => 'Yogyakarta',
            ],
        ];


        foreach ($data as $record) {
            RawStudentData::create($record);
        }
    }
} 