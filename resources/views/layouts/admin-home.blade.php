<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        a {
            text-decoration: none !important;
        }
        nav {
            position: fixed;
            top: 0;
            bottom: 0;
            overflow-y: auto;
        }
        main {
            margin-left: 16rem; /* Adjust based on the width of the nav */
        }
        pre {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #f8f9fa;
            padding: 1rem;
            border-top: 1px solid #dee2e6;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar Navigation -->
        <nav class="w-64 bg-white border-r border-gray-200">
            <div class="h-16 flex items-center justify-center border-b border-gray-200">
                <!-- Logo -->
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-semibold text-gray-800">
                    Admin Panel
                </a>
            </div>
            <ul class="mt-4">
                <!-- Dashboard Link -->
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                        {{ __('Dashboard') }}
                    </a>
                </li>

                <!-- Alumni Link -->
                <li>
                    <a href="{{ route('sekolah.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                        {{ __('Sekolah') }}
                    </a>
                </li>

                <!-- Profile Link -->
                <li>
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                        {{ __('Profile') }}
                    </a>
                </li>


                <!-- Logout Link -->
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <h1 class="text-lg font-semibold text-gray-800"></h1>
                    <div>
                        @auth
                            <span class="text-gray-600">{{ Auth::user()->name }}</span>
                        @endauth
                    </div>
                </div>
            </header>

            <!-- Dynamic Content -->
            <section class="flex-1 p-4">
                @yield('content')
            </section>
        </main>
    </div>
</body>
</html>
