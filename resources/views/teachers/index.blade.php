@extends('layouts.app')

@section('content')
    <h1>Teachers List</h1>

    @if($teachers->isEmpty())
        <p>No teachers available</p>
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
                @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->first_name }}</td>
                        <td> {{ $teacher->email }}</td>
                        <td>{{$teacher->phone_number }}</td>
                        <td>{{ $teacher->address}}</td>
                        <td>
                            <a href="{{ route('teachers.show', $teacher->id) }}">View</a>
                            <a href="{{ route('teachers.edit', $teacher->id) }}">Edit</a>
                            <a href="{{ route('teachers.destroy', $teacher->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
