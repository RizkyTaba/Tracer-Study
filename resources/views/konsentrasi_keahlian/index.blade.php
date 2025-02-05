@extends('layouts.admin-home')

@section('title', 'Daftar Konsentrasi Keahlian')

@section('content')
    <div class="container mx-auto mt-4">
        @if(session('success'))
            <div class="alert alert-success fade show" role="alert" style="animation: fadeIn 0.5s;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger fade show" role="alert" style="animation: fadeIn 0.5s;">
                {{ session('error') }}
            </div>
        @endif

        <!-- Tambahkan CSS untuk animasi -->
        <style>
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Konsentrasi Keahlian</h1>
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('konsentrasi_keahlian.create')}}" class="btn btn-primary mb-4 transition duration-300 ease-in-out transform hover:scale-105"><i class="fa fa-plus mr-2"></i>Tambah Konsentrasi Keahlian</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 text-left text-gray-600">ID</th>
                        <th class="py-3 px-4 text-left text-gray-600">Program Keahlian</th>
                        <th class="py-3 px-4 text-left text-gray-600">Kode</th>
                        <th class="py-3 px-4 text-left text-gray-600">Konsentrasi</th>
                        <th class="py-3 px-4 text-left text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="transition duration-300 ease-in-out transform hover:bg-gray-200">
                            <td class="py-3 px-4 border-b border-gray-200">{{ $item->id_konsentrasi_keahlian  }}</td>
                            <td class="py-3 px-4 border-b border-gray-200">{{ $item->programKeahlian->program_keahlian ?? '-' }}</td>
                            <td class="py-3 px-4 border-b border-gray-200">{{ $item->kode_konsentrasi_keahlian}}</td>
                            <td class="py-3 px-4 border-b border-gray-200">{{ $item->konsentrasi_keahlian }}</td>
                            <td class="py-3 px-4 border-b border-gray-200">
                                <a href="{{ route('konsentrasi_keahlian.edit', $item->id_konsentrasi_keahlian) }}" class="btn btn-warning transition duration-300 ease-in-out transform hover:scale-105"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('konsentrasi_keahlian.destroy', $item->id_konsentrasi_keahlian) }}" method="POST" style="display:inline;">
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

