@extends('layouts.app')

@section('content')
    <h1>Edit student</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
    <form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="{{ $student->first_name }}" maxlength="30"><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="{{ $student->last_name }}" maxlength="30"><br>

    <label for="student_num">Student Number:</label>
    <input type="text" id="student_num" name="student_num" value="{{ $student->student_num }}"><br>

    <label for="class_name">Class Name:</label>
    @if ($student->classroom)
        <input type="text" id="class_name" name="class_name" value="{{ $student->classroom->class_name }}" readonly><br>
    @endif
    
    <label for="parent_phone_number">Parent Contact:</label>
    <input type="text" id="parent_phone_number" name="parent_phone_number" value="{{ $student->parent_phone_number }}"><br>

    <label for="birthday">Birth Date:</label>
    <input type="date" id="birthday" name="birthday" value="{{ $student->birthday }}"><br>

    <label for="gender">Gender:</label>
    <input type="text" id="gender" name="gender" value="{{ $student->gender }}"><br>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" value="{{ $student->address }}"><br>

    <label for="entrollment_date">Enrollment Date:</label>
    <input type="date" id="entrollment_date" name="entrollment_date" value="{{ $student-> entrollment_date }}"><br>

    <label for="photo">Photo:</label>
    @if ($student->photo)
        <img src="{{ $student->photo }}" alt="student's Photo" style="max-width: 300px;"><br>
    @endif

    <button type="submit">Update</button>
</form>
