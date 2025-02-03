@extends('layouts.admin-home')

@section('title', 'Ubah Data Alumni')

@section('content')
<style>
    /* Animasi untuk elemen form */
    .form-control {
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff; /* Ganti dengan warna yang diinginkan */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Ganti dengan warna yang diinginkan */
    }

    .mb-3 {
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
</style>
<div class="container mt-4">
    <h2 class="mb-4">Ubah Data Alumni</h2>
    <form action="{{ route('alumni.update', $alumni->id_alumni) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-6">
                <!-- NISN -->
                <div class="mb-3">
                    <label for="nisn" class="form-label">
                        <i class="fas fa-id-card"></i> NISN <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $alumni->nisn }}" placeholder="Masukkan NISN" required>
                    <small class="form-text text-muted">Nomor Induk Siswa Nasional.</small>
                </div>

                <!-- NIK -->
                <div class="mb-3">
                    <label for="nik" class="form-label">
                        <i class="fas fa-id-badge"></i> NIK <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ $alumni->nik }}" placeholder="Masukkan NIK" required>
                    <small class="form-text text-muted">Nomor Induk Kependudukan.</small>
                </div>

                <!-- Nama Depan -->
                <div class="mb-3">
                    <label for="nama_depan" class="form-label">
                        <i class="fas fa-user"></i> Nama Depan <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="{{ $alumni->nama_depan }}" placeholder="Masukkan Nama Depan" required>
                </div>

                <!-- Nama Belakang -->
                <div class="mb-3">
                    <label for="nama_belakang" class="form-label">
                        <i class="fas fa-user"></i> Nama Belakang
                    </label>
                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="{{ $alumni->nama_belakang }}" placeholder="Masukkan Nama Belakang">
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">
                        <i class="fas fa-venus-mars"></i> Jenis Kelamin <span class="text-danger">*</span>
                    </label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki" {{ $alumni->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $alumni->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <!-- Tempat Lahir -->
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">
                        <i class="fas fa-map-marker-alt"></i> Tempat Lahir <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $alumni->tempat_lahir }}" placeholder="Masukkan Tempat Lahir" required>
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">
                        <i class="fas fa-calendar-alt"></i> Tanggal Lahir <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $alumni->tgl_lahir }}" required>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="col-md-6">
                <!-- Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="form-label">
                        <i class="fas fa-home"></i> Alamat <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $alumni->alamat }}" placeholder="Masukkan Alamat" required>
                </div>

                <!-- Nomor HP -->
                <div class="mb-3">
                    <label for="no_hp" class="form-label">
                        <i class="fas fa-phone"></i> Nomor HP <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $alumni->no_hp }}" placeholder="Masukkan Nomor HP" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i> Email <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $alumni->email }}" placeholder="Masukkan Email" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Baru">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                </div>

                <!-- Akun Media Sosial -->
                <div class="mb-3">
                    <label for="akun_fb" class="form-label">
                        <i class="fab fa-facebook"></i> Akun Facebook
                    </label>
                    <input type="text" class="form-control" id="akun_fb" name="akun_fb" value="{{ $alumni->akun_fb }}" placeholder="Masukkan Akun Facebook">
                </div>
                <div class="mb-3">
                    <label for="akun_ig" class="form-label">
                        <i class="fab fa-instagram"></i> Akun Instagram
                    </label>
                    <input type="text" class="form-control" id="akun_ig" name="akun_ig" value="{{ $alumni->akun_ig }}" placeholder="Masukkan Akun Instagram">
                </div>
                <div class="mb-3">
                    <label for="akun_tiktok" class="form-label">
                        <i class="fab fa-tiktok"></i> Akun TikTok
                    </label>
                    <input type="text" class="form-control" id="akun_tiktok" name="akun_tiktok" value="{{ $alumni->akun_tiktok }}" placeholder="Masukkan Akun TikTok">
                </div>
            </div>
        </div>

        <!-- Tahun Lulus, Konsentrasi Keahlian, Status Alumni, dan Status Login -->
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="id_tahun_lulus" class="form-label">
                        <i class="fas fa-graduation-cap"></i> Tahun Lulus <span class="text-danger">*</span>
                    </label>
                    <select class="form-control" id="id_tahun_lulus" name="id_tahun_lulus" required>
                        @foreach($tahunLulus as $tahun)
                            <option value="{{ $tahun->id_tahun_lulus }}" {{ $alumni->id_tahun_lulus == $tahun->id_tahun_lulus ? 'selected' : '' }}>{{ $tahun->tahun_lulus }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="id_konsentrasi_keahlian" class="form-label">
                        <i class="fas fa-briefcase"></i> Konsentrasi Keahlian <span class="text-danger">*</span>
                    </label>
                    <select class="form-control" id="id_konsentrasi_keahlian" name="id_konsentrasi_keahlian" required>
                        @foreach($konsentrasiKeahlian as $konsentrasi)
                            <option value="{{ $konsentrasi->id_konsentrasi_keahlian }}" {{ $alumni->id_konsentrasi_keahlian == $konsentrasi->id_konsentrasi_keahlian ? 'selected' : '' }}>{{ $konsentrasi->konsentrasi_keahlian }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="id_status_alumni" class="form-label">
                        <i class="fas fa-user-check"></i> Status Alumni <span class="text-danger">*</span>
                    </label>
                    <select class="form-control" id="id_status_alumni" name="id_status_alumni" required>
                        @foreach($statusAlumni as $status)
                            <option value="{{ $status->id_status_alumni }}" {{ $alumni->id_status_alumni == $status->id_status_alumni ? 'selected' : '' }}>{{ $status->status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="status_login" class="form-label">
                <i class="fas fa-power-off"></i> Status Login <span class="text-danger">*</span>
            </label>
            <select class="form-control" id="status_login" name="status_login" required>
                <option value="0" {{ $alumni->status_login == '0' ? 'selected' : '' }}>Inactive</option>
                <option value="1" {{ $alumni->status_login == '1' ? 'selected' : '' }}>Active</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
        <a href="{{ route('alumni.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection