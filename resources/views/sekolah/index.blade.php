@extends('layouts.admin-home')

@section('title', 'Daftar Sekolah')

@section('content')
<div class="container mx-auto mt-5">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-blue-500 text-white text-center py-4">
            <h1 class="text-2xl font-semibold">Daftar Sekolah</h1>
        </div>
        <div class="p-4">
            <table class="min-w-full bg-white">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="py-2 px-4 border-b">Kode Sekolah</th>
                        <th class="py-2 px-4 border-b">Nama Sekolah</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sekolah as $item)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b">{{ $item->kode_sekolah }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->nama_sekolah }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('sekolah.show', $item->id_sekolah) }}" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
