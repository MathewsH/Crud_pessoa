<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;

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

    return view('welcome');
})->name('welcome');

Route::get('/dados{email?}', function (Request $request) {
    $pessoasiD = $request->get('pessoasiD');
    $emailD = $request->get('emailD');
    $idadeD = $request->get('idadeD');
    $nomeD = $request->get('nomeD');
    $idD = $request->get('idD');
    
    return view('dados', ['pessoasiD'=> $pessoasiD,'emailD'=> $emailD,'idD'=> $idD ,'nomeD'=> $nomeD, 'idadeD'=> $idadeD]);
})->name('dados');

Route::post('/registro',[UsuarioController::class, 'register'])->name('register.user');


Route::post('/auth',[UsuarioController::class, 'autenticacao'])->name('autenticacao.user');
Route::put('/alterar/{id?}',[UsuarioController::class, 'alterar'])->name('alterar');

Route::get('/register', function () {
    return view('register');
})->name('register');