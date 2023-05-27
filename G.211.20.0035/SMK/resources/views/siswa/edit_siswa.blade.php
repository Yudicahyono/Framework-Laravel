<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Siswa</title>
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Pangkalan Data Siswa SMK</h1>
    </header>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('siswa') }}">Data Siswa</a></li>
            <li><a href="{{ url('logout') }}">Logout</a></li>
        </ul>
        <div class="searchbar">
            <form>
                <input type="text" placeholder="Search">
                <button type="submit">Go</button>
            </form>
        </div>
    </nav>
    <main>
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-container ">
            <form action="{{ url('siswa/save') }}" method="post" accept-charset="utf-8">
                @csrf
                <input type="hidden" name="ID" value="{{ $query->ID }}" />
                <input type="hidden" name="is_update" value="{{ $is_update }}" />
                Nama : <input type="text" name="Nama" value="{{ $query->Nama }}" size='50' maxlength='150' />
                <br /><br />Kelas : <select name="Kelas">
                    @foreach ( $optkelas as $key => $value )
                    @if ($query->Kelas == $key)
                    <option value="{{ $key }}" selected>{{ $value }}</option>
                    @else
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endif
                    @endforeach
                </select>

                <br /><br />Jenis Kelamin : <select name="Jenis_kelamin">
                    @foreach ( $optjeniskelamin as $key => $value )
                    @if ($query->Jenis_kelamin == $key)
                    <option value="{{ $key }}" selected>{{ $value }}</option>
                    @else
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endif
                    @endforeach
                </select>
                <br /><br />Tanggal Lahir : <input type="date" name="Tanggal_lahir" value="{{ $query->Tanggal_lahir }}" />
                <br /><br />Tempat Lahir : <input type="text" name="Tempat_lahir" value="{{ $query->Tempat_lahir }}" size='50' maxlength='150' />

                <br /><br />Jurusan : <select name="Jurusan">
                    @foreach ( $optjurusan as $key => $value )
                    @if ($query->Jurusan == $key)
                    <option value="{{ $key }}" selected>{{ $value }}</option>
                    @else
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endif
                    @endforeach
                </select>
                <br /><br />Nis : <input type="number" name="Nis" value="{{ $query->Nis }}" size='50' maxlength='150' />
                <br /><br /><input type="submit" name="btn_simpan" value="Simpan" />
            </form>
        </div>
        <button><a href="{{ url('siswa') }}">Kembali</a></button>
    </main>
    <div class="cover">
        <footer>
            <p>Copyright 2022</p>
        </footer>
    </div>
</body>

</html>