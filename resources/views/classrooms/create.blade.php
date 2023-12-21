@extends('home.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-md rounded px-8 py-6 mb-4">
    <h1 class="text-2xl font-bold mb-4">Create Classroom</h1>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
        <strong class="font-bold">Oops! There were some errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('classrooms.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="class_name" class="block text-gray-700 text-sm font-bold mb-2">Classroom Name:</label>
            <input type="text" id="class_name" name="class_name" value="{{ old('class_name') }}" maxlength="30"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('class_name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Classroom Description:</label>
            <textarea id="description" name="description"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description') }}</textarea>
            @error('description')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create
                Classroom
            </button>
        </div>
    </form>
</div>
@endsection