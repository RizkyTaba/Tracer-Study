<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            color: #fff;
            transition: width 0.3s ease;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            -ms-overflow-style: none; /* IE and Edge */
            scrollbar-width: none; /* Firefox */
        }
        .sidebar.collapsed {
            width: 60px;
        }
        .sidebar.collapsed .sidebar-header,
        .sidebar.collapsed .nav-link-text {
            display: none;
        }
        .sidebar-header {
            padding: 20px;
            text-align: center;
            background-color: #2c3136;
        }
        .sidebar-header a {
            color: #fff;
            text-decoration: none;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li a {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .sidebar ul li a:hover {
            background-color: #495057;
        }
        .sidebar ul li a i {
            margin-right: 10px;
        }
        .sidebar-toggle {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1000;
            background-color: #343a40;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
        .main-content {
            margin-left: 250px;
            transition: margin-left 0.3s ease;
            overflow-y: auto;
            -ms-overflow-style: none; /* IE and Edge */
            scrollbar-width: none; /* Firefox */
        }
        .main-content.expanded {
            margin-left: 60px;
        }
        body {
            background-color: #f9f9f9;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1000;
                background-color: #343a40;
                color: #fff;
                transition: width 0.3s ease;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .main-content {
                margin-left: 0;
                transition: margin-left 0.3s ease;
            }
        }
        .sidebar::-webkit-scrollbar {
            display: none;
        }
        .main-content::-webkit-scrollbar {
            display: none;
        }
        .list-unstyled.collapsed{
            visibility: visible !important;
        }
    </style>
</head>
<body>
    <!-- Sidebar Toggle Button -->
    <button class="sidebar-toggle" onclick="toggleSidebar()" aria-label="Toggle Sidebar">
        <i class="bi bi-list"></i>
    </button>

    <div class="d-flex h-100">
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar" role="navigation">
            <!-- Header -->
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-speedometer2 me-2"></i>
                    <span class="nav-link-text">Admin Panel</span>
                </a>
            </div>

            <!-- Navigation Links -->
            <ul class="list-unstyled mt-3">
                @foreach ([
                    ['route' => 'admin.dashboard', 'label' => __('Dashboard'), 'icon' => 'bi bi-house'],
                    ['route' => 'alumni.index', 'label' => __('Alumni'), 'icon' => 'bi bi-people'],
                    ['route' => 'tahun_lulus.index', 'label' => __('Tahun Lulus'), 'icon' => 'bi bi-calendar'],
                    ['route' => 'status_alumni.index', 'label'  => __('Status Alumni'), 'icon' => 'bi bi-check2-circle'],
                    ['route' => 'tracer_kuliah.index', 'label' => __('Tracer Kuliah'), 'icon' => 'bi bi-building'],
                    ['route' => 'tracer_kerja.index', 'label' => __('Tracer Kerja'), 'icon' => 'bi bi-briefcase'],
                    ['route' => 'testimoni.index', 'label' => __('Testimoni'), 'icon' => 'bi bi-chat-left-text'],
                ] as $item)
                <li>
                    <a href="{{ route($item['route']) }}" class="d-flex align-items-center px-4 py-3 hover:bg-light" title="{{ $item['label'] }}">
                        <i class="{{ $item['icon'] }} me-2"></i>
                        <span class="nav-link-text">{{ $item['label'] }}</span>
                    </a>
                </li>
                @endforeach

                <!-- Submenu -->
                <li>
                    <a href="#keahlianSubmenu" 
                       class="d-flex align-items-center px-4 py-3 text-decoration-none" 
                       data-bs-toggle="collapse" 
                       aria-expanded="false" 
                       aria-controls="keahlianSubmenu">
                        <i class="bi bi-book me-2"></i>
                        <span class="nav-link-text">{{ __('Keahlian') }}</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul style="visibility: visible" class="collapse list-unstyled ms-3" id="keahlianSubmenu">
                        @foreach ([
                            ['route' => 'bidang_keahlian.index', 'label' => __('Bidang Keahlian'), 'icon' => 'bi bi-briefcase'],
                            ['route' => 'program_keahlian.index', 'label' => __('Program Keahlian'), 'icon' => 'bi bi-journal'],
                            ['route' => 'konsentrasi_keahlian.index', 'label' => __('Konsentrasi Keahlian'), 'icon' => 'bi bi-layers'],
                        ] as $submenu)
                        <li>
                            <a href="{{ route($submenu['route']) }}" 
                               class="d-block px-4 py-2 text-decoration-none hover-bg-light" title="{{ $submenu['label'] }}">
                                <i class="bi bi-dot me-2"></i> {{ $submenu['label'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="mb-0">
                        @csrf
                        <button type="submit" class="w-100 text-start px-4 py-3 logout-button">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            <span class="nav-link-text">{{ __('Log Out') }}</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="main-content flex-grow-1 d-flex flex-column" id="main-content">
            <!-- Header -->
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

            <!-- Content Section -->
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
        // Fungsi untuk toggle sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
    
            // Simpan status sidebar di localStorage
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
</body>
</html>