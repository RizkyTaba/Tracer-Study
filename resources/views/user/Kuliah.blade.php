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
            <ul style="list-style: none; margin: 0; padding: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<style>
    .form-container {
        background-color: #ffffff;
        padding: 25px;
        margin: 20px auto;
        max-width: 1200px;
    }

    .form-header {
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e0e0e0;
    }

    .form-header h4 {
        color: #333;
        font-weight: 500;
        margin: 0;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: 500;
        color: #555;
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        border: 1px solid #ddd;
        padding: 8px 12px;
        width: 100%;
        transition: border-color 0.2s ease;
        font-size: 14px;
    }

    .form-control:focus {
        border-color: #666;
        outline: none;
    }

    select.form-control {
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 12px;
        padding-right: 35px;
    }

    .btn-primary {
        background-color: #2d3436;
        border: none;
        padding: 10px 25px;
        font-weight: 500;
        font-size: 14px;
        color: white;
        transition: background-color 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #1e272e;
    }

    .text-right {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #e0e0e0;
    }

    .fa-save {
        margin-right: 8px;
    }

    .row {
        margin: 0 -15px;
    }

    .col-md-6 {
        padding: 0 15px;
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 15px;
            margin: 10px;
        }
    }
    .alert {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            padding: 15px 25px;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            min-width: 300px;
            text-align: center;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            animation: fadeOut 5s ease-in-out forwards;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            animation: fadeOut 5s ease-in-out forwards;
        }

        @keyframes fadeOut {
            0% { 
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
            70% { 
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
            100% { 
                opacity: 0;
                transform: translateX(-50%) translateY(-100%);
            }
        }
</style>

<!-- Form Tracer Kuliah -->
<div class="form-container">
    <div class="form-header">
        <h4>{{ isset($tracer) ? 'Edit' : 'Tambah' }} Data Kuliah</h4>
    </div>
    
    <div class="tab-pane fade show active" id="kuliah" role="tabpanel">
        <form action="{{ isset($tracer) ? route('user.kuliah.update', $tracer->id_tracer_kuliah) : route('user.kuliah.store') }}" method="POST">
            @csrf
            @if(isset($tracer))
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kampus</label>
                        <input type="text" name="tracer_kuliah_kampus" class="form-control" 
                            value="{{ old('tracer_kuliah_kampus', $tracer->tracer_kuliah_kampus ?? '') }}" 
                            placeholder="Masukkan nama kampus" required>
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" name="tracer_kuliah_jurusan" class="form-control" 
                            value="{{ old('tracer_kuliah_jurusan', $tracer->tracer_kuliah_jurusan ?? '') }}"
                            placeholder="Masukkan nama jurusan" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat Kampus</label>
                        <textarea name="tracer_kuliah_alamat" class="form-control" 
                            placeholder="Masukkan alamat kampus" required>{{ old('tracer_kuliah_alamat', $tracer->tracer_kuliah_alamat ?? '') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jenjang</label>
                        <select name="tracer_kuliah_jenjang" class="form-control" required>
                            <option value="">Pilih jenjang pendidikan</option>
                            @php
                                $jenjang = old('tracer_kuliah_jenjang', $tracer->tracer_kuliah_jenjang ?? '');
                            @endphp
                            <option value="D3" {{ $jenjang == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="D4" {{ $jenjang == 'D4' ? 'selected' : '' }}>D4</option>
                            <option value="S1" {{ $jenjang == 'S1' ? 'selected' : '' }}>S1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="tracer_kuliah_status" class="form-control" required>
                            <option value="">Pilih status</option>
                            @php
                                $status = old('tracer_kuliah_status', $tracer->tracer_kuliah_status ?? '');
                            @endphp
                            <option value="Aktif" {{ $status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="DO" {{ $status == 'DO' ? 'selected' : '' }}>DO</option>
                            <option value="Lulus" {{ $status == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Linier dengan Jurusan SMK?</label>
                        <select name="tracer_kuliah_linier" class="form-control" required>
                            <option value="">Pilih status linieritas</option>
                            @php
                                $linier = old('tracer_kuliah_linier', $tracer->tracer_kuliah_linier ?? '');
                            @endphp
                            <option value="Ya" {{ $linier == 'Ya' ? 'selected' : '' }}>Ya</option>
                            <option value="Tidak" {{ $linier == 'Tidak' ? 'selected' : '' }}>Tidak</option>
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