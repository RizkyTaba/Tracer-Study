@extends('layouts.admin-home')

@section('title', 'Create Tahun Lulus')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">Tambah Tahun Lulus</h1>
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('tahun_lulus.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="tahun_lulus">Tahun Lulus</label>
                            <input type="number" name="tahun_lulus" id="tahun_lulus" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control" required>
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
</div>
@endsection