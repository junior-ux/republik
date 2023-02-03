<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VagaController;
use App\Http\Controllers\PessoaController;

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
    return view('index');
});

/*Route::get('/vagas', function () {
    return view('ver-mais-vagas');
});*/

/*Route::get('/pessoas', function () {
    return view('ver-mais-pessoas');
});*/
Route::get('/pessoas', [PessoaController::class, 'pessoas'])->name('pessoas');
Route::get('/vagas', [VagaController::class, 'vagas'])->name('vagas');

Route::post('/vaga', [VagaController::class, 'store']);
Route::post('/pessoa', [PessoaController::class, 'store']);

Route::get('/perfil', [VagaController::class, 'perfil'])->middleware('auth');
Route::delete('/vaga/{id}', [VagaController::class, 'destroy']);
Route::put('/update/{id}', [VagaController::class, 'update'])->middleware('auth');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
