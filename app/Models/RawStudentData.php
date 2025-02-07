<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawStudentData extends Model
{
    use HasFactory;

    protected $table = 'raw_student_data';
    protected $guarded = [];

    public $timestamps = false;
}
