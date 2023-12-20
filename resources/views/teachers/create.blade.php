@extends('home.app')

@section('content')
    <div class="py-6">
        <h1 class="text-2xl font-bold mb-4">Teachers List</h1>

        @if($teachers->isEmpty())
            <p>No teachers available</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border rounded-lg shadow overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Contact</th>
                            <th class="px-4 py-2">Address</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($teachers as $teacher)
                            <tr>
                                <td class="border px-4 py-2">{{ $teacher->id }}</td>
                                <td class="border px-4 py-2">{{ $teacher->first_name }}</td>
                                <td class="border px-4 py-2">{{ $teacher->email }}</td>
                                <td class="border px-4 py-2">{{ $teacher->phone_number }}</td>
                                <td class="border px-4 py-2">{{ $teacher->address }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('teachers.show', $teacher->id) }}" class="text-blue-600 hover:underline mr-2">View</a>
                                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="text-green-600 hover:underline mr-2">Edit</a>
                                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="inline">
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
