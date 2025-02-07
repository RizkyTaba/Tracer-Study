@extends('layouts.user-home')

@section('title', 'Dashboard')

@section('header', 'Welcome to the Dashboard')

@section('content')
    <!-- Welcome Section -->
    <div class="flex flex-col md:flex-row items-center p-4 md:p-6 gap-6">
        <div class="w-full md:w-1/2 flex flex-col justify-center transform transition-all duration-500 hover:scale-105">
            <h2 class="text-xl md:text-2xl lg:text-3xl font-bold animate-fade-in text-center md:text-left">
                Selamat datang di Tracer Studyy
            </h2>
            <p class="mt-4 text-sm md:text-base text-gray-600 animate-slide-in text-center md:text-left">
                Melacak perjalanan karier lulusan setelah menyelesaikan pendidikan.
            </p>
        </div>
        <div class="w-full md:w-1/2 flex justify-center transform transition-all duration-500 hover:scale-105">
            <img src="{{ asset('images/Student.jpg') }}" 
                 alt="Dashboard Image" 
                 class="animate-fade-in w-full max-w-md h-auto rounded-lg">
        </div>
    </div>

    <!-- Testimoni Form Section -->
    <div class="bg-white p-4 md:p-6 mt-6 md:mt-8 rounded-md shadow-md transform transition-all duration-500 hover:shadow-lg animate-slide-up mx-4 md:mx-6">
        <div class="form-header mb-4">
            <h4 class="text-lg md:text-xl font-semibold">
                {{ isset($testimoni) ? 'Edit' : 'Tambah' }} Testimoni Kamu:
            </h4>
        </div>
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <form id="testimoniForm" 
              action="{{ isset($testimoni) ? route('user.testimoni.update', $testimoni->id_testimoni) : route('user.testimoni.store') }}" 
              method="POST"
              class="space-y-4">
            @csrf
            @if(isset($testimoni))
                @method('PUT')
            @endif
            
            <div class="form-group">
                <textarea 
                    name="testimoni" 
                    class="w-full p-3 border rounded-md @error('testimoni') border-red-500 @enderror focus:ring-2 focus:ring-blue-300 focus:border-blue-300 transition-all" 
                    rows="4" 
                    placeholder="Berikan testimoni Anda" 
                    required
                >{{ old('testimoni', isset($testimoni) ? $testimoni->testimoni : '') }}</textarea>
        
                @error('testimoni')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <div>
                    @if(isset($testimoni))
                        <button type="button" 
                                id="deleteBtn" 
                                class="w-full sm:w-auto bg-red-500 text-white py-2 px-6 rounded-md hover:bg-red-600 transition-colors duration-300">
                            <i class="fa fa-trash"></i> Hapus Testimoni
                        </button>
                    @endif
                </div>
        
                <button type="submit" 
                        id="saveBtn" 
                        class="w-full sm:w-auto bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-600 transition-colors duration-300">
                    <i class="fa fa-save"></i>
                    {{ isset($testimoni) ? ' Update' : ' Simpan' }} Testimoni
                </button>
            </div>
        </form>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { 
                opacity: 0;
                transform: translateX(-20px);
            }
            to { 
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-out;
        }

        .animate-slide-in {
            animation: slideIn 1s ease-out;
        }

        .animate-slide-up {
            animation: slideUp 1s ease-out;
        }

        @media (max-width: 640px) {
            .animate-slide-in {
                animation: slideUp 1s ease-out;
            }
        }

        
    </style>
@endsection

@section('script')
    <script>
        // Fungsi untuk menangani aksi Hapus
        document.getElementById('deleteBtn')?.addEventListener('click', function() {
            if (confirm('Apakah Anda yakin ingin menghapus testimoni ini?')) {
                var form = document.getElementById('testimoniForm');
                
                // Pastikan kita memeriksa apakah $testimoni ada atau tidak
                var testimoniId = "{{ isset($testimoni) ? $testimoni->id_testimoni : 'null' }}";
                
                // Update action untuk hapus berdasarkan apakah $testimoni ada atau tidak
                if (testimoniId !== null) {
                    form.action = "{{ route('user.testimoni.delete', '__testimoniId__') }}".replace('__testimoniId__', testimoniId);
                } else {
                    alert("Testimoni tidak ditemukan.");
                    return;
                }

                form.method = 'POST'; // Set method menjadi POST untuk menghapus
                var deleteInput = document.createElement('input');
                deleteInput.type = 'hidden';
                deleteInput.name = '_method';
                deleteInput.value = 'DELETE'; // Set method ke DELETE
                form.appendChild(deleteInput);
                form.submit();
            }
        });

        // Fungsi untuk menangani aksi Update atau Simpan
        document.getElementById('saveBtn').addEventListener('click', function() {
            var form = document.getElementById('testimoniForm');
            if (!form.querySelector('input[name="_method"]')) {
                form.method = 'POST'; // Default method untuk Simpan
            }
        });
    </script>
@endsection

