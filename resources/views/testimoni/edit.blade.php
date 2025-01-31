@extends('layouts.admin-home')

@section('title', 'Ubah Testimoni')

@section('content')
<div class="container mt-4">
    <h2>Ubah Testimoni</h2>
    <form action="{{ route('testimoni.update', $testimoni->id_testimoni) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_alumni" class="form-label">Alumni</label>
            <select class="form-control" id="id_alumni" name="id_alumni" required>
                @foreach($alumni as $alumnus)
                    <option value="{{ $alumnus->id_alumni }}" {{ $testimoni->id_alumni == $alumnus->id_alumni ? 'selected' : '' }}>{{ $alumnus->nama_depan }} {{ $alumnus->nama_belakang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="testimoni" class="form-label">Testimoni</label>
            <textarea class="form-control" id="testimoni" name="testimoni" rows="4" required>{{ $testimoni->testimoni }}</textarea>
        </div>
        <div class="mb-3">
            <label for="tgl_testimoni" class="form-label">Tanggal Testimoni</label>
            <input type="date" class="form-control" id="tgl_testimoni" name="tgl_testimoni" value="{{ $testimoni->tgl_testimoni }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('testimoni.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection