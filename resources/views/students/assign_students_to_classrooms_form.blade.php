@extends('home.app')

@section('content')
<div class="max-w-md mx-auto mt-8 p-6 bg-white rounded shadow-md">
    <h1 class="text-2xl font-bold mb-4">Assign Student to Classroom</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong class="font-bold">Oops! There were some errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('assign.student.classroom') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="student_id" class="block text-gray-700 text-sm font-bold mb-2">Select Student:</label>
            <select name="student_id" id="student_id" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <!-- Populate dropdown with students -->
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="classroom_id" class="block text-gray-700 text-sm font-bold mb-2">Select Classroom:</label>
            <select name="classroom_id" id="classroom_id" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <!-- Populate dropdown with classrooms -->
                @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->class_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Assign Student to Classroom</button>
    </form>
</div>
@endsection
