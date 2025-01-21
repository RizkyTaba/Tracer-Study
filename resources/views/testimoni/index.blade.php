@extends('layouts.admin-home')

@section('content')
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
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('testimoni.destroy', $item->id_testimoni) }}" method="POST" style="display:inline-block;">
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