<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Laravel App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden; /* Prevent scrollbars */
        }
        .video-background {
            position: fixed; /* Fix video in the background */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2; /* Send video behind overlay */
            object-fit: cover; /* Ensure the video covers the entire screen */
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
            z-index: -1; /* Place overlay above video but behind content */
        }
        .hero {
            color: white;
            height: 100vh; /* Full height of the viewport */
            display: flex; /* Use flexbox to center content */
            flex-direction: column; /* Align items vertically */
            justify-content: center; /* Center vertically */
            align-items: center; /* Center horizontally */
            text-align: center;
            z-index: 1; /* Ensure content is above the overlay */
        }
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    @include('layouts.home') <!-- Include the navbar -->
    <!-- Video Background -->
    <video class="video-background" autoplay muted loop>
        <source src="{{ asset('videos/Alumni.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Dark Overlay -->
    <div class="overlay"></div>

    <!-- Content -->
    <div class="hero">
        <div class="container">
            <h1>Aplikasi Tracer Study</h1>
            <p>Selamat Datang di Aplikasi Tracer Study Kami</p>
            <a href="{{ route('login') }}" class="btn btn-light btn-lg">Masuk</a>
            {{-- <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Daftar</a> --}}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
