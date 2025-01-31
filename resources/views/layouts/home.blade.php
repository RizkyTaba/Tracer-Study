<head>
    <style>
        .navbar {
            background-color: white; /* Latar belakang putih untuk navbar */
            z-index: 1; /* Memastikan navbar berada di atas overlay */
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan ke navbar */
        }
        .navbar-brand, .nav-link {
            color: black; /* Teks hitam untuk item navbar */
        }
        .navbar-brand:hover, .nav-link:hover {
            color: gray; /* Ubah warna saat hover */
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="{{ url('/') }}">Aplikasi Tracer Study</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Masuk</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Daftar</a>
            </li> --}}
        </ul>
    </div>
</nav>