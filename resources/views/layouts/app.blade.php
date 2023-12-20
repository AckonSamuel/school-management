<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School management</title>
</head>
<body>
            <!-- Add your header content here -->
            <h1>School Management</h1>
        <nav>
            <ul>
                <li><a href="{{ route('teachers.index') }}">Teachers</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            @yield('content') <!-- This is where specific view content will be injected -->
        </div>
    </main>

    <footer>
        <!-- Add your footer content here -->
        <p>&copy; {{ date('Y') }} Your Application. All rights reserved.</p>
    </footer>

</body>
</html>