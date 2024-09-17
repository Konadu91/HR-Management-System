<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Login Page</title>
</head>
<body>
   
    <form class="container" action="{{route('auth.login')}}" method="POST">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
        <a href="{{route('auth.getForgotPasswordPage')}}" class="btn btn-danger">Forgot Password</a>
        @csrf
    </form>
</body>
</html>
