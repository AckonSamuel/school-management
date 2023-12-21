@extends('home.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

<div class="grid grid-cols-3 gap-4">
    <div class="bg-white p-6 shadow rounded-lg">
        <h2 class="text-xl font-semibold mb-4">Total Students</h2>
        <p class="text-4xl font-bold">{{ $studentsCount }}</p>
    </div>
    <div class="bg-white p-6 shadow rounded-lg">
        <h2 class="text-xl font-semibold mb-4">Total Teachers</h2>
        <p class="text-4xl font-bold">{{ $teachersCount }}</p>
    </div>
    <div class="bg-white p-6 shadow rounded-lg">
        <h2 class="text-xl font-semibold mb-4">Total Classrooms</h2>
        <p class="text-4xl font-bold">{{ $classroomsCount }}</p>
    </div>
    <div class="bg-white p-6 shadow rounded-lg">
        <h2 class="text-xl font-semibold mb-4">Total Subjects</h2>
        <p class="text-4xl font-bold">{{ $subjectsCount }}</p>
    </div>
</div>

    <!-- Additional Sections -->
    <div class="mt-8">
        <!-- Other sections or content -->
    </div>

    <script>
</script>
@endsection
