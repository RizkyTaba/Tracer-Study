@extends('layouts.admin-home')

@section('title', 'Daftar Tracer Kerja')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Tracer Kerja</h2>
        <a href="{{ route('tracer_kerja.create') }}" class="btn btn-primary">
            <i class="fa fa-plus mr-2"></i> Tambah Tracer Kerja
        </a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-hover shadow-sm">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Alumni</th>
                <th>Pekerjaan</th>
                <th>Nama Perusahaan</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Lokasi</th>
                <th>Alamat</th>
                <th>Tanggal Mulai</th>
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
                    <a href="{{ route('tracer_kerja.edit', $item->id_tracer_kerja) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('tracer_kerja.destroy', $item->id_tracer_kerja) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection