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
            transition: transform 0.3s ease;
        }
        
        .mobile-menu-button.active {
            transform: rotate(90deg);
        }
        
        .mobile-menu-button svg {
            transition: stroke 0.3s ease;
        }
        
        .mobile-menu-button.active svg {
            stroke: #1d72b8;
        }
        .mobile-menu {
            display: none;
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.3s ease-in-out;
        }
        
        .mobile-menu.closing {
            opacity: 0;
            transform: translateY(-20px);
            pointer-events: none;
        }
        
        .mobile-menu.show {
            display: flex;
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
                clip-path: inset(0 0 100% 0);
            }
            to {
                opacity: 1;
                transform: translateY(0);
                clip-path: inset(0 0 0 0);
            }
        }

        @keyframes textReveal {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideOut {
            from {
                opacity: 1;
                transform: translateY(0);
                clip-path: inset(0 0 0 0);
            }
            to {
                opacity: 0;
                transform: translateY(-10px);
                clip-path: inset(0 0 100% 0);
            }
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

            .mobile-menu a,
            .mobile-menu .user-name,
            .mobile-menu form {
                opacity: 0;
                animation: slideIn 0.3s ease-out forwards;
            }

            .mobile-menu a span,
            .mobile-menu .user-name span,
            .mobile-menu form button {
                display: inline-block;
                opacity: 0;
                animation: textReveal 0.3s ease-out forwards;
            }

            .mobile-menu a:nth-child(1) span { animation-delay: 0.2s; }
            .mobile-menu a:nth-child(2) span { animation-delay: 0.3s; }
            .mobile-menu a:nth-child(3) span { animation-delay: 0.4s; }
            .mobile-menu a:nth-child(4) span { animation-delay: 0.5s; }
            .mobile-menu .user-name span { animation-delay: 0.6s; }
            .mobile-menu form button { animation-delay: 0.7s; }

            .mobile-menu.show a,
            .mobile-menu.show .user-name,
            .mobile-menu.show form {
                opacity: 1;
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
            .mobile-menu form {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0.75rem 1.5rem;
                border-bottom: 1px solid #eaeaea;
            }

            .mobile-menu .logout-button {
                margin: 0;
                width: auto;
                order: 1;
            }

            .mobile-menu .user-name {
                margin: 0;
                padding: 0;
                border-bottom: none;
                order: 2;
                color: #666;
            }
            .user-name {
                padding: 0.75rem 1.5rem;
                color: #4a4a4a;
                border-bottom: 1px solid #eaeaea;
            }

            .mobile-menu.closing a,
            .mobile-menu.closing .user-name,
            .mobile-menu.closing form {
                animation: slideOut 0.3s ease-in forwards;
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
            <a href="{{ route('user.dashboard') }}"><span>Dashboard</span></a>
            <a href="{{ route('user.Pekerjaan') }}"><span>Kuesioner Kerja</span></a>
            <a href="{{ route('user.Kuliah') }}"><span>Kuesioner Kuliah</span></a>
            <a href="{{ route('user.profil') }}"><span>Profil</span></a>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">Log Out</button>
                    <div class="user-name"><span>{{ Auth::user()->name }}</span></div>
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
            if (mobileMenu.classList.contains('show')) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
            mobileMenuButton.classList.toggle('active');
        });

        function openMobileMenu() {
            mobileMenu.classList.remove('closing');
            mobileMenu.classList.add('show');
        }

        function closeMobileMenu() {
            mobileMenu.classList.add('closing');
            setTimeout(() => {
                mobileMenu.classList.remove('show');
                mobileMenu.classList.remove('closing');
            }, 300); // Match the animation duration
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target) && mobileMenu.classList.contains('show')) {
                closeMobileMenu();
                mobileMenuButton.classList.remove('active');
            }
        });
    </script>

@yield('script')
</body>
</html>
