<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'tbl_alumni';
    protected $primaryKey = 'id_alumni';
    protected $fillable = [
        'id_tahun_lulus', 'id_konsentrasi_keahlian', 'id_status_alumni', 'nisn', 'nik', 
        'nama_depan', 'nama_belakang', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'alamat',
        'no_hp', 'akun_fb', 'akun_ig', 'akun_tiktok', 'email', 'password', 'status_login'
    ];
}
