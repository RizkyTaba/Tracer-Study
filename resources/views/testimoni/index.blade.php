@extends('layouts.admin-home')

@section('title', 'Daftar Testimoni')

@section('content')
<style>
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
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Testimoni</h2>
        <a href="{{ route('testimoni.create') }}" class="btn btn-primary">
            <i class="fa fa-plus mr-2"></i> Tambah Testimoni
        </a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-hover shadow-sm">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Alumni</th>
                <th>Testimoni</th>
                <th>Tanggal Testimoni</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testimoni as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->alumni->nama_depan }} {{ $item->alumni->nama_belakang }}</td>
                <td>{{ $item->testimoni }}</td>
                <td>{{ $item->tgl_testimoni }}</td>
                <td>
                    <a href="{{ route('testimoni.edit', $item->id_testimoni) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('testimoni.destroy', $item->id_testimoni) }}" method="POST" style="display:inline-block;">
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