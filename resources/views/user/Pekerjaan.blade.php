@extends('layouts.user-home')

@section('title', isset($tracer) ? 'Edit Data Tracer' : 'Tambah Data Tracer')

@section('content')


@if(session('success'))
    <div class="alert alert-success" role="alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-circle"></i>
        <ul style="list-style: none; margin: 0; padding: 0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Form Tracer Kerja -->
<div class="form-container">
    <div class="form-header">
        <h4>{{ isset($tracer) ? 'Edit' : 'Tambah' }} Data Pekerjaan</h4>
    </div>
    
    <div class="tab-pane fade show active" id="kerja" role="tabpanel">
        <form action="{{ isset($tracer) ? route('user.pekerjaan.update', $tracer->id_tracer_kerja) : route('user.pekerjaan.store') }}" method="POST">
            @csrf
            @if(isset($tracer))
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Apa jenis pekerjaan Anda saat ini?</label>
                        <input type="text" name="tracer_kerja_pekerjaan" class="form-control" 
                            value="{{ old('tracer_kerja_pekerjaan', $tracer->tracer_kerja_pekerjaan ?? '') }}" 
                            placeholder="Contoh: Programmer, Designer, Marketing" required>
                    </div>
                    <div class="form-group">
                        <label>Dimana tempat Anda bekerja?</label>
                        <input type="text" name="tracer_kerja_nama" class="form-control" 
                            value="{{ old('tracer_kerja_nama', $tracer->tracer_kerja_nama ?? '') }}"
                            placeholder="Contoh: PT. Maju Bersama" required>
                    </div>
                    <div class="form-group">
                        <label>Apa jabatan Anda di tempat kerja?</label>
                        <input type="text" name="tracer_kerja_jabatan" class="form-control" 
                            value="{{ old('tracer_kerja_jabatan', $tracer->tracer_kerja_jabatan ?? '') }}"
                            placeholder="Contoh: Junior Developer, Staff Marketing" required>
                    </div>
                    <div class="form-group">
                        <label>Bagaimana status kepegawaian Anda?</label>
                        <select name="tracer_kerja_status" class="form-control" required>
                            <option value="">Silakan pilih status kepegawaian</option>
                            @php
                                $status = old('tracer_kerja_status', $tracer->tracer_kerja_status ?? '');
                            @endphp
                            <option value="Tetap" {{ $status == 'Tetap' ? 'selected' : '' }}>Karyawan Tetap</option>
                            <option value="Kontrak" {{ $status == 'Kontrak' ? 'selected' : '' }}>Karyawan Kontrak</option>
                            <option value="Freelance" {{ $status == 'Freelance' ? 'selected' : '' }}>Pekerja Lepas (Freelance)</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Di kota mana lokasi tempat kerja Anda?</label>
                        <input type="text" name="tracer_kerja_lokasi" class="form-control" 
                            value="{{ old('tracer_kerja_lokasi', $tracer->tracer_kerja_lokasi ?? '') }}"
                            placeholder="Contoh: Jakarta Selatan" required>
                    </div>
                    <div class="form-group">
                        <label>Bagaimana alamat lengkap tempat kerja Anda?</label>
                        <textarea name="tracer_kerja_alamat" class="form-control" 
                            placeholder="Contoh: Jl. Sudirman No. 123, Jakarta Selatan" required>{{ old('tracer_kerja_alamat', $tracer->tracer_kerja_alamat ?? '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Kapan Anda mulai bekerja di tempat ini?</label>
                        <input type="date" name="tracer_kerja_tgl_mulai" class="form-control" 
                            value="{{ old('tracer_kerja_tgl_mulai', $tracer->tracer_kerja_tgl_mulai ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Berapa gaji/penghasilan Anda per bulan?</label>
                        <input type="number" name="tracer_kerja_gaji" class="form-control" 
                            value="{{ old('tracer_kerja_gaji', $tracer->tracer_kerja_gaji ?? '') }}"
                            placeholder="Contoh: 5000000" required>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>
                    {{ isset($tracer) ? 'Update' : 'Simpan' }} Data Pekerjaan
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Base Styles */
    .form-container {
        background-color: #ffffff;
        padding: 1.25rem;
        margin: 1rem auto;
        max-width: 1200px;
        border-radius: 8px;
        animation: scaleIn 0.5s ease-out;
    }

    .form-header {
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #e0e0e0;
        animation: slideInFromTop 0.5s ease-out;
    }

    .form-header h4 {
        color: #333;
        font-weight: 500;
        margin: 0;
        font-size: 1.25rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
        opacity: 0;
        animation: fadeIn 0.5s ease-out forwards;
    }

    .form-group label {
        font-weight: 500;
        color: #555;
        margin-bottom: 0.5rem;
        display: block;
        font-size: 0.95rem;
        line-height: 1.4;
    }

    .form-control {
        border: 1px solid #ddd;
        padding: 0.75rem;
        width: 100%;
        transition: all 0.3s ease;
        font-size: 0.95rem;
        border-radius: 6px;
    }

    .form-control:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 0 2px rgba(74, 144, 226, 0.2);
        outline: none;
        transform: translateY(-2px);
    }

    .form-control:hover {
        border-color: #4a90e2;
    }

    /* Select Styles */
    select.form-control {
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 1rem;
        padding-right: 2.5rem;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        text-overflow: ellipsis;
        white-space: normal;
        overflow: visible;
        height: auto;
        min-height: 42px;
        line-height: 1.5;
    }

    select.form-control:hover {
        background-color: #f8f9fa;
    }

    select.form-control option {
        white-space: normal;
        padding: 10px;
        min-height: 1.2em;
    }

    /* Textarea Styles */
    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }

    /* Button Styles */
    .btn-primary {
        background-color: #4a90e2;
        border: none;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        font-size: 0.95rem;
        color: white;
        border-radius: 6px;
        transition: all 0.3s ease;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-primary:hover {
        background-color: #357abd;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
    }

    /* Grid System */
    .row {
        display: flex;
        flex-wrap: wrap;
        margin: -0.75rem;
    }

    .col-md-6 {
        padding: 0.75rem;
        width: 100%;
    }

    /* Animation Delays */
    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .form-group:nth-child(4) { animation-delay: 0.4s; }
    .form-group:nth-child(5) { animation-delay: 0.5s; }
    .form-group:nth-child(6) { animation-delay: 0.6s; }
    .form-group:nth-child(7) { animation-delay: 0.7s; }
    .form-group:nth-child(8) { animation-delay: 0.8s; }

    /* Animations */
    @keyframes slideInFromTop {
        0% { transform: translateY(-20px); opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
    }

    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

    @keyframes scaleIn {
        0% { transform: scale(0.95); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Loading State */
    .btn-primary.loading {
        position: relative;
        pointer-events: none;
        opacity: 0.8;
    }

    .btn-primary.loading:after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        border: 2px solid #ffffff;
        border-top: 2px solid transparent;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
        margin-left: 10px;
    }

    /* Alert Styles */
    .alert {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1000;
        padding: 1rem 1.5rem;
        border-radius: 6px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        min-width: 300px;
        max-width: 90%;
        text-align: center;
        animation: slideInFromTop 0.5s ease-out;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
    }

    /* Input Styles */
    input[type="number"] {
        -moz-appearance: textfield;
    }

    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="date"] {
        min-height: 42px;
    }

    /* Responsive Styles */
    @media (min-width: 768px) {
        .col-md-6 {
            width: 50%;
        }
        
        .form-container {
            padding: 2rem;
            margin: 2rem auto;
        }

        .btn-primary {
            min-width: 200px;
        }
    }

    @media (max-width: 767px) {
        .form-container {
            margin: 1rem;
            padding: 1rem;
        }

        .form-header h4 {
            font-size: 1.1rem;
        }

        .form-group label {
            font-size: 0.9rem;
        }

        .form-control {
            font-size: 0.9rem;
            padding: 0.6rem;
        }

        .btn-primary {
            width: 100%;
            margin-top: 1rem;
        }

        .text-right {
            text-align: center;
        }

        textarea.form-control {
            min-height: 80px;
        }
    }
</style>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add loading state to form submission
        const form = document.querySelector('form');
        const submitBtn = form.querySelector('button[type="submit"]');

        form.addEventListener('submit', function() {
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
        });

        // Add subtle hover animation to form groups
        const formGroups = document.querySelectorAll('.form-group');
        formGroups.forEach(group => {
            group.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.transition = 'transform 0.3s ease';
            });

            group.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>
@endsection