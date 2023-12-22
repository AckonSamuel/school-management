@extends('home.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded px-8 py-6 mb-4">
        <h1 class="text-2xl font-bold mb-4">Create teacher</h1>

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
        
        <form action="https://dotnut-9337e56f7347.herokuapp.com/teachers/" method="POST">
            @csrf

            <table class="w-full">
                <tr>
                    <td class="py-2">
                        <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>
                    </td>
                    <td class="py-2">
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" maxlength="30"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </td>
                </tr>
                <tr>
                    <td class="py-2">
                        <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>
                    </td>
                    <td class="py-2">
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" maxlength="30"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </td>
                </tr>
                <tr>
</tr>

                <tr>
                    <td class="py-2">
                        <label for="birthday" class="block text-gray-700 text-sm font-bold mb-2">Birth Date:</label>
                    </td>
                    <td class="py-2">
                        <input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </td>
                </tr>
                <tr>
                    <td class="py-2">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    </td>
                    <td class="py-2">
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </td>
                </tr>
                <tr>
                    <td class="py-2">
                        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address:</label>
                    </td>
                    <td class="py-2">
                        <input type="text" id="address" name="address" value="{{ old('address') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </td>
                </tr>
                <tr>
                    <td class="py-2">
                        <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">Phone Number:</label>
                    </td>
                    <td class="py-2">
                        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </td>
                </tr>
                <td class="py-2">
        <label for="teacher_num" class="block text-gray-700 text-sm font-bold mb-2">Teacher Number:</label>
    </td>
    <td class="py-2">
        <input type="text" id="teacher_num" name="teacher_num" value="{{ old('teacher_num') }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

        @error('teacher_num')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </td>
                <tr>
                    <td class="py-2">
                        <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Gender:</label>
                    </td>
                    <td class="py-2">
                    <select id="gender" name="gender" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <option value="male" @if(old('gender') == 'male') selected @endif>Male</option>
        <option value="female" @if(old('gender') == 'female') selected @endif>Female</option>
    </select></td>
                </tr>
            </table>

            <div class="mt-6">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create teacher</button>
            </div>
        </form>
    </div>
@endsection
