@extends('layouts.admin-home')

@section('title', 'Ubah Konsentrasi Keahlian')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Ubah Konsentrasi Keahlian</h1>
    <form action="{{ route('konsentrasi_keahlian.update', $konsentrasiKeahlian->id_konsentrasi_keahlian) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="id_program_keahlian">Program Keahlian</label>
            <select name="id_program_keahlian" id="id_program_keahlian" class="form-control" required>
                <option value="">Pilih Program Keahlian</option>
                @foreach ($programKeahlian as $program)
                    <option value="{{ $program->id_program_keahlian }}" {{ $program->id_program_keahlian == $konsentrasiKeahlian->id_program_keahlian ? 'selected' : '' }}>
                        {{ $program->program_keahlian }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="kode_konsentrasi_keahlian">Kode Konsentrasi Keahlian</label>
            <input type="text" name="kode_konsentrasi_keahlian" id="kode_konsentrasi_keahlian" class="form-control" value="{{ $konsentrasiKeahlian->kode_konsentrasi_keahlian }}" required placeholder="Masukan Kode Konsentrasi Keahlian Baru">
        </div>
        <div class="form-group mb-3">
            <label for="konsentrasi_keahlian">Konsentrasi Keahlian</label>
            <input type="text" name="konsentrasi_keahlian" id="konsentrasi_keahlian" class="form-control" value="{{ $konsentrasiKeahlian->konsentrasi_keahlian }}" required placeholder="Masukan Nama Konsentrasi Keahlian Baru">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('konsentrasi_keahlian.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
