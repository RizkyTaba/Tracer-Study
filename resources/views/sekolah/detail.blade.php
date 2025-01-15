@extends('layouts.admin-home')

@section('title', 'Detail Sekolah')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Detail Sekolah</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Kode Sekolah:</h5>
            <p class="card-text">{{ $sekolah->kode_sekolah }}</p>

            <h5 class="card-title">Nama Sekolah:</h5>
            <p class="card-text">{{ $sekolah->nama_sekolah }}</p>

            <h5 class="card-title">Alamat:</h5>
            <p class="card-text">{{ $sekolah->alamat }}</p>

            <a href="{{ route('sekolah.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
        </div>
    </div>
</div>
@endsection
