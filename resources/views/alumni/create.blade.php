@extends('layouts.app')

@section('title', 'Tambah Alumni')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-semibold">Tambah Alumni</h1>
        <form action="{{ route('alumni.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_depan">Nama Depan</label>
                <input type="text" name="nama_depan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama_belakang">Nama Belakang</label>
                <input type="text" name="nama_belakang" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <!-- Tambahkan form lainnya sesuai kebutuhan -->
            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
        </form>
    </div>
@endsection
