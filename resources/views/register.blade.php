<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 350px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            background-color: #fff;
        }

        .container img {
            width: 100px;
            margin-bottom: 20px;
        }

        .container h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .container label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #555;
        }

        .container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .container button {
            background-color: #2980b9;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .container button:hover {
            background-color: #1f6391;
        }

        .container p a {
            color: #2980b9;
            text-decoration: none;
        }

        .container p a:hover {
            text-decoration: underline;
        }

        .container .back-button {
            background-color: #ccc;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            display: block;
            text-decoration: none;
            text-align: center;
        }

        .container .back-button:hover {
            background-color: #b3b3b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Rental Mobil">
        <h2>Registrasi</h2>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="post">
            @csrf
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Registrasi</button>
        </form>
        <br>
        <p>Sudah punya akun? <a href="{{ url('login') }}">Login di sini</a></p>

        <a href="{{ url('login') }}" class="back-button">Kembali ke Halaman Awal</a>
    </div>
</body>

</html>
