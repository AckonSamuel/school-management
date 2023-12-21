@extends('home.app')

@section('content')

<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden" id="overlay"></div>

<div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded-md shadow-md z-50 hidden" id="modal">
    <h2 class="text-2xl font-bold mb-4">Logout</h2>
    <p class="mb-6">Are you sure you want to logout?</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <input type="submit" value="Logout" class="bg-red-500 text-white px-4 py-2 rounded-md cursor-pointer hover:bg-red-600">
    </form>
    <button onclick="closeModal()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md cursor-pointer hover:bg-gray-400">Cancel</button>
</div>

<script>
    function openModal() {
        document.getElementById('overlay').classList.remove('hidden');
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('overlay').classList.add('hidden');
        document.getElementById('modal').classList.add('hidden');
    }

    openModal();
</script>
