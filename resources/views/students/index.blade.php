@extends('home.app')

@section('content')
    <h1>Students List</h1>

    <a href="{{ route('students.create') }}">Create New Student</a>

    @if($students->isEmpty())
        <p>No students available</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->first_name }}</td>
                        <td> {{ $student->email }}</td>
                        <td>{{$student->phone_number }}</td>
                        <td>{{ $student->address}}</td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}">View</a>
                            <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                            <a href="{{ route('students.destroy', $student->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
