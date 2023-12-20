@extends('layouts.app')

@section('content')
    <h1>Delete Teacher</h1>

    <p>Are you sure you want to delete this teacher?</p>
    <p><strong>ID:</strong> {{ $teacher->id }}</p>
    <p><strong>Name:</strong> {{ $teacher->first_name }}</p>
    <!-- Display other teacher details for confirmation -->

    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</button>
    </form>
@endsection
