@extends('layouts.admin-home')

@section('title', 'Daftar Alumni')

@section('content')
<div class="container mt-4" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
    <div class="d-flex justify-content-between mb-3">
        <h2 style="color: #343a40;">Daftar Alumni</h2>
        <a href="{{ route('alumni.create') }}" class="btn btn-primary" style="background-color: #007bff; border: none;">
            <i class="fa fa-plus mr-2"></i>Tambah Alumni
        </a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <style>
        /* Animasi untuk elemen tabel */
        .table {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .table th, .table td {
            text-align: center; /* Rata tengah untuk header dan sel */
        }
    </style>
    <table class="table table-bordered table-hover shadow-sm">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
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
            <tr style="transition: background-color 0.3s;">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->nama_depan }} {{ $item->nama_belakang }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    <a href="{{ route('alumni.show', $item->id_alumni) }}" class="btn btn-show btn-sm" style="background-color: #28a745; border: none;">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('alumni.edit', $item->id_alumni) }}" class="btn btn-warning btn-sm" style="background-color: #ffc107; border: none;">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('alumni.destroy', $item->id_alumni) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" style="border: none;">
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