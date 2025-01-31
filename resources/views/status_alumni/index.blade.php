@extends('layouts.admin-home')

@section('title', 'Daftar Status Alumni')

@section('content')
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-semibold mb-4 text-center">Daftar Status Alumni</h1>
        <a href="{{ route('status_alumni.create') }}" class="btn btn-primary mb-3">Tambah Status</a>
        <table class="table table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($statusAlumni as $status)
                    <tr>
                        <td>{{ $status->id_status_alumni }}</td>
                        <td>{{ $status->status }}</td>
                        <td>
                            <a href="{{ route('status_alumni.edit', $status->id_status_alumni) }}" class="btn btn-warning">Ubah</a>
                            <form action="{{ route('status_alumni.destroy', $status->id_status_alumni) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection