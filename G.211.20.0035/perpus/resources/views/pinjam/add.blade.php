<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pinjam Buku</title>
</head>
<body>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h2>Form Pinjam Buku</h2>
    <form action="{{ url('pinjam/save') }}" method="post" accept-charset="utf-8">
    @csrf
        Anggota : <select name="ID_Anggota">
            <option value="">-Pilih anggota</option>
        @foreach ($optanggota as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <br/><br/>Buku : <select name="ID_Buku">
            <option value="">-Pilih buku</option>
        @foreach ( $optbuku as $key => $value )
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
        </select>
        <br/><br/>Tgl.Pinjam : <input type="date" name="tgl_pinjam" value="" />
        <br/><br/>Tgl.Kembali : <input type="date" name="tgl_kembali" value="" />
        <br/><br/><input type="submit" name="btn_simpan" value="Simpan" />
        <input type="reset" name="btn_batal" value="Batal" />
    </form>
    <br/><a href="{{ url('perpus') }}">Kembali</a>
</body>
</html>