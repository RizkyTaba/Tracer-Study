<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusAlumni extends Model
{
    use HasFactory;

    protected $table = 'tbl_status_alumni'; // Nama tabel
    protected $primaryKey = 'id_status_alumni'; // Primary Key
    protected $fillable = ['status']; // Kolom yang dapat diisi
}
