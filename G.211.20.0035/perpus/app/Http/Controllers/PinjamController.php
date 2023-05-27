<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku_m;
use App\Models\Anggota_m;
use App\Models\Pinjam_m;

class PinjamController extends Controller
{
    function index(Buku_m $buku, Anggota_m $anggota)
    {
        $data = [
            'optanggota' => $anggota->opt_anggota(),
            'optbuku' => $buku->opt_buku()
        ];
        return view('pinjam.add', $data);
    }

    public function save (Pinjam_m $pinjam, Request $request)
    {
        $validated = $request->validate([
            'ID_Anggota' => 'required',
            'ID_Buku' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
        ]);

        $data['ID_Anggota'] = $request->input('ID_Anggota');
        $data['ID_Buku']    = $request->input('ID_Buku');
        $data['tgl_pinjam'] = $request->input('tgl_pinjam');
        $data['tgl_kembali']= $request->input('tgl_kembali');

        if($pinjam->insert_record($data));
            return redirect('pinjam');
    }
}