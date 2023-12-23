<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-80">
        <h2 class="text-2xl font-bold mb-4">Sign Up</h2>

        @if(session('success'))
            <p class="mt-4 text-green-500">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <div class="mt-4">
                <ul class="list-disc list-inside text-red-500">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="signup-form" method="POST" action="{{ route('sign_up') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                <input type="password" id="password" name="password" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <p id="password-mismatch" class="text-red-500 text-xs italic hidden">Passwords do not match.</p>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sign Up</button>

            @if ($errors->has('verification'))
                <p class="mt-4 text-blue-500">{{ $errors->first('verification') }}</p>
            @endif
        </form>
        <p class="text-sm mt-4 text-gray-600">Already have an account? <a href="{{ route('auth.login') }}" class="text-blue-500">Login</a></p>
    </div>

    <script>
        const form = document.getElementById('signup-form');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');
        const passwordMismatch = document.getElementById('password-mismatch');

        form.addEventListener('submit', function(event) {
            if (password.value !== confirmPassword.value) {
                event.preventDefault(); // Prevent form submission
                passwordMismatch.classList.remove('hidden'); // Show the password mismatch message
            }
        });
    </script>
</body>
</html>
