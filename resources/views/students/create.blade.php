@extends('layouts.app')

@section('content')
    <h1>Create Student</h1>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" maxlength="30"><br>
        </div>

        <div>
            <label for="last_name">Last name:</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" maxlength="30"><br>
        </div>

        <div>
            <label for="student_num">Student Number:</label>
            <input type="text" id="student_num" name="student_num" value="{{ old('student_num') }}"><br>
        </div>

        <div>
            <label for="birthday">Birth Date:</label>
            <input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}"><br>
        </div>

        <div>
            <label for="enrollment_date">Enrollment date:</label>
            <input type="date" id="enrollment_date" name="enrollment_date" value="{{ old('enrollment_date') }}"><br>
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ old('Address') }}"><br>
        </div>
        <div>
            <label for="classroom_id">Class Name:</label>
            <select id="classroom_id" name="classroom_id">
                @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->class_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="parent_phone_number">Parent Phone Number:</label>
            <input type="text" id="parent_phone_number" name="parent_phone_number" value="{{ old('parent_phone_number') }}"><br>
        </div>

        <div>
            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" value="{{ old('gender') }}"><br>
        </div>

        <button type="submit">Create Student</button>
    </form>
@endsection
