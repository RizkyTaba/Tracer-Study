@extends('layouts.admin-home')

@section('title', 'Profil Alumni')

@section('content')
<style>
    /* Animasi untuk elemen form */
    .card {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.5s forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<div class="container mt-4">
    <h1 class="mb-4">Profil Alumni</h1>

    <!-- Kartu Informasi Pribadi -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Data</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text"><strong>Nama Lengkap:</strong> {{ $alumni->nama_depan ?? 'Data Belum Diisi' }} {{ $alumni->nama_belakang ?? 'Data Belum Diisi' }}</p>
                    <p class="card-text"><strong>NISN:</strong> {{ $alumni->nisn ?? 'Data Belum Diisi' }}</p>
                    <p class="card-text"><strong>NIK:</strong> {{ $alumni->nik ?? 'Data Belum Diisi' }}</p>
                    <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $alumni->jenis_kelamin ?? 'Data Belum Diisi' }}</p>
                    <p class="card-text"><strong>Tempat Lahir:</strong> {{ $alumni->tempat_lahir ?? 'Data Belum Diisi' }}</p>
                    <p class="card-text"><strong>Tanggal Lahir:</strong> {{ $alumni->tgl_lahir ?? 'Data Belum Diisi' }}</p>
                    <p class="card-text"><strong>Tahun Kelulusan:</strong> {{ optional($alumni->tahunLulus)->tahun_lulus ?? 'Data Belum Diisi' }}</p>
                    <p class="card-text"><strong>Status Alumni:</strong> {{ optional($alumni->statusAlumni)->status ?? 'Data Belum Diisi' }}</p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Alamat:</strong> {{ $alumni->alamat ?? 'Data Belum Diisi' }}</p>
                    <p class="card-text"><strong>Nomor Telepon:</strong> {{ $alumni->no_hp ?? 'Data Belum Diisi' }}</p>
                    <p class="card-text"><strong>Akun Facebook:</strong> {{ $alumni->akun_fb ?? 'Data Belum Diisi' }}</p>
                    <p class="card-text"><strong>Akun Instagram:</strong> {{ $alumni->akun_ig ?? 'Data Belum Diisi' }}</p>
                    <p class="card-text"><strong>Akun TikTok:</strong> {{ $alumni->akun_tiktok ?? 'Data Belum Diisi' }}</p>
                    <p class="card-text"><strong>Surel:</strong> {{ $alumni->email ?? 'Data Belum Diisi' }}</p>
                    <p class="card-text"><strong>Kata Sandi:</strong> {{ $alumni->password ?? 'Data Belum Diisi' }}</p>
                    <p class="card-text"><strong>Konsentrasi Keahlian:</strong> {{ optional($alumni->konsentrasiKeahlian)->konsentrasi_keahlian ?? 'Data Belum Diisi' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Kartu Riwayat Pekerjaan -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="card-title mb-0">Pekerjaan</h5>
        </div>
        <div class="card-body">
            @if($alumni->tracerKerja && count($alumni->tracerKerja) > 0)
                @foreach($alumni->tracerKerja as $kerja)
                <div class="border-bottom pb-3 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong>Nama Perusahaan:</strong> {{ $kerja->tracer_kerja_nama }}</p>
                            <p class="card-text"><strong>Jabatan:</strong> {{ $kerja->tracer_kerja_jabatan }}</p>
                            <p class="card-text"><strong>Bidang Pekerjaan:</strong> {{ $kerja->tracer_kerja_pekerjaan }}</p>
                            <p class="card-text"><strong>Status Pekerjaan:</strong> {{ $kerja->tracer_kerja_status }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong>Lokasi:</strong> {{ $kerja->tracer_kerja_lokasi }}</p>
                            <p class="card-text"><strong>Alamat Perusahaan:</strong> {{ $kerja->tracer_kerja_alamat }}</p>
                            <p class="card-text"><strong>Penghasilan:</strong> Rp {{ number_format($kerja->tracer_kerja_gaji, 0, ',', '.') }}</p>
                            <p class="card-text"><strong>Tanggal Mulai:</strong> {{ $kerja->tracer_kerja_tgl_mulai }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="text-center">Belum ada data riwayat pekerjaan.</p>
            @endif
        </div>
    </div>

    <!-- Kartu Riwayat Pendidikan -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-info text-white">
            <h5 class="card-title mb-0">Pendidikan</h5>
        </div>
        <div class="card-body">
            @if($alumni->tracerKuliah && count($alumni->tracerKuliah) > 0)
                @foreach($alumni->tracerKuliah as $kuliah)
                <div class="border-bottom pb-3 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong>Perguruan Tinggi:</strong> {{ $kuliah->tracer_kuliah_kampus }}</p>
                            <p class="card-text"><strong>Program Studi:</strong> {{ $kuliah->tracer_kuliah_jurusan }}</p>
                            <p class="card-text"><strong>Jenjang Pendidikan:</strong> {{ $kuliah->tracer_kuliah_jenjang }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong>Status Pendidikan:</strong> {{ $kuliah->tracer_kuliah_status }}</p>
                            <p class="card-text"><strong>Alamat Kampus:</strong> {{ $kuliah->tracer_kuliah_alamat }}</p>
                            <p class="card-text"><strong>Kesesuaian Bidang:</strong> {{ $kuliah->tracer_kuliah_linier }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="text-center">Belum ada data riwayat pendidikan.</p>
            @endif
        </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="text-center mb-4">
        <a href="{{ route('alumni.edit', $alumni->id_alumni) }}" class="btn btn-primary">Edit Data</a>
        <a href="{{ route('alumni.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection