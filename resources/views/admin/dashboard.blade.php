@extends('layouts.admin-home')

@section('title', 'Beranda')

@section('header', 'Selamat Datang di Beranda')

@section('content')
    <div class="container mx-auto mt-4" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
        <h1 class="text-2xl font-semibold mb-4" style="color: #343a40;">Beranda</h1>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($stats as $stat)
                <div class="{{ $stat['color'] }} text-white p-4 rounded-lg shadow-md transform transition duration-500 hover:scale-105 hover:shadow-lg">
                    <div class="flex items-center">
                        <div class="mr-4">
                            <i class="fa fa-{{ $stat['icon'] }} fa-3x"></i>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold">{{ $stat['value'] }}</h2>
                            <p>{{ $stat['label'] }}</p>
                        </div>
                    </div>
                    <a href="{{ $stat['route'] }}" class="text-white underline mt-2 inline-block hover:text-gray-300">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            @endforeach
        </div>

        <!-- Grafik dan Daftar Alumni -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-8">
            <!-- Daftar Alumni -->
            <div class="col-span-1">
                <h2 class="text-center text-xl font-semibold mb-4" style="color: #343a40;">Alumni Terbaru</h2>
                <div class="bg-white p-4 rounded-lg shadow-md transform transition duration-300 hover:scale-105 hover:shadow-lg">
                    <div class="list-group">
                        @foreach($alumni as $alumnus)
                            <a href="{{ route('alumni.show', $alumnus->id_alumni) }}" class="list-group-item list-group-item-action flex items-center hover:bg-gray-100 transition duration-300">
                                <i class="fa fa-user-circle fa-2x mr-3"></i> {{ $alumnus->nama_depan }} {{ $alumnus->nama_belakang }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Grafik -->
            <div class="col-span-1 lg:col-span-2">
                <h2 class="text-center text-xl font-semibold mb-4" style="color: #343a40;">Ringkasan Data</h2>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <canvas id="pieChart" width="500" height="500" style="max-width: 600px; margin: auto;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('pieChart').getContext('2d');

            // Data untuk Grafik
            const labels = @json(array_column($stats, 'label'));
            const data = @json(array_column($stats, 'value'));
            const colors = @json(array_column($stats, 'color'));

            // Inisialisasi Grafik
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: [
                            'rgba(239, 68, 68)', // Merah
                            'rgba(0, 123, 255, 1)', // Biru
                            'rgba(255, 193, 7, 1)', // Kuning
                            'rgba(40, 167, 69, 1)', // Abu-abu
                        ],
                        borderColor: [
                            'rgba(255, 255, 255, 1)', // Merah
                            'rgba(255, 255, 255, 1)', // Biru
                            'rgba(255, 255, 255, 1)', // Kuning
                            'rgba(255, 255, 255, 1)', // Abu-abu
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
                                color: 'black'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection