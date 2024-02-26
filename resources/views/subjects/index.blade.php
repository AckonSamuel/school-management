@extends('home.app')

@section('content')
    <div class="py-6">
        <h1 class="text-2xl font-bold mb-4">Subjects List</h1>

        <a href="{{ route('subjects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 mb-4 inline-block">Create New Subject</a>

        @if ($subjects->isEmpty())
            <p>No Subject available</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border rounded-lg shadow overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">subject Name</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Assigned Teachers Count</th>
                            <th class="px-4 py-2">Assigned Students Count</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($subjects as $subject)
                            <tr>
                                <td class="border px-4 py-2">{{ $subject->id }}</td>
                                <td class="border px-4 py-2">{{ $subject->name }}</td>
                                <td class="border px-4 py-2">{{ $subject->description }}</td>
                                <td class="border px-4 py-2">{{ $subject->teachers ? $subject->teachers->count() : 0 }}</td>
                                <td class="border px-4 py-2">{{ $subject->students ? $subject->students->count() : 0 }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('subjects.show', $subject->id) }}" class="text-blue-600 hover:underline mr-2">View</a>
                                    <a href="{{ route('subjects.update', $subject->id) }}" class="text-green-600 hover:underline mr-2">Edit</a>
                                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" class="inline">
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