@extends('layouts.admin-home')

@section('title', 'Daftar Tahun Lulus')

@section('content')
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-semibold mb-4 text-center">Daftar Tahun Lulus</h1>
        <a href="{{ route('tahun_lulus.create') }}" class="btn btn-primary mb-3">Tambah Tahun Lulus</a>
        <table class="table table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID Tahun Lulus</th>
                    <th>Tahun Lulus</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tahunLulus as $tahun)
                    <tr>
                        <td>{{ $tahun->id_tahun_lulus }}</td>
                        <td>{{ $tahun->tahun_lulus }}</td>
                        <td>{{ $tahun->keterangan }}</td>
                        <td>
                            <a href="{{ route('tahun_lulus.edit', $tahun->id_tahun_lulus) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('tahun_lulus.destroy', $tahun->id_tahun_lulus) }}" method="POST" style="display:inline;">
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