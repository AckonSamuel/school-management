@extends('home.app')

@section('content')
    <div class="py-6">
        <h1 class="text-2xl font-bold mb-4">Edit subject</h1>

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
            <a href="{{ route('subjects.index', $subject->id) }}" class="flex items-center text-black ml-4 hover:underline">
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Return
            </a>
        </div>

        <form action="{{ route('subjects.update', $subject->id) }}" method="POST" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Subject Name:</label>
            <input type="text" id="name" name="name" value="{{ $subject->name ?? old('name') }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   maxlength="255">
        </div>

        <div class="mb-4">
            <label for="subject_code" class="block text-gray-700 text-sm font-bold mb-2">Subject Code:</label>
            <input type="text" id="subject_code" name="subject_code" value="{{ $subject->subject_code ?? old('subject_code') }}" maxlength="6"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="semester" class="block text-gray-700 text-sm font-bold mb-2">Semester:</label>
            <input type="text" id="semester" name="semester" value="{{ $subject->semester ?? old('semester') }}" maxlength="255"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
            <textarea id="description" name="description" maxlength="255"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $subject->description ?? old('description') }}</textarea>
            @error('description')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update
            </button>
        </div>
    </form>
    </div>
@endsection