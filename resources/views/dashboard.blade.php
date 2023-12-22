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
<div class="mt-8">
            <canvas id="myChart" class="w-full h-60"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Students', 'Teachers', 'Classrooms', 'Subjects'],
                datasets: [{
                    label: 'Entity population',
                    data: [{{ $studentsCount }}, {{ $teachersCount }}, {{ $classroomsCount }}, {{ $subjectsCount }}],
                    backgroundColor: [
                        'rgba(255, 99, 132)', // Red
                        'rgba(54, 162, 235)', // Blue
                        'rgba(255, 205, 86)', // Yellow
                        'rgba(75, 192, 192)', // Green
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'x',
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
