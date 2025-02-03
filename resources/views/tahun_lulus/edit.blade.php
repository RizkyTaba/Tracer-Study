@extends('layouts.admin-home')

@section('title', 'Ubah Tahun Lulus')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">Edit Tahun Lulus</h1>
            <div class="d-flex flex-column">
                <form action="{{ route('tahun_lulus.update', ['tahun_lulu' => $tahunLulus->id_tahun_lulus]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="tahun_lulus">Tahun Lulus</label>
                        <input type="number" name="tahun_lulus" id="tahun_lulus" class="form-control" value="{{ $tahunLulus->tahun_lulus }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{ $tahunLulus->keterangan }}" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('tahun_lulus.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection