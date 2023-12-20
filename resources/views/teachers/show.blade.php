@extends('layouts.app')

@section('content')
    <h1>Teacher Details</h1>

    <p><strong>First Name:</strong> {{ $teacher->first_name }}</p>
    <p><strong>Last Name:</strong> {{ $teacher->last_name }}</p>
    <p><strong>Birthday:</strong> {{ $teacher->birthday }}</p>
    <p><strong>Email:</strong> {{ $teacher->email }}</p>
    <p><strong>Phone Number:</strong> {{ $teacher->phone_number }}</p>
    <p><strong>Address:</strong> {{ $teacher->address }}</p>
    
    @if ($teacher->photo)
        <p><strong>Photo:</strong></p>
        <img src="{{ $teacher->photo }}" alt="Teacher's Photo" style="max-width: 300px;">
    @endif

    <a href="{{ route('teachers.edit', $teacher->id) }}">Edit</a>

    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection
