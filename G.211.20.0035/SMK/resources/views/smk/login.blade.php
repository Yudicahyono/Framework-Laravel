<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Data Siswa SMK</title>
    <style type="text/css">
        /* Add some basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
        }

        .login-container {
            width: 400px;
            margin: 0 auto;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 30px;
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container label {
            display: block;
            margin-bottom: 10px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            height: 32px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
            padding: 8px;
        }

        .login-container input[type="submit"] {
            width: 100%;
            height: 32px;
            font-size: 16px;
            background-color: #0077c9;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .login-container input[type="submit"]:hover {
            background-color: #0066b3;
        }
    </style>
</head>
</head>

<body>
    <div class="login-container">
        <h1>Silahkan Login</h1>
        <form action="{{ url('/login') }}" method="post" accept-charset="utf-8">
            @csrf
            <label for="username">Username : </label>
            <input type="text" id="username" name="username" value="" size="20" /><br />
            <br /><label for="password">Password : </label>
            <input type="password" id="password" name="password" value="" size="20" /><br />
            <br /><input type="submit" name="btn_simpan" value="Login" />
        </form>
    </div>
</body>

</html>