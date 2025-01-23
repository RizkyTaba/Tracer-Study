@extends('layouts.admin-home')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Detail Alumni</h1>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Informasi Alumni</h5>
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
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Alamat:</strong> {{ $alumni->alamat }}</p>
                    <p class="card-text"><strong>No. HP:</strong> {{ $alumni->no_hp }}</p>
                    <p class="card-text"><strong>Akun Facebook:</strong> {{ $alumni->akun_fb }}</p>
                    <p class="card-text"><strong>Akun Instagram:</strong> {{ $alumni->akun_ig }}</p>
                    <p class="card-text"><strong>Akun TikTok:</strong> {{ $alumni->akun_tiktok }}</p>
                    <p class="card-text"><strong>Email:</strong> {{ $alumni->email }}</p>
                    <p class="card-text"><strong>Status Login:</strong> 
                        <span class="badge {{ $alumni->status_login == '1' ? 'bg-success' : 'bg-secondary' }}">
                            {{ $alumni->status_login == '1' ? 'Online' : 'Offline' }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('alumni.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>
</div>
@endsection