@extends('layouts.admin-home')

@section('content')
<div class="container mt-4">
    <h2>Edit Alumni</h2>
    <form action="{{ route('alumni.update', $alumni->id_alumni) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $alumni->nisn }}" required>
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" value="{{ $alumni->nik }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_depan" class="form-label">Nama Depan</label>
            <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="{{ $alumni->nama_depan }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_belakang" class="form-label">Nama Belakang</label>
            <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="{{ $alumni->nama_belakang }}">
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki" {{ $alumni->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $alumni->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $alumni->tempat_lahir }}" required>
        </div>
        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $alumni->tgl_lahir }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $alumni->alamat }}" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $alumni->no_hp }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $alumni->email }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
        </div>
        <div class="mb-3">
            <label for="akun_fb" class="form-label">Akun Facebook</label>
            <input type="text" class="form-control" id="akun_fb" name="akun_fb" value="{{ $alumni->akun_fb }}">
        </div>
        <div class="mb-3">
            <label for="akun_ig" class="form-label">Akun Instagram</label>
            <input type="text" class="form-control" id="akun_ig" name="akun_ig" value="{{ $alumni->akun_ig }}">
        </div>
        <div class="mb-3">
            <label for="akun_tiktok" class="form-label">Akun TikTok</label>
            <input type="text" class="form-control" id="akun_tiktok" name="akun_tiktok" value="{{ $alumni->akun_tiktok }}">
        </div>
        <div class="mb-3">
            <label for="id_tahun_lulus" class="form-label">Tahun Lulus</label>
            <select class="form-control" id="id_tahun_lulus" name="id_tahun_lulus" required>
                @foreach($tahunLulus as $tahun)
                    <option value="{{ $tahun->id_tahun_lulus }}" {{ $alumni->id_tahun_lulus == $tahun->id_tahun_lulus ? 'selected' : '' }}>{{ $tahun->tahun_lulus }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_konsentrasi_keahlian" class="form-label">Konsentrasi Keahlian</label>
            <select class="form-control" id="id_konsentrasi_keahlian" name="id_konsentrasi_keahlian" required>
                @foreach($konsentrasiKeahlian as $konsentrasi)
                    <option value="{{ $konsentrasi->id_konsentrasi_keahlian }}" {{ $alumni->id_konsentrasi_keahlian == $konsentrasi->id_konsentrasi_keahlian ? 'selected' : '' }}>{{ $konsentrasi->konsentrasi_keahlian }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_status_alumni" class="form-label">Status Alumni</label>
            <select class="form-control" id="id_status_alumni" name="id_status_alumni" required>
                @foreach($statusAlumni as $status)
                    <option value="{{ $status->id_status_alumni }}" {{ $alumni->id_status_alumni == $status->id_status_alumni ? 'selected' : '' }}>{{ $status->status }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status_login" class="form-label">Status Login</label>
            <select class="form-control" id="status_login" name="status_login" required>
                <option value="0" {{ $alumni->status_login == '0' ? 'selected' : '' }}>Inactive</option>
                <option value="1" {{ $alumni->status_login == '1' ? 'selected' : '' }}>Active</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('alumni.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection