@extends('layouts.admin-home')

@section('content')
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-semibold mb-4 text-center">Program Keahlian</h1>
        <div class="flex justify-end mb-4">
            <a href="{{ route('program_keahlian.create')}}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md">Tambah Bidang Keahlian</a>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border-b">Kode</th>
                        <th class="py-2 px-4 border-b">Program Keahlian</th>
                        <th class="py-2 px-4 border-b">Bidang Keahlian</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programKeahlians as $programKeahlian)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $programKeahlian->kode_program_keahlian }}</td>
                            <td class="py-2 px-4 border-b">{{ $programKeahlian->program_keahlian }}</td>
                            <td class="py-2 px-4 border-b">{{ $programKeahlian->bidangKeahlian->kode_bidang_keahlian}}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('program_keahlian.edit', ['program_keahlian' => $programKeahlian->id_program_keahlian]) }}" class="bg-yellow-500 text-white px-2 py-1 rounded-lg shadow-md">Edit</a>
                                <form action="{{ route('program_keahlian.destroy', $programKeahlian->id_program_keahlian) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-lg shadow-md" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

