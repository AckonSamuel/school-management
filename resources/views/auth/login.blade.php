<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h2>Login</h2>

@if ($error ?? false)
        <p style="color: red;">{{ $error }}</p>
    @endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>
    
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    
    <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="{{ route('sign_up') }}">Sign Up</a></p>
</body>
</html>