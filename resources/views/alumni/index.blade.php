@extends('layouts.admin-home')

@section('title', 'Daftar Alumni')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Alumni</h2>
        <a href="{{ route('alumni.create') }}" class="btn btn-primary">
            <i class="fa fa-plus mr-2"></i>Tambah Alumni
        </a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-hover shadow-sm">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>NISN</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumni as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->nama_depan }} {{ $item->nama_belakang }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    <a href="{{ route('alumni.show', $item->id_alumni) }}" class="btn btn-show btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('alumni.edit', $item->id_alumni) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('alumni.destroy', $item->id_alumni) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection