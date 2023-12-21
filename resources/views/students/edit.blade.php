@extends('home.app')

@section('content')
<div class="py-6">
    <h1 class="text-2xl font-bold mb-4">Edit Student</h1>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Oops! There were some errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

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

    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data"
        class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="{{ $student->first_name }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                maxlength="30">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="{{ $student->last_name }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                maxlength="30">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="student_num">Student Number:</label>
            <input type="text" id="student_num" name="student_num" value="{{ $student->student_num }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="class_name">Class Name:</label>
            @if ($student->classroom)
            <select id="class_name" name="class_name"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($classrooms as $classroom)
                <option value="{{ $classroom->id }}" {{ $student->classroom->id === $classroom->id ? 'selected' : '' }}>
                    {{ $classroom->class_name }}
                </option>
                @endforeach
            </select>
            @endif
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="parent_phone_number">Parent Contact:</label>
            <input type="text" id="parent_phone_number" name="parent_phone_number"
                value="{{ $student->parent_phone_number }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="birthday">Birth Date:</label>
            <input type="date" id="birthday" name="birthday" value="{{ $student->birthday }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Gender:</label>
            <select id="gender" name="gender"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="male" @if(old('gender')=='male' ) selected @endif>Male</option>
                <option value="female" @if(old('gender')=='female' ) selected @endif>Female</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ $student->address }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="enrollment_date">Enrollment Date:</label>
            <input type="date" id="enrollment_date" name="enrollment_date" value="{{ $student->enrollment_date }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="photo">Photo:</label>
            @if ($student->photo)
            <img src="{{ $student->photo }}" alt="Student's Photo" style="max-width: 300px;">
            @endif
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
        </div>
    </form>
</div>
@endsection