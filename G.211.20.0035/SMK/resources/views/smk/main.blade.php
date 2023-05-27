<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Data Siswa SMK</title>
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Pangkalan Data Siswa</h1>
    </header>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('siswa') }}">Data Siswa</a></li>
            <li><a href="{{ url('logout') }}">Logout</a></li>
        </ul>
    </nav>
    <div class="image-container">
        <img src="/images/cover.jpg">
    </div>
    <main>
        <div class="text-box">
            <p><b>Silahkan Klik Tombol Dibawah</b></p>
            <button><a href="{{ url('siswa') }}"><h3><b>Data Siswa</b></h3></a></button></h3>
        </div>
    </main>
    <footer>
        <p>Copyright 2022</p>
    </footer>
</body>

</html>