@extends('layouts.admin-home')

@section('title', 'Daftar Bidang Keahlian')

@section('content')
<div class="container mx-auto mt-4">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Bidang Keahlian</h1>
    <a href="{{ route('bidang_keahlian.create') }}" class="btn btn-primary mb-4 transition duration-300 ease-in-out transform hover:scale-105"><i class="fa fa-plus mr-2"></i>Tambah Bidang Keahlian</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 text-left text-gray-600">ID</th>
                    <th class="py-3 px-4 text-left text-gray-600">Kode</th>
                    <th class="py-3 px-4 text-left text-gray-600">Bidang Keahlian</th>
                    <th class="py-3 px-4 text-left text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bidangKeahlians as $programKeahlian)
                    <tr class="transition duration-300 ease-in-out transform hover:bg-gray-200">
                        <td class="py-3 px-4 border-b border-gray-200">{{ $programKeahlian->id_bidang_keahlian }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $programKeahlian->kode_bidang_keahlian }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $programKeahlian->bidang_keahlian }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">
                            <a href="{{ route('bidang_keahlian.edit', $programKeahlian->id_bidang_keahlian) }}" class="btn btn-warning transition duration-300 ease-in-out transform hover:scale-105"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('bidang_keahlian.destroy', $programKeahlian->id_bidang_keahlian) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger transition duration-300 ease-in-out transform hover:scale-105" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection