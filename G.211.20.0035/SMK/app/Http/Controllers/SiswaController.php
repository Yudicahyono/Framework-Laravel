<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa_m;

class SiswaController extends Controller
{
    var $data;

    public function __construct()
    {
        $this->data['opt_kelas'] = [
            '' => '-Pilih salah satu-',
            'X' => 'X',
            'XI' => 'XI',
            'XII' => 'XII',
        ];
        $this->data['opt_jurusan'] = [
            '' => '-Pilih salah satu-',
            'Jaringan Komputer' => 'Jaringan Komputer',
            'Multimedia' => 'Multimedia',
            'Teknik Sepeda Motor' => 'Teknik Sepeda Motor',
            'Teknik Listrik' => 'Teknik Listrik',
        ];
        $this->data['optjenis_kelamin'] = [
            '' => '-Pilih salah satu-',
            'Laki-laki' => 'Laki - Laki',
            'Perempuan' => 'Perempuan',
        ];
    }

    public function index(Siswa_m $siswa)
    {
        $data = [
            //'query' => $siswa->datasiswa(),
            'query' => $siswa->paginate(5),
            'optkelas' => $this->data['opt_kelas'],
            'optjurusan' => $this->data['opt_jurusan'],
            'optjeniskelamin' => $this->data['optjenis_kelamin']

        ];
        return view('siswa.tampil_siswa', $data);
    }

    public function add_new()
    {
        $data = [
            'is_update' => 0,
            'optkelas' => $this->data['opt_kelas'],
            'optjurusan' => $this->data['opt_jurusan'],
            'optjeniskelamin' => $this->data['optjenis_kelamin'],

        ];
        return view('siswa.tambah_siswa', $data);
    }

    public function save(Siswa_m $siswa, Request $request)
    {
        $validated = $request->validate([
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jenis_kelamin' => 'required',
            'Tanggal_lahir' => 'required',
            'Tempat_lahir' => 'required',
            'Jurusan' => 'required',
        ]);

        $data['Nama'] = $request->input('Nama');
        $data['Kelas']  = $request->input('Kelas');
        $data['Jenis_kelamin']  = $request->input('Jenis_kelamin');
        $data['Tanggal_lahir']  = $request->input('Tanggal_lahir');
        $data['Tempat_lahir']  = $request->input('Tempat_lahir');
        $data['Jurusan']  = $request->input('Jurusan');
        $data['Nis']  = $request->input('Nis');
        $is_update = $request->input('is_update');

        if ($is_update == 0) {
            if ($siswa->tambah_siswa($data));
            return redirect('siswa');
        } else {
            $id = $request->input('ID');
            if ($siswa->edit_siswa($data, $id));
            return redirect('siswa');
        }
    }

    public function edit($id, Siswa_m $siswa)
    {
        $data = [
            'query' => $siswa->datasiswa($id)->first(),
            'is_update' => 1,
            'optkelas' => $this->data['opt_kelas'],
            'optjurusan' => $this->data['opt_jurusan'],
            'optjeniskelamin' => $this->data['optjenis_kelamin']
        ];
        return view('siswa.edit_siswa', $data);
    }

    public function delete($id, Siswa_m $siswa)
    {
        if ($siswa->hapus_siswa($id))
            return redirect('siswa');
    }
}
