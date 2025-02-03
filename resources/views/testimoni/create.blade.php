@extends('layouts.admin-home')

@section('title', 'Tambah Testimoni')

@section('content')
<div class="container mt-4">
    <h2>Tambah Testimoni</h2>
    <form action="{{ route('testimoni.store') }}" method="POST" class="animated-form">
        @csrf
        <div class="mb-3">
            <label for="id_alumni" class="form-label"><i class="fas fa-user"></i> Alumni</label>
            <select class="form-control" id="id_alumni" name="id_alumni" required>
                @foreach($alumni as $alumnus)
                    <option value="{{ $alumnus->id_alumni }}">{{ $alumnus->nama_depan }} {{ $alumnus->nama_belakang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="testimoni" class="form-label"><i class="fas fa-comment"></i> Testimoni</label>
            <textarea class="form-control" id="testimoni" name="testimoni" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="tgl_testimoni" class="form-label"><i class="fas fa-calendar"></i> Tanggal Testimoni</label>
            <input type="date" class="form-control" id="tgl_testimoni" name="tgl_testimoni" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

<style>
    .animated-form {
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