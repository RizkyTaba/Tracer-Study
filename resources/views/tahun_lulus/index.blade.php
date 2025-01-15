@extends('layouts.admin-home')

@section('title', 'Daftar Tahun Lulus')

@section('content')
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-semibold mb-4 text-center">Daftar Tahun Lulus</h1>
        <a href="{{ route('tahun_lulus.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">Tambah Tahun Lulus</a>
        <table class="table-auto w-full mt-4 bg-white shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">ID Tahun Lulus</th>
                    <th class="px-4 py-2 text-left">Tahun Lulus</th>
                    <th class="px-4 py-2 text-left">Keterangan</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tahunLulus as $tahun)
                    <tr class="border-b hover:bg-gray-50 transition duration-300">
                        <td class="px-4 py-2">{{ $tahun->id_tahun_lulus }}</td>
                        <td class="px-4 py-2">{{ $tahun->tahun_lulus }}</td>
                        <td class="px-4 py-2">{{ $tahun->keterangan }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('tahun_lulus.edit', $tahun->id_tahun_lulus) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300">Edit</a>
                            <form action="{{ route('tahun_lulus.destroy', $tahun->id_tahun_lulus) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 transition duration-300" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection