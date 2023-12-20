<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    @vite('resources/css/app.css')
    <!-- Include any additional CSS or scripts -->
</head>

<body class="bg-gray-100 font-sans">

    <!-- Navigation -->
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <span class="text-2xl font-bold">School Management System</span>
                <ul class="flex space-x-4">
                    <li><a href="#" class="hover:underline">Dashboard</a></li>
                    <li><a href="#" class="hover:underline">Students</a></li>
                    <li><a href="#" class="hover:underline">Teachers</a></li>
                    <!-- Add more navigation links as needed -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container mx-auto py-8">

        <!-- Dashboard Content -->
        <div class="grid grid-cols-3 gap-4">
            <!-- Cards or Widgets -->
            <div class="bg-white p-6 shadow rounded-lg">
                <h2 class="text-xl font-semibold mb-4">Total Students</h2>
                <p class="text-4xl font-bold">250</p>
            </div>
            <div class="bg-white p-6 shadow rounded-lg">
                <h2 class="text-xl font-semibold mb-4">Total Teachers</h2>
                <p class="text-4xl font-bold">20</p>
            </div>
            <div class="bg-white p-6 shadow rounded-lg">
                <h2 class="text-xl font-semibold mb-4">Classes</h2>
                <ul>
                    <li><a href="#" class="hover:underline">Class 1</a></li>
                    <li><a href="#" class="hover:underline">Class 2</a></li>
                    <!-- Add more class links or information -->
                </ul>
            </div>
        </div>

        <!-- Additional Sections -->
        <div class="mt-8">
            <!-- Other sections or content -->
        </div>

    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-4">
        <p>&copy; 2023 School Management System. All rights reserved.</p>
    </footer>

</body>

</html>
