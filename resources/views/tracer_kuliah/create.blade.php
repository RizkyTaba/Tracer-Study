@extends('layouts.admin-home')

@section('title', 'Tambah Tracer Kuliah')

@section('content')
<div class="container mt-4">
    <h2>Tambah Tracer Kuliah</h2>
    <form action="{{ route('tracer_kuliah.store') }}" method="POST" class="animated-form">
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
            <label for="tracer_kuliah_kampus" class="form-label"><i class="fas fa-school"></i> Kampus</label>
            <input type="text" class="form-control" id="tracer_kuliah_kampus" name="tracer_kuliah_kampus" required>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_status" class="form-label"><i class="fas fa-info-circle"></i> Status</label>
            <select class="form-control" id="tracer_kuliah_status" name="tracer_kuliah_status" required>
                <option value="aktif">Aktif</option>
                <option value="do">DO</option>
                <option value="lulus">Lulus</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_jenjang" class="form-label"><i class="fas fa-graduation-cap"></i> Jenjang</label>
            <select class="form-control" id="tracer_kuliah_jenjang" name="tracer_kuliah_jenjang" required>
                <option value="d3">D3</option>
                <option value="d4">D4</option>
                <option value="s1">S1</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_jurusan" class="form-label"><i class="fas fa-book"></i> Jurusan</label>
            <input type="text" class="form-control" id="tracer_kuliah_jurusan" name="tracer_kuliah_jurusan" required>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_linier" class="form-label"><i class="fas fa-check"></i> Linier</label>
            <select class="form-control" id="tracer_kuliah_linier" name="tracer_kuliah_linier" required>
                <option value="linear">Linear</option>
                <option value="non-linear">Non-Linear</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_alamat" class="form-label"><i class="fas fa-map-marker-alt"></i> Alamat</label>
            <input type="text" class="form-control" id="tracer_kuliah_alamat" name="tracer_kuliah_alamat" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

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