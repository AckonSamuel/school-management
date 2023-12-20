@extends('home.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

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
@endsection
