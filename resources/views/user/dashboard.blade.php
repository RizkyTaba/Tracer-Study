@extends('layouts.user-home')

@section('title', 'Dashboard')

@section('header', 'Welcome to the Dashboard')

@section('content')
    <div class="flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 flex flex-col justify-center p-6">
            <h2 class="text-2xl font-bold">Dashboard User</h2>
            <p class="mt-4 text-gray-600">This is the main content for User. Here you can find all the relevant information and updates.</p>
        </div>
        <div class="md:w-1/2 mt-6 md:mt-0 md:ml-6 flex justify-center p-6">
        <img src="{{ asset('images/pp.jpg') }}" alt="Dashboard Image">
        </div>
    </div>
@endsection
