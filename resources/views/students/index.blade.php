@extends('home.app')

@section('content')
    <div class="py-6">
        <h1 class="text-2xl font-bold mb-4">Students List</h1>

        <a href="{{ route('students.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 mb-4 inline-block">Create New Student</a>

        @if($students->isEmpty())
            <p>No students available</p>
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
                        @foreach($students as $student)
                            <tr>
                                <td class="border px-4 py-2">{{ $student->id }}</td>
                                <td class="border px-4 py-2">{{ $student->first_name }}</td>
                                <td class="border px-4 py-2">{{ $student->email }}</td>
                                <td class="border px-4 py-2">{{ $student->phone_number }}</td>
                                <td class="border px-4 py-2">{{ $student->address }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('students.show', $student->id) }}" class="text-blue-600 hover:underline mr-2">View</a>
                                    <a href="{{ route('students.edit', $student->id) }}" class="text-green-600 hover:underline mr-2">Edit</a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
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