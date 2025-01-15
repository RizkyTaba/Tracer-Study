@extends('layouts.app')

@section('title', 'Daftar Alumni')

@section('content')
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-semibold mb-4">Daftar Alumni</h1>
        <a href="{{ route('alumni.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600">Tambah Alumni</a>
        <table class="table-auto w-full mt-4 bg-white shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">ID Alumni</th>
                    <th class="px-4 py-2">Nama Depan</th>
                    <th class="px-4 py-2">Nama Belakang</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumni as $alum)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $alum->id_alumni }}</td>
                        <td class="px-4 py-2">{{ $alum->nama_depan }}</td>
                        <td class="px-4 py-2">{{ $alum->nama_belakang }}</td>
                        <td class="px-4 py-2">{{ $alum->email }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('alumni.edit', $alum) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('alumni.destroy', $alum) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
