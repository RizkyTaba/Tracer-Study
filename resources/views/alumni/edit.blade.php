@extends('layouts.app')

@section('title', 'Edit Alumni')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-semibold">Edit Alumni</h1>
        <form action="{{ route('alumni.update', $alumni) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_depan">Nama Depan</label>
                <input type="text" name="nama_depan" class="form-control" value="{{ $alumni->nama_depan }}" required>
            </div>
            <div class="form-group">
                <label for="nama_belakang">Nama Belakang</label>
                <input type="text" name="nama_belakang" class="form-control" value="{{ $alumni->nama_belakang }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $alumni->email }}" required>
            </div>
            <!-- Tambahkan form lainnya sesuai kebutuhan -->
            <button type="submit" class="btn btn-primary mt-4">Update</button>
        </form>
    </div>
@endsection
