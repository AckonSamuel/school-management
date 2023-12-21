@extends('home.app')

@section('content')
    <div class="py-6">
        <h1 class="text-2xl font-bold mb-4">Classrooms List</h1>

        <a href="{{ route('classrooms.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 mb-4 inline-block">Create New Classroom</a>

        @if($classrooms->isEmpty())
            <p>No classrooms available</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border rounded-lg shadow overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Classroom Name</th>
                            <th class="px-4 py-2">Students Count</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Assigned Teacher</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($classrooms as $classroom)
                            <tr>
                                <td class="border px-4 py-2">{{ $classroom->id }}</td>
                                <td class="border px-4 py-2">{{ $classroom->class_name }}</td>
                                <td class="border px-4 py-2">{{ $classroom->students ? $classroom->students->count() : 0 }}</td>
                                <td class="border px-4 py-2">{{ $classroom->description }}</td>
                                <td class="border px-4 py-2">{{ $classroom->teacher->name ?? 'Not Assigned' }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('classrooms.show', $classroom->id) }}" class="text-blue-600 hover:underline mr-2">View</a>
                                    <a href="{{ route('classrooms.update', $classroom->id) }}" class="text-green-600 hover:underline mr-2">Edit</a>
                                    <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
