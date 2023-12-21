@extends('home.app')

@section('content')
    <div class="py-6">
        <h1 class="text-2xl font-bold mb-4">Edit Teacher</h1>
        <div class="mt-2 mb-4 flex justify-between">
            <a href="{{ route('teachers.index', $teacher->id) }}" class="flex items-center text-black ml-4 hover:underline">
                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Return
                </a>
            </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="first_name" class="block text-gray-700 font-semibold mb-1">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $teacher->first_name) }}" maxlength="30" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-gray-700 font-semibold mb-1">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $teacher->last_name) }}" maxlength="30" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="birthday" class="block text-gray-700 font-semibold mb-1">Birth Date:</label>
                <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $teacher->birthday) }}" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-1">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $teacher->email) }}" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block text-gray-700 font-semibold mb-1">Phone Number:</label>
                <input type="tel" id="phone_number" name="phone_number" value="{{ old('phone_number', $teacher->phone_number) }}" pattern="(0)[0-9]{9}" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="photo" class="block text-gray-700 font-semibold mb-1">Photo:</label>
                <input type="file" id="photo" name="photo" accept="image/jpeg, image/bmp, image/png" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-semibold mb-1">Address:</label>
                <input type="text" id="address" name="address" value="{{ old('address', $teacher->address) }}" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 px-3 py-2">
            </div>

            
            <div class="mb-4 flex justify-between">
                <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Update</button>
            </div>
        </form>
    </div>
@endsection