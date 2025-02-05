<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsentrasiKeahlian extends Model
{
    use HasFactory;

    protected $table = 'tbl_konsentrasi_keahlian';
    protected $primaryKey = 'id_konsentrasi_keahlian';

    protected $fillable = [
        'id_program_keahlian',
        'kode_konsentrasi_keahlian',
        'konsentrasi_keahlian',
    ];

    public function programKeahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class, 'id_program_keahlian', 'id_program_keahlian');
    }

    public function alumni()
    {
        return $this->hasMany(Alumni::class, 'id_konsentrasi_keahlian', 'id_konsentrasi_keahlian'); // Sesuaikan dengan kolom yang tepat
    }

    public function bidangKeahlian()
    {
        return $this->belongsTo(BidangKeahlian::class, 'id_bidang_keahlian', 'id_bidang_keahlian');
    }
}