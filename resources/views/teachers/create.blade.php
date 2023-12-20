@extends('layouts.app')

@section('content')
    <h1>Create Teacher</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required><br><br>

        <!-- Add other fields for teacher creation -->

        <button type="submit">Create Teacher</button>
    </form>
@endsection
