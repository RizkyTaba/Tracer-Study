@extends('layouts.user-home')

@section('title', 'Profil Saya')

@section('content')
<style>
    .animate-fade-in {
        opacity: 0;
        animation: fadeIn 0.8s ease-in forwards;
    }

    .animate-slide-in {
        opacity: 0;
        animation: slideIn 0.8s ease-out forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideIn {
        from {
            transform: translateY(20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .delay-1 { animation-delay: 0.2s; }
    .delay-2 { animation-delay: 0.4s; }
    .delay-3 { animation-delay: 0.6s; }
    .delay-4 { animation-delay: 0.8s; }
</style>

<div class="container mt-4">
    <h1 class="mb-4 animate-fade-in">Profil Saya</h1>

    <!-- Personal Information Card -->
    <div class="card shadow-sm mb-4 animate-slide-in delay-1">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Informasi Pribadi</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text"><strong>Nama Lengkap:</strong> {{ $alumni->nama_depan ?? 'Belum Ada Data' }} {{ $alumni->nama_belakang ?? 'Belum Ada Data' }}</p>
                    <p class="card-text"><strong>NISN:</strong> {{ $alumni->nisn ?? 'Belum Ada Data' }}</p>
                    <p class="card-text"><strong>NIK:</strong> {{ $alumni->nik ?? 'Belum Ada Data' }}</p>
                    <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $alumni->jenis_kelamin ?? 'Belum Ada Data' }}</p>
                    <p class="card-text"><strong>Tempat Lahir:</strong> {{ $alumni->tempat_lahir ?? 'Belum Ada Data' }}</p>
                    <p class="card-text"><strong>Tanggal Lahir:</strong> {{ $alumni->tgl_lahir ?? 'Belum Ada Data' }}</p>
                    <p class="card-text"><strong>Tahun Lulus:</strong> {{ optional($alumni->tahunLulus)->tahun_lulus ?? 'Belum Ada Data' }}</p>
                    <p class="card-text"><strong>Status Alumni:</strong> {{ optional($alumni->statusAlumni)->status ?? 'Belum Ada Data' }}</p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Alamat:</strong> {{ $alumni->alamat ?? 'Belum Ada Data' }}</p>
                    <p class="card-text"><strong>No. HP:</strong> {{ $alumni->no_hp ?? 'Belum Ada Data' }}</p>
                    <p class="card-text"><strong>Akun Facebook:</strong> {{ $alumni->akun_fb ?? 'Belum Ada Data' }}</p>
                    <p class="card-text"><strong>Akun Instagram:</strong> {{ $alumni->akun_ig ?? 'Belum Ada Data' }}</p>
                    <p class="card-text"><strong>Akun TikTok:</strong> {{ $alumni->akun_tiktok ?? 'Belum Ada Data' }}</p>
                    <p class="card-text"><strong>Email:</strong> {{ $alumni->email ?? 'Belum Ada Data' }}</p>
                    {{-- <p class="card-text"><strong>Password:</strong> {{ $alumni->password ?? 'Belum Ada Data' }}</p> --}}
                    <p class="card-text"><strong>Konsentrasi Keahlian:</strong> {{ optional($alumni->konsentrasiKeahlian)->konsentrasi_keahlian ?? 'Belum Ada Data' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Work History Card -->
    <div class="card shadow-sm mb-4 animate-slide-in delay-2">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
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
                            <p class="card-text"><strong>Pekerjaan:</strong> {{ $kerja->tracer_kerja_pekerjaan }}</p>
                            <p class="card-text"><strong>Status:</strong> {{ $kerja->tracer_kerja_status }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong>Lokasi:</strong> {{ $kerja->tracer_kerja_lokasi }}</p>
                            <p class="card-text"><strong>Alamat:</strong> {{ $kerja->tracer_kerja_alamat }}</p>
                            <p class="card-text"><strong>Gaji:</strong> Rp {{ number_format($kerja->tracer_kerja_gaji, 0, ',', '.') }}</p>
                            <p class="card-text"><strong>Tanggal Mulai:</strong> {{ $kerja->tracer_kerja_tgl_mulai }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="text-center">Belum ada data pekerjaan.</p>
            @endif
        </div>
    </div>

    <!-- Education History Card -->
    <div class="card shadow-sm mb-4 animate-slide-in delay-3">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Perkuliahan</h5>
        </div>
        <div class="card-body">
            @if($alumni->tracerKuliah && count($alumni->tracerKuliah) > 0)
                @foreach($alumni->tracerKuliah as $kuliah)
                <div class="border-bottom pb-3 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong>Perguruan Tinggi:</strong> {{ $kuliah->tracer_kuliah_kampus }}</p>
                            <p class="card-text"><strong>Program Studi:</strong> {{ $kuliah->tracer_kuliah_jurusan }}</p>
                            <p class="card-text"><strong>Jenjang:</strong> {{ $kuliah->tracer_kuliah_jenjang }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong>Status:</strong> {{ $kuliah->tracer_kuliah_status }}</p>
                            <p class="card-text"><strong>Alamat Kampus:</strong> {{ $kuliah->tracer_kuliah_alamat }}</p>
                            <p class="card-text"><strong>Linier:</strong> {{ $kuliah->tracer_kuliah_linier }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="text-center">Belum ada data pendidikan.</p>
            @endif
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="text-center mb-4 animate-fade-in delay-4">
        <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        <a href="{{ route('user.editAlumni') }}" class="btn btn-primary">Edit Profil</a>
    </div>
        
</div>
@endsection