@extends('layouts.user-home')

@section('title', isset($tracer) ? 'Edit Data Tracer Kuliah' : 'Tambah Data Tracer Kuliah')

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
            <ul class="list-none m-0 p-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
        animation: fadeIn 0.5s ease-out 1s forwards;
        opacity: 0;
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

    .col-md-6:first-child {
        animation: slideInFromLeft 0.5s ease-out;
    }

    .col-md-6:last-child {
        animation: slideInFromRight 0.5s ease-out;
    }

    /* Animation Delays */
    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .form-group:nth-child(4) { animation-delay: 0.4s; }
    .form-group:nth-child(5) { animation-delay: 0.5s; }
    .form-group:nth-child(6) { animation-delay: 0.6s; }

    /* Animations */
    @keyframes slideInFromTop {
        0% { transform: translateY(-20px); opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
    }

    @keyframes slideInFromLeft {
        0% { transform: translateX(-20px); opacity: 0; }
        100% { transform: translateX(0); opacity: 1; }
    }

    @keyframes slideInFromRight {
        0% { transform: translateX(20px); opacity: 0; }
        100% { transform: translateX(0); opacity: 1; }
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

        .col-md-6:first-child,
        .col-md-6:last-child {
            animation: slideInFromTop 0.5s ease-out;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add loading state to form submission
        const form = document.querySelector('form');
        const submitBtn = form.querySelector('button[type="submit"]');

        form.addEventListener('submit', function() {
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
        });

        // Add hover animation to form groups
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

<div class="form-container">
    <div class="form-header">
        <h4>{{ isset($tracer) ? 'Edit' : 'Tambah' }} Data Kuesioner Kuliah</h4>
    </div>
    
    <div class="tab-pane fade show active" id="kuliah" role="tabpanel">
        <form action="{{ isset($tracer) ? route('user.kuliah.update', $tracer->id_tracer_kuliah) : route('user.kuliah.store') }}" 
              method="POST" 
              class="needs-validation" 
              novalidate>
            @csrf
            @if(isset($tracer))
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Dimana kampus tempat Anda kuliah?</label>
                        <input type="text" 
                               name="tracer_kuliah_kampus" 
                               class="form-control" 
                               value="{{ old('tracer_kuliah_kampus', $tracer->tracer_kuliah_kampus ?? '') }}" 
                               placeholder="Contoh: Universitas Indonesia" 
                               required>
                    </div>
                    <div class="form-group">
                        <label>Apa jurusan yang Anda ambil?</label>
                        <input type="text" 
                               name="tracer_kuliah_jurusan" 
                               class="form-control" 
                               value="{{ old('tracer_kuliah_jurusan', $tracer->tracer_kuliah_jurusan ?? '') }}"
                               placeholder="Contoh: Teknik Informatika" 
                               required>
                    </div>
                    <div class="form-group">
                        <label>Bagaimana alamat lengkap kampus Anda?</label>
                        <textarea name="tracer_kuliah_alamat" 
                                  class="form-control" 
                                  placeholder="Contoh: Jl. Margonda Raya No.100, Depok" 
                                  required>{{ old('tracer_kuliah_alamat', $tracer->tracer_kuliah_alamat ?? '') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Apa jenjang pendidikan yang Anda tempuh?</label>
                        <select name="tracer_kuliah_jenjang" class="form-control" required>
                            <option value="">Silakan pilih jenjang pendidikan</option>
                            @php
                                $jenjang = old('tracer_kuliah_jenjang', $tracer->tracer_kuliah_jenjang ?? '');
                            @endphp
                            <option value="D3" {{ $jenjang == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="D4" {{ $jenjang == 'D4' ? 'selected' : '' }}>D4</option>
                            <option value="S1" {{ $jenjang == 'S1' ? 'selected' : '' }}>S1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bagaimana status perkuliahan Anda saat ini?</label>
                        <select name="tracer_kuliah_status" class="form-control" required>
                            <option value="">Silakan pilih status perkuliahan</option>
                            @php
                                $status = old('tracer_kuliah_status', $tracer->tracer_kuliah_status ?? '');
                            @endphp
                            <option value="aktif" {{ $status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="do" {{ $status == 'DO' ? 'selected' : '' }}>DO</option>
                            <option value="lulus" {{ $status == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Apakah jurusan kuliah Anda sesuai dengan jurusan SMK?</label>
                        <select name="tracer_kuliah_linier" class="form-control" required>
                            <option value="">Silakan pilih kesesuaian jurusan</option>
                            @php
                                $linier = old('tracer_kuliah_linier', $tracer->tracer_kuliah_linier ?? '');
                            @endphp
                            <option value="linear" {{ $linier == 'linear' ? 'selected' : '' }}>Linear</option>
                            <option value="non-linear" {{ $linier == 'non-linear' ? 'selected' : '' }}>Non-Linear</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>
                    {{ isset($tracer) ? 'Update' : 'Simpan' }} Data Kuliah
                </button>
            </div>
        </form>
    </div>
</div>
@endsection