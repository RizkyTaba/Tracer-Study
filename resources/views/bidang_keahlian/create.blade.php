@extends('layouts.admin-home')

@section('title', 'Tambah Bidang Keahlian')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">Tambah Bidang Keahlian</h1>
            <div class="d-flex flex-column">
                <form action="{{ route('bidang_keahlian.store') }}" method="POST" class="flex-grow-1">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="kode_bidang_keahlian">Kode Bidang Keahlian</label>
                        <input type="text" name="kode_bidang_keahlian" id="kode_bidang_keahlian" class="form-control" placeholder="Masukan Kode Bidang Keahlian" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="bidang_keahlian">Bidang Keahlian</label>
                        <input type="text" name="bidang_keahlian" id="bidang_keahlian" class="form-control" placeholder="Masukan Nama Bidang Keahlian" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('bidang_keahlian.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection