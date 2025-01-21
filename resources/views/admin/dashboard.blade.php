@extends('layouts.admin-home')

@section('title', 'Dashboard')

@section('header', 'Welcome to the Dashboard')

@section('content')
<body>
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Alumni Terdaftar -->
            <div class="bg-red-500 text-white p-4 rounded-lg shadow-md transform transition duration-300 hover:scale-105 hover:shadow-lg">
                <div class="flex items-center">
                    <div class="mr-4">
                        <i class="fa fa-users fa-3x"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold">150</h2>
                        <p>Jumlah Alumni Terdaftar</p>
                    </div>
                </div>
                <a href="{{ route('alumni.index') }}" class="text-white underline mt-2 inline-block">View Details <i class="fa fa-arrow-circle-right"></i></a>
            </div>
    
            <!-- Tracer Kerja -->
            <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md transform transition duration-300 hover:scale-105 hover:shadow-lg">
                <div class="flex items-center">
                    <div class="mr-4">
                        <i class="fa fa-briefcase fa-3x"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold">50</h2>
                        <p>Tracer Kerja Baru</p>
                    </div>
                </div>
                <a href="/admin/tracer-kerja" class="text-white underline mt-2 inline-block">View Details <i class="fa fa-arrow-circle-right"></i></a>
            </div>
    
            <!-- Tracer Kuliah -->
            <div class="bg-yellow-500 text-white p-4 rounded-lg shadow-md transform transition duration-300 hover:scale-105 hover:shadow-lg">
                <div class="flex items-center">
                    <div class="mr-4">
                        <i class="fa fa-graduation-cap fa-3x"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold">30</h2>
                        <p>Tracer Kuliah Baru</p>
                    </div>
                </div>
                <a href="/admin/tracer-kuliah" class="text-white underline mt-2 inline-block">View Details <i class="fa fa-arrow-circle-right"></i></a>
            </div>

            <!-- Testimoni -->
            <div class="bg-green-500 text-white p-4 rounded-lg shadow-md transform transition duration-300 hover:scale-105 hover:shadow-lg">
                <div class="flex items-center">
                    <div class="mr-4">
                        <i class="fa fa-comments fa-3x"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold">10</h2>
                        <p>Jumlah Testimoni</p>
                    </div>
                </div>
                <a href="#" class="text-white underline mt-2 inline-block">View Details <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Pie Chart and Alumni List Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-8">
            <!-- Alumni List Section -->
            <div class="col-span-1">
                <h2 class="text-center text-xl font-semibold mb-4">Recent Alumni</h2>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="list-group">
                        <!-- Contoh Alumni 1 -->
                        <a href="#" class="list-group-item list-group-item-action flex items-center hover:bg-gray-100 transition duration-300">
                            <i class="fa fa-user-circle fa-2x mr-3"></i> John Doe
                        </a>
                        <!-- Contoh Alumni 2 -->
                        <a href="#" class="list-group-item list-group-item-action flex items-center hover:bg-gray-100 transition duration-300">
                            <i class="fa fa-user-circle fa-2x mr-3"></i> Jane Smith
                        </a>
                        <!-- Contoh Alumni 3 -->
                        <a href="#" class="list-group-item list-group-item-action flex items-center hover:bg-gray-100 transition duration-300">
                            <i class="fa fa-user-circle fa-2x mr-3"></i> Michael Johnson
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pie Chart Section -->
            <div class="col-span-1 lg:col-span-2">
                <h2 class="text-center text-xl font-semibold mb-4">Data Overview</h2>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <canvas id="pieChart" width="500" height="500" style="max-width: 600px; margin: auto;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div>
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
                                'rgba(239, 68, 68, 0.7)', // bg-red-500
                                'rgba(59, 130, 246, 0.7)', // bg-blue-500
                                'rgba(234, 179, 8, 0.7)', // bg-yellow-500
                                'rgba(34, 197, 94, 0.7)', // bg-green-500
                            ],
                            borderColor: [
                                'rgba(239, 68, 68, 1)', // bg-red-500
                                'rgba(59, 130, 246, 1)', // bg-blue-500
                                'rgba(234, 179, 8, 1)', // bg-yellow-500
                                'rgba(34, 197, 94, 1)', // bg-green-500
                            ],
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    color: 'black' // Change legend text color to black
                                }
                            }
                        }
                    }
                });
            });
        </script>
    </div>
</body>
@endsection