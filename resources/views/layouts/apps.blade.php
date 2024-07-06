<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Job Portal')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            
            padding: 0.5rem 1rem;
            background-color: #343a40;
        }
        .navbar-brand {
            color: #fff;
            font-size: 1.5rem;
        }
        .navbar-nav {
            display: flex;
            gap: 1rem;
        }
        .navbar-nav a {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
        }
        .navbar-nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-brand">
                <img src="{{ asset('path/to/logo.png') }}" alt="Logo" style="height: 40px;">
            </div>
            <div class="d-flex ">
                <ul class="navbar-nav">
                    <li><a class="mr-3" href="{{ route('employeur.job-offers.index') }}"> Job Offers </a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </nav>
    </header>

    <main class="py-4 container">
        @yield('content')
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
