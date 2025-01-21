@extends('layouts.admin-home')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Tambah Konsentrasi Keahlian</h1>
    <form action="{{ route('konsentrasi_keahlian.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="id_program_keahlian">Program Keahlian</label>
            <select name="id_program_keahlian" id="id_program_keahlian" class="form-control" required>
                <option value="">Pilih Program Keahlian</option>
                @foreach ($programKeahlian as $program)
                    <option value="{{ $program->id_program_keahlian }}">{{ $program->program_keahlian }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="kode_konsentrasi_keahlian">Kode Konsentrasi Keahlian</label>
            <input type="text" name="kode_konsentrasi_keahlian" id="kode_konsentrasi_keahlian" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="konsentrasi_keahlian">Konsentrasi Keahlian</label>
            <input type="text" name="konsentrasi_keahlian" id="konsentrasi_keahlian" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('konsentrasi_keahlian.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
