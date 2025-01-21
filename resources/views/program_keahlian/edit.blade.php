@extends('layouts.admin-home')

@section('content')
    <h1>Edit Program Keahlian</h1>

    <form action="{{ route('program_keahlian.update', $programKeahlian->id_program_keahlian) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="kode_program_keahlian">Kode Program Keahlian</label>
            <input type="text" class="form-control" id="kode_program_keahlian" name="kode_program_keahlian" value="{{ old('kode_program_keahlian', $programKeahlian->kode_program_keahlian) }}">
            @error('kode_program_keahlian')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="program_keahlian">Program Keahlian</label>
            <input type="text" class="form-control" id="program_keahlian" name="program_keahlian" value="{{ old('program_keahlian', $programKeahlian->program_keahlian) }}">
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
                <option value="{{ $bidangKeahlian->id_bidang_keahlian }}" {{  $programKeahlian->id_bidang_keahlian == $bidangKeahlian->id_bidang_keahlian ? 'selected' : '' }}>{{ $bidangKeahlian->bidang_keahlian }}</option>
                @endforeach
            </select>
            @error('id_bidang_keahlian')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection