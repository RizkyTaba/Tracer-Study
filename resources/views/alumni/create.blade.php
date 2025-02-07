@extends('layouts.admin-home')

@section('title', 'Tambah Alumni')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Alumni</h2>
    
    <!-- Pencarian -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="searchStudent" class="form-label">
                    <i class="fas fa-search"></i> Cari Data Siswa
                </label>
                <div class="input-group">
                    <input type="text" 
                           class="form-control" 
                           id="searchStudent" 
                           placeholder="Cari berdasarkan nama, alamat, atau tempat lahir...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="searchButton">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </div>
                <div id="searchResults" class="list-group mt-2" style="display: none;"></div>
            </div>
        </div>
    </div>

    <form action="{{ route('alumni.store') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-6">
                <!-- NISN -->
                <div class="mb-3">
                    <label for="nisn" class="form-label">
                        <i class="fas fa-id-card"></i> NISN
                    </label>
                    <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" required>
                </div>

                <!-- NIK -->
                <div class="mb-3">
                    <label for="nik" class="form-label">
                        <i class="fas fa-id-badge"></i> NIK
                    </label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
                </div>

                <!-- Nama Depan -->
                <div class="mb-3">
                    <label for="nama_depan" class="form-label">
                        <i class="fas fa-user"></i> Nama Depan
                    </label>
                    <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Masukkan Nama Depan" required>
                </div>

                <!-- Nama Belakang -->
                <div class="mb-3">
                    <label for="nama_belakang" class="form-label">
                        <i class="fas fa-user"></i> Nama Belakang
                    </label>
                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Masukkan Nama Belakang">
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">
                        <i class="fas fa-venus-mars"></i> Jenis Kelamin
                    </label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Tempat Lahir -->
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">
                        <i class="fas fa-map-marker-alt"></i> Tempat Lahir
                    </label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">
                        <i class="fas fa-calendar-alt"></i> Tanggal Lahir
                    </label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="col-md-6">
                <!-- Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="form-label">
                        <i class="fas fa-home"></i> Alamat
                    </label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                </div>

                <!-- Nomor HP -->
                <div class="mb-3">
                    <label for="no_hp" class="form-label">
                        <i class="fas fa-phone"></i> Nomor HP
                    </label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor HP" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                </div>

                <!-- Akun Facebook -->
                <div class="mb-3">
                    <label for="akun_fb" class="form-label">
                        <i class="fab fa-facebook"></i> Akun Facebook
                    </label>
                    <input type="text" class="form-control" id="akun_fb" name="akun_fb" placeholder="Masukkan Akun Facebook">
                </div>

                <!-- Akun Instagram -->
                <div class="mb-3">
                    <label for="akun_ig" class="form-label">
                        <i class="fab fa-instagram"></i> Akun Instagram
                    </label>
                    <input type="text" class="form-control" id="akun_ig" name="akun_ig" placeholder="Masukkan Akun Instagram">
                </div>

                <!-- Akun TikTok -->
                <div class="mb-3">
                    <label for="akun_tiktok" class="form-label">
                        <i class="fab fa-tiktok"></i> Akun TikTok
                    </label>
                    <input type="text" class="form-control" id="akun_tiktok" name="akun_tiktok" placeholder="Masukkan Akun TikTok">
                </div>
            </div>
        </div>

        <!-- Bagian Bawah Form -->
        <div class="row">
            <div class="col-md-12">
                <!-- Tahun Lulus -->
                <div class="mb-3">
                    <label for="id_tahun_lulus" class="form-label">
                        <i class="fas fa-graduation-cap"></i> Tahun Lulus
                    </label>
                    <select class="form-control" id="id_tahun_lulus" name="id_tahun_lulus" required>
                        <option value="" disabled selected>Pilih Tahun Lulus</option>
                        @foreach($tahunLulus as $tahun)
                            <option value="{{ $tahun->id_tahun_lulus }}">{{ $tahun->tahun_lulus }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Konsentrasi Keahlian -->
                <div class="mb-3">
                    <label for="id_konsentrasi_keahlian" class="form-label">
                        <i class="fas fa-tools"></i> Konsentrasi Keahlian
                    </label>
                    <select class="form-control" id="id_konsentrasi_keahlian" name="id_konsentrasi_keahlian" required>
                        <option value="" disabled selected>Pilih Konsentrasi Keahlian</option>
                        @foreach($konsentrasiKeahlian as $konsentrasi)
                            <option value="{{ $konsentrasi->id_konsentrasi_keahlian }}">{{ $konsentrasi->konsentrasi_keahlian }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Alumni -->
                <div class="mb-3">
                    <label for="id_status_alumni" class="form-label">
                        <i class="fas fa-user-graduate"></i> Status Alumni
                    </label>
                    <select class="form-control" id="id_status_alumni" name="id_status_alumni" required>
                        <option value="" disabled selected>Pilih Status Alumni</option>
                        @foreach($statusAlumni as $status)
                            <option value="{{ $status->id_status_alumni }}">{{ $status->status }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Login -->
                <div class="mb-3">
                    <label for="status_login" class="form-label">
                        <i class="fas fa-sign-in-alt"></i> Status Login
                    </label>
                    <select class="form-control" id="status_login" name="status_login" required>
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
                    </select>
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let searchTimeout;
    
    $('#searchStudent').on('input', function() {
        clearTimeout(searchTimeout);
        const searchTerm = $(this).val();
        
        if (searchTerm.length >= 3) {
            searchTimeout = setTimeout(function() {
                searchStudents(searchTerm);
            }, 500);
        } else {
            $('#searchResults').hide();
        }
    });
    
    function searchStudents(term) {
        $.get(`{{ route('admin.search.student') }}`, { search: term }, function(data) {
            const results = $('#searchResults');
            results.empty();
            
            if (data.length > 0) {
                data.forEach(student => {
                    results.append(`
                        <a href="#" class="list-group-item list-group-item-action student-item" 
                           data-nisn="${student.nisn}"
                           data-nik="${student.nik}"
                           data-nama-depan="${student.nama_depan}"
                           data-nama-belakang="${student.nama_belakang || ''}"
                           data-alamat="${student.alamat}"
                           data-tempat-lahir="${student.tempat_lahir}">
                            ${student.nama_depan} ${student.nama_belakang || ''} - ${student.alamat}
                        </a>
                    `);
                });
                results.show();
            } else {
                results.html('<div class="list-group-item">Tidak ada hasil ditemukan</div>');
                results.show();
            }
        });
    }
    
    $(document).on('click', '.student-item', function(e) {
        e.preventDefault();
        const student = $(this);
        
        // Fill the form fields
        $('#nisn').val(student.data('nisn'));
        $('#nik').val(student.data('nik'));
        $('#nama_depan').val(student.data('nama-depan'));
        $('#nama_belakang').val(student.data('nama-belakang'));
        $('#alamat').val(student.data('alamat'));
        $('#tempat_lahir').val(student.data('tempat-lahir'));
        
        // Hide search results
        $('#searchResults').hide();
        $('#searchStudent').val('');
    });
});
</script>
@endsection