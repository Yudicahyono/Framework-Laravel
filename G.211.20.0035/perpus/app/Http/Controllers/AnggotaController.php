<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota_m;

class AnggotaController extends Controller
{
    var $data;

    public function __construct()
    {
        $this->data['opt_progdi'] = [
            '' =>'-Pilih salah satu-',
            'SI'=>'Sistem Informasi',
            'TI'=>'Teknik Informatika',
            'IK'=>'Ilmu Komunikasi',
        ];
    }

    public function index(Anggota_m $anggota)
    {
        $data = [
            //'query' => $anggota->get_records(),
            'query' => $anggota->paginate(5),
            'optprogdi' => $this->data['opt_progdi']
        ];
        return view('anggota.list', $data);
    }

    public function add_new()
    {
        $data = [
            'is_update' => 0,
            'optprogdi' => $this->data['opt_progdi']
        ];
        return view('anggota.add', $data);
    }

    public function save(anggota_m $anggota, Request $request)
    {
        $validated = $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Progdi' => 'required',
        ]);

        $data['Nim']     =$request->input('Nim');
        $data['Nama'] =$request->input('Nama');
        $data['Progdi']  =$request->input('Progdi');
        $is_update = $request->input('is_update');

        if($is_update==0)
        {
            if($anggota->insert_record($data));
                return redirect('anggota');
        }
        else
        {
            $id=$request->input('id');
            if($anggota->update_by_id($data,$id));
                return redirect('anggota');
        }
    }

    public function edit($id, anggota_m $anggota)
    {
        $data = [
            'query' => $anggota->get_records($id)->first(),
            'is_update' => 1,
            'optprogdi' => $this->data['opt_progdi']
        ];
        return view('anggota.edit', $data);
    }

    public function delete($id, anggota_m $anggota)
    {
        if($anggota->delete_by_id($id))
            return redirect('anggota');
    }
}