<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    use HasFactory;

    protected $table = 'tbl_program_keahlian';
    protected $primaryKey = 'id_program_keahlian';    
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_bidang_keahlian',
        'kode_program_keahlian',
        'program_keahlian',
    ];

    public function bidangKeahlian()
    {
        return $this->belongsTo(BidangKeahlian::class, 'id_bidang_keahlian', 'id_bidang_keahlian');
    }

    public function konsentrasiKeahlian()
    {
        return $this->hasMany(KonsentrasiKeahlian::class, 'id_program_keahlian', 'id_program_keahlian'); // Sesuaikan dengan kolom yang tepat
    }
}