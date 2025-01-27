@extends('layouts.admin-home')

@section('title', 'Tambah Tracer Kuliah')

@section('content')
<div class="container mt-4">
    <h2>Tambah Tracer Kuliah</h2>
    <form action="{{ route('tracer_kuliah.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_alumni" class="form-label">Alumni</label>
            <select class="form-control" id="id_alumni" name="id_alumni" required>
                @foreach($alumni as $alumnus)
                    <option value="{{ $alumnus->id_alumni }}">{{ $alumnus->nama_depan }} {{ $alumnus->nama_belakang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_kampus" class="form-label">Kampus</label>
            <input type="text" class="form-control" id="tracer_kuliah_kampus" name="tracer_kuliah_kampus" required>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_status" class="form-label">Status</label>
            <input type="text" class="form-control" id="tracer_kuliah_status" name="tracer_kuliah_status" required>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_jenjang" class="form-label">Jenjang</label>
            <input type="text" class="form-control" id="tracer_kuliah_jenjang" name="tracer_kuliah_jenjang" required>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="tracer_kuliah_jurusan" name="tracer_kuliah_jurusan" required>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_linier" class="form-label">Linier</label>
            <input type="text" class="form-control" id="tracer_kuliah_linier" name="tracer_kuliah_linier" required>
        </div>
        <div class="mb-3">
            <label for="tracer_kuliah_alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="tracer_kuliah_alamat" name="tracer_kuliah_alamat" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection