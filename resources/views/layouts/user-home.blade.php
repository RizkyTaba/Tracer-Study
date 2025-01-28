<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #fff; /* Changed background color to white */
        }
        nav {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        nav a, nav button {
            transition: color 0.3s ease, background-color 0.3s ease;
        }
        nav .nav-links a {
            margin-right: 1rem;
            color: #4a4a4a;
            text-decoration: none;
        }
        nav .nav-links a:hover {
            color: #1d72b8;
        }
        nav .nav-links {
            display: flex;
            align-items: center;
        }
        nav .nav-links .logout-button {
            background-color: #1d72b8;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
        }
        nav .nav-links .logout-button:hover {
            background-color: #155a8a;
        }
        nav .mobile-menu-button {
            display: none;
        }
        @media (max-width: 768px) {
            nav .nav-links {
                display: none;
            }
            nav .mobile-menu-button {
                display: block;
            }
            nav .mobile-menu {
                display: none;
                flex-direction: column;
                background-color: #fff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            nav .mobile-menu a {
                padding: 1rem;
                border-bottom: 1px solid #eaeaea;
                color: #4a4a4a;
                text-decoration: none;
            }
            nav .mobile-menu a:hover {
                background-color: #f5f5f5;
                color: #1d72b8;
            }
            nav .mobile-menu .logout-button {
                padding: 1rem;
                border: none;
                background-color: #fff;
                color: #4a4a4a;
                text-align: left;
                width: 100%;
            }
            nav .mobile-menu .logout-button:hover {
                background-color: #f5f5f5;
                color: #1d72b8;
            }
        }
    </style>
</head>
<body>
    <!-- Top Navigation Bar -->
    <nav>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="text-xl font-semibold text-gray-800 hover:text-blue-500">
                User Panel
            </a>

            <!-- Navigation Links -->
            <div class="nav-links hidden md:flex space-x-6">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
                <a href="{{ route('user.Pekerjaan') }}">Tracer Kerja</a>
                <a href="{{ route('user.Kuliah') }}">Tracer Kuliah</a>
                @auth
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-button">Log Out</button>
                    </form>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="mobile-menu-button md:hidden">
                <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu md:hidden">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('profile.edit') }}">Profile</a>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">Log Out</button>
                </form>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto mt-6 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>


@yield('script')
</body>
</html>
