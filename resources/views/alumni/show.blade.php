@extends('layouts.admin-home')

@section('title', 'Profil Saya')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Profil Saya</h1>

    <!-- Kartu Informasi Pribadi -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Data Pribadi</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text"><strong>Nama Lengkap:</strong> {{ $alumni->nama_depan }} {{ $alumni->nama_belakang }}</p>
                    <p class="card-text"><strong>NISN:</strong> {{ $alumni->nisn }}</p>
                    <p class="card-text"><strong>NIK:</strong> {{ $alumni->nik }}</p>
                    <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $alumni->jenis_kelamin }}</p>
                    <p class="card-text"><strong>Tempat Lahir:</strong> {{ $alumni->tempat_lahir }}</p>
                    <p class="card-text"><strong>Tanggal Lahir:</strong> {{ $alumni->tgl_lahir }}</p>
                    <p class="card-text"><strong>Tahun Kelulusan:</strong> {{ optional($alumni->tahunLulus)->tahun_lulus }}</p>
                    <p class="card-text"><strong>Status Alumni:</strong> {{ optional($alumni->statusAlumni)->status }}</p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Alamat:</strong> {{ $alumni->alamat }}</p>
                    <p class="card-text"><strong>Nomor Telepon:</strong> {{ $alumni->no_hp }}</p>
                    <p class="card-text"><strong>Akun Facebook:</strong> {{ $alumni->akun_fb }}</p>
                    <p class="card-text"><strong>Akun Instagram:</strong> {{ $alumni->akun_ig }}</p>
                    <p class="card-text"><strong>Akun TikTok:</strong> {{ $alumni->akun_tiktok }}</p>
                    <p class="card-text"><strong>Surel:</strong> {{ $alumni->email }}</p>
                    <p class="card-text"><strong>Kata Sandi:</strong> {{ $alumni->password }}</p>
                    <p class="card-text"><strong>Konsentrasi Keahlian:</strong> {{ optional($alumni->konsentrasiKeahlian)->konsentrasi_keahlian }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Kartu Riwayat Pekerjaan -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="card-title mb-0">Riwayat Pekerjaan</h5>
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
            <h5 class="card-title mb-0">Riwayat Pendidikan</h5>
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
        <a href="{{ route('alumni.edit', $alumni->id_alumni) }}" class="btn btn-primary">Sunting Profil</a>
        <a href="{{ route('alumni.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection