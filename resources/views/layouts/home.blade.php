<head>
    <style>
        .navbar {
            background-color: white; /* White background for navbar */
            z-index: 1; /* Ensure navbar is above the overlay */
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1); /* Add shadow to navbar */
        }
        .navbar-brand, .nav-link {
            color: black; /* Black text for navbar items */
        }
        .navbar-brand:hover, .nav-link:hover {
            color: gray; /* Change color on hover */
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="{{ url('/') }}">Tracer Study App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        </ul>
    </div>
</nav>