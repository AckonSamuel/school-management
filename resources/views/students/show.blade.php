@extends('layouts.app')

@section('content')
    <h1>Student Details</h1>

    <p><strong>First Name:</strong> {{ $student->first_name }}</p>
    <p><strong>Last Name:</strong> {{ $student->last_name }}</p>
    <p><strong>Student Number: </strong> {{ $student->student_num}} </p>
    @if ($student->classroom)
        <p><strong>Class Name:</strong> {{ $student->classroom->class_name }}</p>
    @endif
    <p><strong>Parent Contact: </strong> {{ $student->parent_phone_number}} </p>
    <p><strong>Birthday:</strong> {{ $student->birthday }}</p>
    <p><strong>Gender:</strong>{{ $student->gender}}</p>
    <p><strong>Address:</strong> {{ $student->address }}</p>
    
    @if ($student->photo)
        <p><strong>Photo:</strong></p>
        <img src="{{ $student->photo }}" alt="student's Photo" style="max-width: 300px;">
    @endif

    <a href="{{ route('students.edit', $student->id) }}">Edit</a>

    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection
