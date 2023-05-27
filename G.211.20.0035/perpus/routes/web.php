<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('ftik');
    return redirect('perpus');
})->middleware('auth');

Route::get('/info', function () {
    return view('info',['progdi'=>'TI']);
});

use App\Http\Controllers\InfoController;
Route::get('/info/{kd}',[InfoController::class, 'infoMhs']);

Route::get('/buku', function () {
    return view('buku.add',[
        'is_update' => 0,
        'optkategori' => [
            '' =>'-Pilih salah satu -',
            'novel' => 'Novel',
            'komik' => 'Komik',
            'kamus' => 'Kamus',
            'program' => 'Pemrograman'
        ]
    ]);
});

use App\Http\Controllers\BukuController;
Route::get('/buku', [BukuController::class, 'index'])->middleware('auth');
Route::get('/buku/add', [BukuController::class, 'add_new']);
Route::post('/buku/save', [BukuController::class, 'save']);
Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
Route::get('/buku/delete/{id}', [BukuController::class, 'delete']);

use App\Http\Controllers\AnggotaController;
Route::get('/anggota', [AnggotaController::class, 'index'])->middleware('auth');
Route::get('/anggota/add', [AnggotaController::class, 'add_new']);
Route::post('/anggota/save', [AnggotaController::class, 'save']);
Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit']);
Route::get('/anggota/delete/{id}', [AnggotaController::class, 'delete']);

Route::get('/pinjam', function () {
    return view('pinjam.add',[
        'optanggota' => [
            '' =>'-Pilih salah satu-',
            '1' => "G.211.16.0111 - Andre",
            '2' => "G.211.16.0112 - Indra",
            '3' => "G.231.12.0125 - joni a",
        ],
        'optbuku' => [
            '' =>'-Pilih salah satu-',
            '1' => "Senja Kelabu 1 - Mutia 1",
            '2' => "Donald Bebek - disney",
            '5' => "UML - rosa",
        ],
    ]);
});



use App\Http\Controllers\PinjamController;
Route::get('/Pinjam', [PinjamController::class, 'index'])->middleware('auth');
Route::post('/pinjam/save', [PinjamController::class, 'save']);

Route::get('/perpus', function () {
    return view('perpus.main');
});

use App\Http\Controllers\PerpusController;
Route::get('/perpus', [PerpusController::class, 'index'])->middleware('auth');
/*
Route::get('/login', function() {
    return view('perpus.login');
});
*/
Route::get('/login', [PerpusController::class, 'login'])->name('login')
        ->middleware('guest');

use App\Http\Controllers\LoginController;
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);