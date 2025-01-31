@extends('layouts.admin-home')

@section('title', 'Tambah Status Alumni')

@section('content')
<div class="container">
    <h1>Tambah Status Alumni</h1>
    <form action="{{ route('status_alumni.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" name="status" id="status" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
