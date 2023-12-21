@extends('home.app')

@section('content')
<div class="py-6">
    <h1 class="text-2xl font-bold mb-4">Student Details</h1>

    <div class="mt-2 mb-4 flex justify-between">
        <a href="{{ route('students.index', $student->id) }}" class="flex items-center text-black ml-4 hover:underline">
            <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Return
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden max-w-md mx-auto p-6">
        <table class="w-full">
            <tbody>
                <tr>
                    <td class="font-semibold">First Name:</td>
                    <td>{{ $student->first_name }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Last Name:</td>
                    <td>{{ $student->last_name }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Student Number:</td>
                    <td>{{ $student->student_num }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Class Name:</td>
                    <td>
                        {{ $student->assignments->isNotEmpty() ? $student->assignments->first()->classroom->class_name : 'No Classroom
                        Assigned' }}
                    </td>
                </tr>
                <tr>
                    <td class="font-semibold">Parent Contact:</td>
                    <td>{{ $student->parent_phone_number }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Birthday:</td>
                    <td>{{ $student->birthday }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Gender:</td>
                    <td>{{ $student->gender }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Address:</td>
                    <td>{{ $student->address }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Enrollment Date:</td>
                    <td>{{ $student->enrollment_date }}</td>
                </tr>
            </tbody>
        </table>

        @if ($student->photo)
        <div class="mt-4">
            <p class="font-semibold">Photo:</p>
            <img src="{{ $student->photo }}" alt="Student's Photo" class="mt-2 rounded-lg" style="max-width: 300px;">
        </div>
        @endif

        <div class="mt-6 flex justify-end">
            <a href="{{ route('students.edit', $student->id) }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 mr-2">Edit</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')"
                    class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection