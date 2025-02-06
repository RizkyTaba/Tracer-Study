@extends('layouts.admin-home')

@section('title', 'Daftar Tracer Kerja')

@section('content')
<style>
    .table {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.5s forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .btn {
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .table th, .table td {
        text-align: center; /* Rata tengah untuk header dan sel */
    }
</style>
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Tracer Kerja</h2>
        {{-- <a href="{{ route('tracer_kerja.create') }}" class="btn btn-primary">
            <i class="fa fa-plus mr-2"></i> Tambah Tracer Kerja
        </a> --}}
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive" style="overflow: visible;">
        <table class="table table-bordered table-hover shadow-sm" style="width: 100%;">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Alumni</th>
                    <th>Pekerjaan</th>
                    <th>Perusahaan</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Lokasi</th>
                    <th>Alamat</th>
                    <th>Mulai</th>
                    <th>Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tracerKerja as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->alumni->nama_depan }} {{ $item->alumni->nama_belakang }}</td>
                        <td>{{ $item->tracer_kerja_pekerjaan }}</td>
                        <td>{{ $item->tracer_kerja_nama }}</td>
                        <td>{{ $item->tracer_kerja_jabatan }}</td>
                        <td>{{ $item->tracer_kerja_status }}</td>
                        <td>{{ $item->tracer_kerja_lokasi }}</td>
                        <td>{{ $item->tracer_kerja_alamat }}</td>
                        <td>{{ $item->tracer_kerja_tgl_mulai }}</td>
                        <td>{{ $item->tracer_kerja_gaji }}</td>
                        <td>
                            <div style="display: flex; justify-content: center; align-items: center;">
                                {{-- <a href="{{ route('tracer_kerja.edit', $item->id_tracer_kerja) }}" class="btn btn-warning btn-sm" style="margin-right: 5px;">
                                    Ubah
                                </a> --}}
                                <form action="{{ route('tracer_kerja.destroy', $item->id_tracer_kerja) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection