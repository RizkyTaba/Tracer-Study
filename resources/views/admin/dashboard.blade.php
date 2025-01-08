@extends('layouts.admin-home')

@section('title', 'Dashboard')

@section('header', 'Welcome to the Dashboard')

@section('content')
<body>
    <div class="container mt-4">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <h1>Dashboard</h1>
        <div class="row">
            <!-- Alumni Terdaftar -->
            <div class="col-lg-3 col-md-6">
                <div class="card text-white mb-4" style="background-color: rgba(255, 99, 132, 0.7);">
                    <div class="card-body">
                        <h2>150</h2>
                        <p>Jumlah Alumni Terdaftar</p>
                    </div>
                    <div class="card-footer text-white">
                        <a href="/admin/alumni" class="text-white">View Details <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
    
            <!-- Tracer Kerja -->
            <div class="col-lg-3 col-md-6">
                <div class="card text-white mb-4" style="background-color: rgba(54, 162, 235, 0.7);">
                    <div class="card-body">
                        <h2>50</h2>
                        <p>Tracer Kerja Baru</p>
                    </div>
                    <div class="card-footer text-white">
                        <a href="/admin/tracer-kerja" class="text-white">View Details <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
    
            <!-- Tracer Kuliah -->
            <div class="col-lg-3 col-md-6">
                <div class="card text-white mb-4" style="background-color: rgba(255, 206, 86, 0.7);">
                    <div class="card-body">
                        <h2>30</h2>
                        <p>Tracer Kuliah Baru</p>
                    </div>
                    <div class="card-footer text-white">
                        <a href="/admin/tracer-kuliah" class="text-white">View Details <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
    
            <!-- Testimoni -->
            <div class="col-lg-3 col-md-6">
                <div class="card text-white mb-4" style="background-color: rgba(75, 192, 192, 0.7);">
                    <div class="card-body">
                        <h2>10</h2>
                        <p>Jumlah Testimoni</p>
                    </div>
                    <div class="card-footer text-white">
                        <a href="/admin/testimoni" class="text-white">View Details <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Pie Chart and Alumni List Section -->
        <div class="row mt-5">
            <!-- Alumni List Section -->
            <div class="col-lg-4">
                <h2 class="text-center">Recent Alumni</h2>
                <div class="list-group">
                    <!-- Contoh Alumni 1 -->
                    <a href="#" class="list-group-item list-group-item-action">
                        John Doe
                    </a>
                    <!-- Contoh Alumni 2 -->
                    <a href="#" class="list-group-item list-group-item-action">
                        Jane Smith
                    </a>
                    <!-- Contoh Alumni 3 -->
                    <a href="#" class="list-group-item list-group-item-action">
                        Michael Johnson
                    </a>
                </div>
            </div>
    
            <!-- Pie Chart Section -->
            <div class="col-lg-6 offset-lg-2">
                <h2 class="text-center">Data Overview</h2>
                <div class="card bg-white border-r border-gray-200">
                    <div class="card-body">
                        <canvas id="pieChart" width="500" height="500" style="max-width: 400px; margin: auto;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('pieChart').getContext('2d');
    
            // Data untuk Pie Chart
            const labels = ['Alumni Terdaftar', 'Tracer Kerja Baru', 'Tracer Kuliah Baru', 'Testimoni'];
            const data = [150, 50, 30, 10]; // Ganti angka ini sesuai dengan data dinamis
    
            // Inisialisasi Pie Chart
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    }
                }
            });
        });
    </script>
</body>
@endsection
