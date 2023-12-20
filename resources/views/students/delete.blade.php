@extends('layouts.app')

@section('content')
    <h1>Delete student</h1>

    <p>Are you sure you want to delete this student?</p>
    <p><strong>ID:</strong> {{ $student->id }}</p>
    <p><strong>Name:</strong> {{ $student->first_name }}</p>
    <!-- Display other student details for confirmation -->

    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
    </form>
@endsection
