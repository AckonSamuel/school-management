@extends('home.app')

@section('content')
    <div class="py-6">
        <h1 class="text-2xl font-bold mb-4">Teacher Details</h1>

        <div class="mt-2 mb-4 flex justify-between">
            <a href="{{ route('teachers.index', $teacher->id) }}" class="flex items-center text-black ml-4 hover:underline">
                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Return
                </a>
            </div>

        <div class="bg-white rounded-lg shadow overflow-hidden max-w-md mx-auto p-6">
            <table class="w-full">
                <tbody>
                    <tr>
                        <td class="font-semibold">First Name:</td>
                        <td>{{ $teacher->first_name }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Last Name:</td>
                        <td>{{ $teacher->last_name }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Birthday:</td>
                        <td>{{ $teacher->birthday }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Email:</td>
                        <td>{{ $teacher->email }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Phone Number:</td>
                        <td>{{ $teacher->phone_number }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Address:</td>
                        <td>{{ $teacher->address }}</td>
                    </tr>
                </tbody>
            </table>

            @if ($teacher->photo)
                <div class="mt-4">
                    <p class="font-semibold">Photo:</p>
                    <img src="{{ $teacher->photo }}" alt="Teacher's Photo" class="mt-2 rounded-lg" style="max-width: 300px;">
                </div>
            @endif

            <div class="mt-6 flex justify-between">
                <a href="{{ route('teachers.edit', $teacher->id) }}" class="text-blue-600 hover:underline">
                    <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h8l2 2h4a2 2 0 012 2v8a2 2 0 01-2 2z"></path>
                    </svg>
                    Edit
                </a>

                <button onclick="toggleModal()" class="text-red-600 hover:underline flex items-center">
                    <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Delete
                </button>
            </div>
        </div>

        <!-- Modal for delete confirmation -->
        <div id="modal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg overflow-hidden max-w-md mx-auto p-6">
                <p class="text-lg">Are you sure you want to delete this teacher?</p>
                <div class="mt-6 flex justify-end">
                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Delete</button>
                    </form>
                    <button onclick="toggleModal()" class="bg-gray-200 text-gray-700 ml-4 px-4 py-2 rounded-lg hover:bg-gray-300">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleModal() {
            const modal = document.getElementById('modal');
            modal.classList.toggle('hidden');
        }
    </script>
@endsection
