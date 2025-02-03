@extends('layouts.admin-home')

@section('title', 'Ubah Tracer Kerja')

@section('content')
<div class="container mt-4">
    <h2>Ubah Tracer Kerja</h2>
    <form action="{{ route('tracer_kerja.update', $tracerKerja->id_tracer_kerja) }}" method="POST" class="animated-form">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_alumni" class="form-label"><i class="fas fa-user"></i> Alumni</label>
            <select class="form-control" id="id_alumni" name="id_alumni" required>
                @foreach($alumni as $alumnus)
                    <option value="{{ $alumnus->id_alumni }}" {{ $tracerKerja->id_alumni == $alumnus->id_alumni ? 'selected' : '' }}>{{ $alumnus->nama_depan }} {{ $alumnus->nama_belakang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tracer_kerja_pekerjaan" class="form-label"><i class="fas fa-briefcase"></i> Pekerjaan</label>
            <input type="text" class="form-control" id="tracer_kerja_pekerjaan" name="tracer_kerja_pekerjaan" value="{{ $tracerKerja->tracer_kerja_pekerjaan }}" required>
        </div>
        <div class="mb-3">
            <label for="tracer_kerja_nama" class="form-label"><i class="fas fa-building"></i> Nama Perusahaan</label>
            <input type="text" class="form-control" id="tracer_kerja_nama" name="tracer_kerja_nama" value="{{ $tracerKerja->tracer_kerja_nama }}" required>
        </div>
        <div class="mb-3">
            <label for="tracer_kerja_jabatan" class="form-label"><i class="fas fa-user-tie"></i> Jabatan</label>
            <input type="text" class="form-control" id="tracer_kerja_jabatan" name="tracer_kerja_jabatan" value="{{ $tracerKerja->tracer_kerja_jabatan }}" required>
        </div>
        <div class="mb-3">
            <label for="tracer_kerja_status" class="form-label"><i class="fas fa-check-circle"></i> Status</label>
            <select class="form-control" id="tracer_kerja_status" name="tracer_kerja_status" required>
                <option value="tetap" {{ $tracerKerja->tracer_kerja_status == 'tetap' ? 'selected' : '' }}>Karyawan Tetap</option>
                <option value="kontrak" {{ $tracerKerja->tracer_kerja_status == 'kontrak' ? 'selected' : '' }}>Karyawan Kontrak</option>
                <option value="freelance" {{ $tracerKerja->tracer_kerja_status == 'freelance' ? 'selected' : '' }}>Pekerja Lepas (Freelance)</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tracer_kerja_lokasi" class="form-label"><i class="fas fa-map-marker-alt"></i> Lokasi</label>
            <input type="text" class="form-control" id="tracer_kerja_lokasi" name="tracer_kerja_lokasi" value="{{ $tracerKerja->tracer_kerja_lokasi }}" required>
        </div>
        <div class="mb-3">
            <label for="tracer_kerja_alamat" class="form-label"><i class="fas fa-address-card"></i> Alamat</label>
            <input type="text" class="form-control" id="tracer_kerja_alamat" name="tracer_kerja_alamat" value="{{ $tracerKerja->tracer_kerja_alamat }}" required>
        </div>
        <div class="mb-3">
            <label for="tracer_kerja_tgl_mulai" class="form-label"><i class="fas fa-calendar-alt"></i> Tanggal Mulai</label>
            <input type="date" class="form-control" id="tracer_kerja_tgl_mulai" name="tracer_kerja_tgl_mulai" value="{{ $tracerKerja->tracer_kerja_tgl_mulai }}" required>
        </div>
        <div class="mb-3">
            <label for="tracer_kerja_gaji" class="form-label"><i class="fas fa-dollar-sign"></i> Gaji</label>
            <input type="text" class="form-control" id="tracer_kerja_gaji" name="tracer_kerja_gaji" value="{{ $tracerKerja->tracer_kerja_gaji }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('tracer_kerja.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<style>
    .animated-form {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }
    .animated-form.show {
        opacity: 1;
        transform: translateY(0);
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.animated-form');
        form.classList.add('show');
    });
</script>
@endsection