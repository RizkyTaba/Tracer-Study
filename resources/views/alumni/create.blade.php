@extends('layouts.admin-home')

@section('content')
<div class="container mt-4">
    <h2>Tambah Alumni</h2>
    <form action="{{ route('alumni.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input type="text" class="form-control" id="nisn" name="nisn" required>
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" required>
        </div>
        <div class="mb-3">
            <label for="nama_depan" class="form-label">Nama Depan</label>
            <input type="text" class="form-control" id="nama_depan" name="nama_depan" required>
        </div>
        <div class="mb-3">
            <label for="nama_belakang" class="form-label">Nama Belakang</label>
            <input type="text" class="form-control" id="nama_belakang" name="nama_belakang">
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
        </div>
        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="akun_fb" class="form-label">Akun Facebook</label>
            <input type="text" class="form-control" id="akun_fb" name="akun_fb">
        </div>
        <div class="mb-3">
            <label for="akun_ig" class="form-label">Akun Instagram</label>
            <input type="text" class="form-control" id="akun_ig" name="akun_ig">
        </div>
        <div class="mb-3">
            <label for="akun_tiktok" class="form-label">Akun TikTok</label>
            <input type="text" class="form-control" id="akun_tiktok" name="akun_tiktok">
        </div>
        <div class="mb-3">
            <label for="id_tahun_lulus" class="form-label">Tahun Lulus</label>
            <select class="form-control" id="id_tahun_lulus" name="id_tahun_lulus" required>
                @foreach($tahunLulus as $tahun)
                    <option value="{{ $tahun->id_tahun_lulus }}">{{ $tahun->tahun_lulus }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_konsentrasi_keahlian" class="form-label">Konsentrasi Keahlian</label>
            <select class="form-control" id="id_konsentrasi_keahlian" name="id_konsentrasi_keahlian" required>
                @foreach($konsentrasiKeahlian as $konsentrasi)
                    <option value="{{ $konsentrasi->id_konsentrasi_keahlian }}">{{ $konsentrasi->konsentrasi_keahlian }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_status_alumni" class="form-label">Status Alumni</label>
            <select class="form-control" id="id_status_alumni" name="id_status_alumni" required>
                @foreach($statusAlumni as $status)
                    <option value="{{ $status->id_status_alumni }}">{{ $status->status }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status_login" class="form-label">Status Login</label>
            <select class="form-control" id="status_login" name="status_login" required>
                <option value="0">Inactive</option>
                <option value="1">Active</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
