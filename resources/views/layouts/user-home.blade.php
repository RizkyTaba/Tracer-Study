<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #fff;
        }
        nav {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 4rem;
        }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        .nav-links a {
            color: #4a4a4a;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }
        .nav-links a:hover {
            color: #1d72b8;
        }
        .logout-button {
            background-color: #1d72b8;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .logout-button:hover {
            background-color: #155a8a;
        }
        .mobile-menu-button {
            display: none;
        }
        .mobile-menu {
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            .mobile-menu-button {
                display: block;
                background: none;
                border: none;
                padding: 0.5rem;
                cursor: pointer;
            }
            .mobile-menu {
                position: absolute;
                top: 4rem;
                left: 0;
                right: 0;
                background-color: #fff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                padding: 1rem 0;
                width: 100%;
            }
            .mobile-menu.show {
                display: flex;
                flex-direction: column;
                opacity: 1;
                transform: translateY(0);
            }
            .mobile-menu a {
                padding: 0.75rem 1.5rem;
                color: #4a4a4a;
                text-decoration: none;
                border-bottom: 1px solid #eaeaea;
                font-size: 1rem;
                transition: all 0.3s ease;
            }
            .mobile-menu a:hover {
                background-color: #eaeaea;
                color: #1d72b8;
            }
            .mobile-menu .logout-button {
                margin: 0.75rem 1.5rem;
                text-align: center;
            }
            .user-name {
                padding: 0.75rem 1.5rem;
                color: #4a4a4a;
                border-bottom: 1px solid #eaeaea;
            }

            
        }
    </style>
</head>
<body>
    <!-- Top Navigation Bar -->
    <nav>
        <div class="nav-container">
            <a href="{{ route('dashboard') }}" class="text-xl font-semibold text-gray-800 hover:text-blue-500">
                User Panel
            </a>

            <div class="nav-links">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
                <a href="{{ route('user.Pekerjaan') }}">Kuesioner Kerja</a>
                <a href="{{ route('user.Kuliah') }}">Kuesioner Kuliah</a>
                <a href="{{ route('user.profil') }}">Profil</a>
                @auth
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-button">Log Out</button>
                    </form>
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                @endauth
            </div>

            <button class="mobile-menu-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <div class="mobile-menu">
            <a href="{{ route('user.dashboard') }}">Dashboard</a>
            <a href="{{ route('user.Pekerjaan') }}">Kuesioner Kerja</a>
            <a href="{{ route('user.Kuliah') }}">Kuesioner Kuliah</a>
            <a href="{{ route('user.profil') }}">Profil</a>
            @auth
                <div class="user-name">{{ Auth::user()->name }}</div>
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
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('show');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
                mobileMenu.classList.remove('show');
            }
        });
    </script>

@yield('script')
</body>
</html>
