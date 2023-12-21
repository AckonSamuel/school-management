<aside class="bg-gray-800 text-white w-64 min-h-screen">
    <div class="p-4">
        <h2 class="text-xl font-bold mb-4">Menu</h2>
        <ul class="space-y-2">
        <li><a href="/" class="block hover:bg-gray-700 px-4 py-2">Dashboard</a></li>
            <li><a href="{{ route('teachers.index') }}" class="block hover:bg-gray-700 px-4 py-2">Teachers</a></li>
            <li><a href="{{ route('students.index') }}" class="block hover:bg-gray-700 px-4 py-2">Students</a></li>
            <li><a href="{{ route('classrooms.index') }}" class="block hover:bg-gray-700 px-4 py-2">Classrooms</a></li>
            <li><a href="{{ route('logout') }}" class="block hover:bg-gray-700 px-4 py-2 mt-auto">Logout</a></li>
        </ul>
    </div>
</aside>
