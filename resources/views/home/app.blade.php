<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- @vite('resources/css/app.css') -->

<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navigation -->
    @include('home.partials.navigation')

    <!-- Page Content -->
    <div class="container mx-0 flex">

        <!-- Side Navigation -->
        @include('home.partials.sidebar')

        <!-- Main Content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>

    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-4">
        <p>&copy; 2023 School Management System. All rights reserved.</p>
    </footer>
</body>
@yeild('chart')
</html>