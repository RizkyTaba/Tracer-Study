@extends('layouts.admin-home')

@section('title', 'Dashboard')

@section('header', 'Welcome to the Dashboard')

@section('content')
<div class="container mt-5">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <h1>Dashboard</h1>
    <div class="row">
        <!-- Alumni Terdaftar -->
        <div class="col-lg-3 col-md-6">
            <div class="card bg-info text-white mb-4">
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
            <div class="card bg-info text-white mb-4">
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
            <div class="card bg-info text-white mb-4">
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
            <div class="card bg-info text-white mb-4">
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
</div>

@endsection
