@extends('layouts.app')

@section('content')
    <h1>Edit Teacher</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $teacher->first_name) }}"  maxlength="30"><br>

        <label for="last_name">Last name:</label>
        <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $teacher->last_name) }}"  maxlength="30"><br>

        <label for="birthday">Birth Date:</label>
        <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $teacher->birthday) }}" ><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $teacher->email) }}" ><br>

        <label for="phone_number">Phone Number:</label>
        <input type="number" id="phone_number" name="phone_number" value="{{ old('phone_number', $teacher->phone_number) }}"  pattern="(0)[0-9]{9}"><br>

        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/jpeg, image/bmp, image/png" ><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ old('address', $teacher->address) }}" ><br>

        <button type="submit">Update</button>
    </form>
@endsection
