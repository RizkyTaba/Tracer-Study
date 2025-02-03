@extends('layouts.admin-home')

@section('title', 'Ubah Tracer Kuliah')

@section('content')
<div class="container mt-4">
    <h2>Ubah Tracer Kuliah</h2>
    <form action="{{ route('tracer_kuliah.update', $tracerKuliah->id_tracer_kuliah) }}" method="POST" class="animated-form">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_alumni" class="form-label"><i class="fas fa-user"></i> Alumni</label>
            <select class="form-control" id="id_alumni" name="id_alumni" required>
                @foreach($alumni as $alumnus)
                    <option value="{{ $alumnus->id_alumni }}" {{ $tracerKuliah->id_alumni == $alumnus->id_alumni ? 'selected' : '' }}>{{ $alumnus->nama_depan }} {{ $alumnus->nama_belakang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_kampus" class="form-label"><i class="fas fa-school"></i> Kampus</label>
            <input type="text" class="form-control" id="tracer_kuliah_kampus" name="tracer_kuliah_kampus" value="{{ $tracerKuliah->tracer_kuliah_kampus }}" required>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_status" class="form-label"><i class="fas fa-info-circle"></i> Status</label>
            <select class="form-control" id="tracer_kuliah_status" name="tracer_kuliah_status" required>
                <option value="aktif" {{ $tracerKuliah->tracer_kuliah_status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="do" {{ $tracerKuliah->tracer_kuliah_status == 'do' ? 'selected' : '' }}>DO</option>
                <option value="lulus" {{ $tracerKuliah->tracer_kuliah_status == 'lulus' ? 'selected' : '' }}>Lulus</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_jenjang" class="form-label"><i class="fas fa-graduation-cap"></i> Jenjang</label>
            <select class="form-control" id="tracer_kuliah_jenjang" name="tracer_kuliah_jenjang" required>
                <option value="d3" {{ $tracerKuliah->tracer_kuliah_jenjang == 'd3' ? 'selected' : '' }}>D3</option>
                <option value="d4" {{ $tracerKuliah->tracer_kuliah_jenjang == 'd4' ? 'selected' : '' }}>D4</option>
                <option value="s1" {{ $tracerKuliah->tracer_kuliah_jenjang == 's1' ? 'selected' : '' }}>S1</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_jurusan" class="form-label"><i class="fas fa-book"></i> Jurusan</label>
            <input type="text" class="form-control" id="tracer_kuliah_jurusan" name="tracer_kuliah_jurusan" value="{{ $tracerKuliah->tracer_kuliah_jurusan }}" required>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_linier" class="form-label"><i class="fas fa-check"></i> Linier</label>
            <select class="form-control" id="tracer_kuliah_linier" name="tracer_kuliah_linier" required>
                <option value="linear" {{ $tracerKuliah->tracer_kuliah_linier == 'linear' ? 'selected' : '' }}>Linear</option>
                <option value="non-linear" {{ $tracerKuliah->tracer_kuliah_linier == 'non-linear' ? 'selected' : '' }}>Non-Linear</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_alamat" class="form-label"><i class="fas fa-map-marker-alt"></i> Alamat</label>
            <input type="text" class="form-control" id="tracer_kuliah_alamat" name="tracer_kuliah_alamat" value="{{ $tracerKuliah->tracer_kuliah_alamat }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('tracer_kuliah.index') }}" class="btn btn-secondary">Kembali</a>
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