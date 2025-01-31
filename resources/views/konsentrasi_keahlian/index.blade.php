@extends('layouts.admin-home')

@section('title', 'Daftar Konsentrasi Keahlian')

@section('content')
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-semibold mb-4 text-center">Daftar Konsentrasi Keahlian</h1>
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('konsentrasi_keahlian.create')}}" class="btn btn-primary">Tambah Konsentrasi Keahlian</a>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <table class="table table-striped">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Program Keahlian</th>
                        <th class="py-2 px-4 border-b">Kode</th>
                        <th class="py-2 px-4 border-b">Konsentrasi</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $item->id_konsentrasi_keahlian  }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->programKeahlian->program_keahlian ?? '-' }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->kode_konsentrasi_keahlian}}</td>
                            <td class="py-2 px-4 border-b">{{ $item->konsentrasi_keahlian }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('konsentrasi_keahlian.edit', $item->id_konsentrasi_keahlian) }}" class="btn btn-warning">Ubah</a>
                                <form action="{{ route('konsentrasi_keahlian.destroy', $item->id_konsentrasi_keahlian) }}" method="POST" style="display:inline;">
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

