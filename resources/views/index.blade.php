<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            color: #f8f9fa;
            display: block;
            padding: 10px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .sidebar .active {
            background-color: #007bff;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .navbar {
            margin-left: 250px;
            background-color: #007bff;
            color: white;
        }
        .navbar .navbar-brand, .navbar .nav-link {
            color: white;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <a href="#dashboard" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="{{ route('admin.users.index') }}" class="active"><i class="fas fa-users"></i> Users</a>
        <a href="#settings"><i class="fas fa-cogs"></i> Settings</a>
        <a href="#reports"><i class="fas fa-chart-line"></i> Reports</a>
        <a href="#logout"
           onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
           <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">Welcome, Admin</a>
    </nav>

    <div class="content">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
