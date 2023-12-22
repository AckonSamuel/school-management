@extends('home.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Oops!</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li><span class="block sm:inline">{{ $error }}</span></li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    <form action="{{ route('assign.teacher.subject') }}" method="POST">
        @csrf
        <label for="teacher_id" class="block mb-2">Select Teacher:</label>
        <select name="teacher_id" id="teacher_id" class="border rounded-md px-4 py-2 mb-4 w-full">
            @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->last_name }}</option>
            @endforeach
        </select>

        <label for="subject_id" class="block mb-2">Select Subject:</label>
        <select name="subject_id" id="subject_id" class="border rounded-md px-4 py-2 mb-4 w-full">
            @foreach($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Assign Teacher to Subject
        </button>
    </form>
</div>
@endsection
