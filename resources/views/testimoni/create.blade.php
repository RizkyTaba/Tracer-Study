@extends('layouts.admin-home')

@section('title', 'Create Testimoni')

@section('content')
<div class="container mt-4">
    <h2>Tambah Testimoni</h2>
    <form action="{{ route('testimoni.store') }}" method="POST">
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
            <label for="testimoni" class="form-label">Testimoni</label>
            <textarea class="form-control" id="testimoni" name="testimoni" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="tgl_testimoni" class="form-label">Tanggal Testimoni</label>
            <input type="date" class="form-control" id="tgl_testimoni" name="tgl_testimoni" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection