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
    return redirect('smk');
})->middleware('auth');

Route::get('/smk', function () {
    return view('smk.main');
});

use App\Http\Controllers\SiswaController;
Route::get('/siswa', [SiswaController::class, 'index'])->middleware('auth');
Route::get('/siswa/add', [SiswaController::class, 'add_new']);
Route::post('/siswa/save', [SiswaController::class, 'save']);
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
Route::get('/siswa/delete/{id}', [SiswaController::class, 'delete']);

use App\Http\Controllers\IndexController;
Route::get('/smk', [IndexController::class, 'index'])->middleware('auth');
/*
Route::get('/login', function() {
    return view('smk.login');
});
*/
Route::get('/login', [IndexController::class, 'login'])->name('login')
        ->middleware('guest');

use App\Http\Controllers\LoginController;
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);