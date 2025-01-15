<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BidangKeahlian;

class BidangKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BidangKeahlian::create(['kode_bidang_keahlian' => 'K001', 'bidang_keahlian' => 'Teknologi Informasi']);
        BidangKeahlian::create(['kode_bidang_keahlian' => 'K002', 'bidang_keahlian' => 'Bisnis dan Manajemen']);
        BidangKeahlian::create(['kode_bidang_keahlian' => 'K003', 'bidang_keahlian' => 'Teknik Mesin']);
    }
}
