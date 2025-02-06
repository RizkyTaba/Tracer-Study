@extends('layouts.admin-home')

@section('title', 'Tambah Program Keahlian')

@section('content')
    <h1>Tambah Program Keahlian</h1>

    <form action="{{ route('program_keahlian.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="kode_program_keahlian">Kode Program Keahlian</label>
            <input type="text" class="form-control" id="kode_program_keahlian" name="kode_program_keahlian" value="{{ old('kode_program_keahlian') }}" placeholder="Masukan Kode Program Keahlian">
            @error('kode_program_keahlian')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="program_keahlian">Program Keahlian</label>
            <input type="text" class="form-control" id="program_keahlian" name="program_keahlian" value="{{ old('program_keahlian') }}" placeholder="Masukan Nama Program Keahlian">
            @error('program_keahlian')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_bidang_keahlian">Bidang Keahlian</label>
            <select class="form-control" id="id_bidang_keahlian" name="id_bidang_keahlian">
                <option value="">-- Pilih Bidang Keahlian --</option>
                @foreach ($bidangKeahlians as $bidangKeahlian)
                    <option value="{{ $bidangKeahlian->id_bidang_keahlian }}" {{ old('id_bidang_keahlian') == $bidangKeahlian->id_bidang_keahlian ? 'selected' : '' }}>{{ $bidangKeahlian->bidang_keahlian }}</option>
                @endforeach
            </select>
            @error('id_bidang_keahlian')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
