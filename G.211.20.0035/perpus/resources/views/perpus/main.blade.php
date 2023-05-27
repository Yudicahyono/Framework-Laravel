<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Perpustakaan</title>
</head>
<body>
    <h2>Aplikasi Perpustakaan FTIK USM</h2>
    <b>Pilih menu :</b>
    <ol>
        <li><a href="{{ url('buku') }}">Kelola data buku</a></li>
        <li><a href="{{ url('anggota') }}">Kelola data anggota</a></li>
        <li><a href="{{ url('pinjam') }}">Kelola Transaksi Pinjam</a></li>
    </ol>
    <a href="{{ url('logout') }}">Logout</a>
</body>
</html>