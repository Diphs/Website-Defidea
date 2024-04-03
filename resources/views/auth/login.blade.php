<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/gambar/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
    <title>Login Admin</title>
</head>
<body>
    <div class="wrapper">
        <div class="form-wrapper sign-in">
        <form action="{{ url('/login') }}" method="post">
            @csrf
            <h2>Login</h2>
            <p>Sign in to continue</p>
            <div class="input-group">
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                <label for="email">Email</label>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" required>
                <label for="password">Password</label>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">Sign In</button>
        </form>
        </div>
    </div>
</body>
</html>
