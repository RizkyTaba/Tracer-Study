@extends('layouts.admin-home')

@section('title', 'Daftar Tracer Kuliah')

@section('title', 'Daftar Tracer Kuliah')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Tracer Kuliah</h2>
        <a href="{{ route('tracer_kuliah.create') }}" class="btn btn-primary">
            <i class="fa fa-plus mr-2"></i> Tambah Tracer Kuliah
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
                <th>Kampus</th>
                <th>Status</th>
                <th>Jenjang</th>
                <th>Jurusan</th>
                <th>Linier</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tracerKuliah as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->alumni->nama_depan }} {{ $item->alumni->nama_belakang }}</td>
                <td>{{ $item->tracer_kuliah_kampus }}</td>
                <td>{{ $item->tracer_kuliah_status }}</td>
                <td>{{ $item->tracer_kuliah_jenjang }}</td>
                <td>{{ $item->tracer_kuliah_jurusan }}</td>
                <td>{{ $item->tracer_kuliah_linier }}</td>
                <td>{{ $item->tracer_kuliah_alamat }}</td>
                <td>
                    <a href="{{ route('tracer_kuliah.edit', $item->id_tracer_kuliah) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i> Ubah
                    </a>
                    <form action="{{ route('tracer_kuliah.destroy', $item->id_tracer_kuliah) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection