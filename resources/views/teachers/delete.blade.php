@extends('home.app')

@section('content')
    <div class="py-6">
        <h1 class="text-2xl font-bold mb-4">Delete Teacher</h1>

        <div class="bg-white rounded-lg shadow overflow-hidden max-w-md mx-auto p-6">
            <p class="text-lg">Are you sure you want to delete this teacher?</p>
            <table class="mt-4 w-full">
                <tbody>
                    <tr>
                        <td class="font-semibold">ID:</td>
                        <td>{{ $teacher->id }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold">Name:</td>
                        <td>{{ $teacher->first_name }}</td>
                    </tr>
                    <!-- Display other teacher details for confirmation -->
                </tbody>
            </table>

            <div class="mt-6 flex justify-end">
                <button onclick="toggleModal()" class="text-red-600 hover:underline">
                    Delete
                </button>
            </div>
        </div>

        <!-- Modal -->
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
