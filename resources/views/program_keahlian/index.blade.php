@extends('layouts.admin-home')

@section('title', 'Daftar Program Keahlian')

@section('content')
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-semibold mb-4 text-center">Program Keahlian</h1>
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('program_keahlian.create')}}" class="btn btn-primary">Tambah Program Keahlian</a>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Kode</th>
                        <th>Program Keahlian</th>
                        <th>Bidang Keahlian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programKeahlians as $programKeahlian)
                        <tr>
                            <td>{{ $programKeahlian->kode_program_keahlian }}</td>
                            <td>{{ $programKeahlian->program_keahlian }}</td>
                            <td>{{ $programKeahlian->bidangKeahlian->bidang_keahlian}}</td>
                            <td>
                                <a href="{{ route('program_keahlian.edit', ['program_keahlian' => $programKeahlian->id_program_keahlian]) }}" class="btn btn-warning">Ubah</a>
                                <form action="{{ route('program_keahlian.destroy', $programKeahlian->id_program_keahlian) }}" method="POST" style="display:inline;">
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
    </div>
@endsection

