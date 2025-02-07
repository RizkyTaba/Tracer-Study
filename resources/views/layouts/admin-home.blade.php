<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dasbor Administrator')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --accent-color: #3498db;
            --hover-color: #2980b9;
            --text-light: #ecf0f1;
            --danger-color: #e74c3c;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            height: 100vh;
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
            color: var(--text-light);
            transition: all 0.3s ease;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            position: fixed;
            left: 0;
            top: 0;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar-header {
            padding: 1.5rem 1rem;
            background: rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar ul li a {
            padding: 0.8rem 1.5rem;
            color: var(--text-light);
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar ul li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 3px solid var(--accent-color);
        }

        .sidebar-toggle {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1000;
            background-color: var(--accent-color);
            color: var(--text-light);
            border: none;
            padding: 0.5rem;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .sidebar-toggle:hover {
            background-color: var(--hover-color);
        }

        .main-content {
            margin-left: 250px;
            padding: 2rem;
            min-height: 100vh;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 70px;
        }

        /* Header Styles */
        header {
            background-color: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            border-radius: 8px;
        }

        .user-info {
            color: var(--text-light);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        /* Logout Button Style */
        .logout-button {
            background: none;
            border: none;
            color: var(--text-light);
            width: 100%;
            text-align: left;
            transition: all 0.3s ease;
        }

        .logout-button:hover {
            background-color: var(--danger-color);
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%; /* Full width on small screens */
                height: auto; /* Auto height */
                position: relative; /* Change to relative */
            }

            .main-content {
                margin-left: 0; /* No margin on small screens */
                padding: 1rem; /* Adjust padding */
            }
        }

        /* Animation for menu items */
        .sidebar ul li a {
            position: relative;
            overflow: hidden;
        }

        .sidebar ul li a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--accent-color);
            transition: width 0.3s ease;
        }

        .sidebar ul li a:hover::after {
            width: 100%;
        }

        .sidebar.collapsed .nav-link-text {
            display: none; /* Sembunyikan teks saat sidebar ditutup */
        }

        /* Adjust this for better responsiveness */
        @media (max-width: 768px) {
            .main-content {
                padding: 1rem; /* Adjust padding for small screens */
            }
        }

        body {
            background-color: #f8f9fa; /* Menambahkan warna latar belakang untuk body */
        }
    </style>
</head>
<body>
    <!-- Tombol Pengatur Bilah Samping -->
    <button class="sidebar-toggle" onclick="toggleSidebar()" aria-label="Atur Bilah Samping">
        <i class="bi bi-list"></i>
    </button>

    <div class="d-flex h-100">
        <!-- Bilah Samping -->
        <nav class="sidebar" id="sidebar" role="navigation">
            <!-- Bagian Atas -->
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-speedometer2 me-2"></i>
                    <span class="nav-link-text">Administrator</span>
                </a>
            </div>

            <!-- Menu Navigasi -->
            <ul class="list-unstyled mt-3">
                @foreach ([
                    ['route' => 'admin.dashboard', 'label' => __('Beranda'), 'icon' => 'bi bi-house'],
                    ['route' => 'alumni.index', 'label' => __('Data Alumni'), 'icon' => 'bi bi-people'],
                    ['route' => 'tahun_lulus.index', 'label' => __('Tahun Kelulusan'), 'icon' => 'bi bi-calendar'],
                    ['route' => 'status_alumni.index', 'label'  => __('Status Alumni'), 'icon' => 'bi bi-check2-circle'],
                    ['route' => 'bidang_keahlian.index', 'label' => __('Bidang Keahlian'), 'icon' => 'bi bi-briefcase'],
                    ['route' => 'program_keahlian.index', 'label' => __('Program Keahlian'), 'icon' => 'bi bi-journal'],
                    ['route' => 'konsentrasi_keahlian.index', 'label' => __('Konsentrasi Keahlian'), 'icon' => 'bi bi-layers'],
                    ['route' => 'tracer_kuliah.index', 'label' => __('Tracer Kuliah'), 'icon' => 'bi bi-building'],
                    ['route' => 'tracer_kerja.index', 'label' => __('Tracer Kerja'), 'icon' => 'bi bi-briefcase'],
                    ['route' => 'testimoni.index', 'label' => __('Testimoni Alumni'), 'icon' => 'bi bi-chat-left-text'],
                ] as $item)
                <li>
                    <a href="{{ route($item['route']) }}" class="d-flex align-items-center px-4 py-3 hover:bg-light" title="{{ $item['label'] }}">
                        <i class="{{ $item['icon'] }} me-2"></i>
                        <span class="nav-link-text">{{ $item['label'] }}</span>
                    </a>
                </li>
                @endforeach

                <!-- Tombol Keluar -->
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="mb-0">
                        @csrf
                        <button type="submit" class="w-100 text-start px-4 py-3 logout-button">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            <span class="nav-link-text">{{ __('Keluar Sistem') }}</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Konten Utama -->
        <main class="main-content flex-grow-1 d-flex flex-column" id="main-content">
            <!-- Bagian Atas -->
            <header>
                <div class="d-flex justify-content-between align-items-center">
                    <h1>@yield('title')</h1>
                    <div class="user-info">
                        @auth
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                        @endauth
                    </div>
                </div>
            </header>

            <!-- Area Konten -->
            <section class="flex-grow-1 p-4">
                <div class="container">
                    @yield('content')
                </div>
            </section>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            
            sidebar.classList.toggle('collapsed');
            sidebar.classList.toggle('active');
            mainContent.classList.toggle('expanded');

            const isCollapsed = sidebar.classList.contains('collapsed');
            localStorage.setItem('sidebarCollapsed', isCollapsed);
        }
    
        // Fungsi untuk memeriksa status sidebar saat halaman dimuat
        function checkSidebarState() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
    
            if (isCollapsed) {
                sidebar.classList.add('collapsed');
                sidebar.style.visibility ="visible"
                mainContent.classList.add('expanded');
            } else {
                sidebar.classList.remove('collapsed');
                mainContent.classList.remove('expanded');
            }
        }
    
        // Panggil fungsi checkSidebarState saat halaman dimuat
        document.addEventListener('DOMContentLoaded', checkSidebarState);
    </script>
    @yield('scripts')
</body>
</html>