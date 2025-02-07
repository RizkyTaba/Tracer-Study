@extends('layouts.user-home')

@section('title', 'Edit Profil Alumni')

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

        /* Responsive Styles */
        @media (max-width: 768px) {
            .form-container {
                padding: 1rem;
                margin: 1rem;
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
            <h4>Edit Profil Alumni</h4>
        </div>
        
        <form action="{{ route('user.updateAlumni', $alumni->id_alumni) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $alumni->alamat }}" required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No. HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $alumni->no_hp }}" required>
                    </div>
                    <div class="form-group">
                        <label for="akun_fb">Akun Facebook</label>
                        <input type="text" class="form-control" id="akun_fb" name="akun_fb" value="{{ $alumni->akun_fb }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="akun_ig">Akun Instagram</label>
                        <input type="text" class="form-control" id="akun_ig" name="akun_ig" value="{{ $alumni->akun_ig }}">
                    </div>
                    <div class="form-group">
                        <label for="akun_tiktok">Akun TikTok</label>
                        <input type="text" class="form-control" id="akun_tiktok" name="akun_tiktok" value="{{ $alumni->akun_tiktok }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $alumni->email }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Update Profil
                </button>
            </div>
        </form>
    </div>
@endsection
