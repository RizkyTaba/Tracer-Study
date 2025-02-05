@extends('layouts.admin-home')

@section('title', 'Daftar Status Alumni')

@section('content')
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
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Status Alumni</h1>
        <a href="{{ route('status_alumni.create') }}" class="btn btn-primary mb-4 transition duration-300 ease-in-out transform hover:scale-105"><i class="fa fa-plus mr-2"></i>Tambah Status</a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 text-left text-gray-600">ID Status Alumni</th>
                        <th class="py-3 px-4 text-left text-gray-600">Status</th>
                        <th class="py-3 px-4 text-left text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statusAlumni as $status)
                        <tr class="transition duration-300 ease-in-out transform hover:bg-gray-200">
                            <td class="py-3 px-4 border-b border-gray-200">{{ $status->id_status_alumni }}</td>
                            <td class="py-3 px-4 border-b border-gray-200">{{ $status->status }}</td>
                            <td class="py-3 px-4 border-b border-gray-200">
                                <a href="{{ route('status_alumni.edit', $status->id_status_alumni) }}" class="btn btn-warning transition duration-300 ease-in-out transform hover:scale-105"> <i class="fa fa-edit"></i></a>
                                <form action="{{ route('status_alumni.destroy', $status->id_status_alumni) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger transition duration-300 ease-in-out transform hover:scale-105" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"> <i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection