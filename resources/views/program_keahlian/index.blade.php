@extends('layouts.admin-home')

@section('title', 'Daftar Program Keahlian')

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
    <div class="container mx-auto mt-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Program Keahlian</h1>
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('program_keahlian.create')}}" class="btn btn-primary mb-4 transition duration-300 ease-in-out transform hover:scale-105"><i class="fa fa-plus mr-2"></i>Tambah Program Keahlian</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 text-left text-gray-600">Kode</th>
                        <th class="py-3 px-4 text-left text-gray-600">Program Keahlian</th>
                        <th class="py-3 px-4 text-left text-gray-600">Bidang Keahlian</th>
                        <th class="py-3 px-4 text-left text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programKeahlians as $programKeahlian)
                        <tr class="transition duration-300 ease-in-out transform hover:bg-gray-200">
                            <td class="py-3 px-4 border-b border-gray-200">{{ $programKeahlian->kode_program_keahlian }}</td>
                            <td class="py-3 px-4 border-b border-gray-200">{{ $programKeahlian->program_keahlian }}</td>
                            <td class="py-3 px-4 border-b border-gray-200">{{ $programKeahlian->bidangKeahlian->bidang_keahlian}}</td>
                            <td class="py-3 px-4 border-b border-gray-200">
                                <a href="{{ route('program_keahlian.edit', ['program_keahlian' => $programKeahlian->id_program_keahlian]) }}" class="btn btn-warning transition duration-300 ease-in-out transform hover:scale-105"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('program_keahlian.destroy', $programKeahlian->id_program_keahlian) }}" method="POST" style="display:inline;">
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

