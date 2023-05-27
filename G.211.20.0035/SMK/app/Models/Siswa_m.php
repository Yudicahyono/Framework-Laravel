<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa_m extends Model
{
    use HasFactory;
    
    protected $table = 'data_siswa';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    function datasiswa($criteria='')
    {
        $result = self::select('*')
            ->when($criteria, function ($query, $criteria){
                return $query->where('ID',$criteria);
            })
            ->get();
        return $result;
    }

    function tambah_siswa ($data)
    {
        $result = self::insert($data);
        return $result;
    }

    function edit_siswa ($data, $id)
    {
        $result = self::where('ID', $id)
                ->update($data);
        return $result;
    }

    function hapus_siswa($id)
    {
        $result = self::where('ID', $id)
                ->delete();
        return $result;
    }
}
