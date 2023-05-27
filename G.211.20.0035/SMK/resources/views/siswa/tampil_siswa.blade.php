<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Siswa</title>
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Pangkalan Data Siswa SMK NEGERI 2 PURWODADI</h1>
    </header>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('siswa') }}">Data Siswa</a></li>
            <li><a href="{{ url('logout') }}">Logout</a></li>
        </ul>
        
    </nav>
    <main>
        <table border='1'>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Jurusan</th>
                <th>Nis</th>
                <th>Aksi</th>
            </tr>
            @php
            $no = 0;
            @endphp

            @foreach ($query as $row )
            @php
            $no++;
            @endphp
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $row['Nama'] }}</td>
                <td>{{ $optkelas[$row['Kelas']] }}</td>
                <td>{{ $optjeniskelamin[$row['Jenis_kelamin']] }}</td>
                <td>{{ $row['Tanggal_lahir'] }}</td>
                <td>{{ $row['Tempat_lahir'] }}</td>
                <td>{{ $optjurusan[$row['Jurusan']] }}</td>
                <td>{{ $row['Nis'] }}</td>
                <td>
                    <button><a href={{ url('siswa/edit/'.$row['ID']) }}>Edit</a></button>
                    <button><a href={{ url('siswa/delete/'.$row['ID']) }} onclick="return confirm('Yakin?')">Delete</a></button>
                </td>
            </tr>
            @endforeach
        </table>
        <p>{{ $query->links('vendor.pagination.mypage') }} </p>
        <button><a href="{{ url('smk') }}">Kembali</a></button>
        <button><a href="{{ url('siswa/add') }}">Tambah siswa</a></button>
    </main>
    <div class="cover">
        <footer>
            <p>Copyright 2022</p>
        </footer>
    </div>
</body>

</html>