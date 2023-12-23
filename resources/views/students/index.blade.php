@extends('home.app')

@section('content')
    <div class="py-6">
        <h1 class="text-2xl font-bold mb-4">Students List</h1>

        <a href="{{ route('students.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 mb-4 inline-block">Create New Student</a>

        @if($students->isEmpty())
            <p>No students available</p>
        @else

        <a href="{{ route('assign.student.classroom.form') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Assign Student to Classroom
</a>
<a href="{{ route('assign.student.subject.form') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Assign Student to Subject
</a>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border rounded-lg shadow overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">First Name</th>
                            <th class="px-4 py-2">Last Name</th>
                            <th class="px-4 py-2">Assigned Class Count </th>
                            <th class="px-4 py-2">Parent Contact</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($students as $student)
                            <tr>
                                <td class="border px-4 py-2">{{ $student->id }}</td>
                                <td class="border px-4 py-2">{{ $student->first_name }}</td>
                                <td class="border px-4 py-2">{{ $student->last_name }}</td>
                                <td class="border px-4 py-2">{{ $student->classrooms ? $student->classrooms->count() : 0 }}</td>
                                <td class="border px-4 py-2">{{ $student->parent_phone_number }}</td>
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
