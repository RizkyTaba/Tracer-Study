<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('raw_student_data', function (Blueprint $table) {
            $table->id();
            $table->string('nisn', 20);
            $table->string('nik', 20);
            $table->string('nama_depan', 50);
            $table->string('nama_belakang', 50)->nullable();
            $table->string('alamat', 100);
            $table->string('tempat_lahir', 50);
        });
    }

    public function down()
    {
        Schema::dropIfExists('raw_student_data');
    }
}; 