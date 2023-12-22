@extends('home.app')

@section('content')
    <div class="py-6">
        <h1 class="text-2xl font-bold mb-4">subject Details</h1>

        <div class="mt-2 mb-4 flex justify-between">
            <a href="{{ route('subjects.index') }}" class="flex items-center text-black ml-4 hover:underline">
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Return
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden max-w-md mx-auto p-6">
            <table class="w-full">
                <tbody>
                    <tr>
                        <td class="font-semibold">ID:</td>
                        <td>{{ $subject->id }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">subject Name:</td>
                        <td>{{ $subject->class_name }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Description:</td>
                        <td>{{ $subject->description }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Students Count:</td>
                        <td>{{ $subject->students ? $subject->students->count() : 0 }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Assigned Teacher:</td>
                        <td>{{ $subject->teacher ? $subject->teacher->first_name . ' ' . $subject->teacher->last_name : 'Not Assigned' }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('subjects.edit', $subject->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 mr-2">Edit</a>
                <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection