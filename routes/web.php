<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RevistaController;
use App\Http\Controllers\ResetController;
use App\Http\Livewire\ShowArticle;
use App\Http\Middleware\Checkuser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::match(['get', 'post'], '/', [RevistaController::class, 'index'])
    ->name('inicio');

Route::match(['get', 'post'], '/cadastra', [RevistaController::class, 'cadastraPage'])
    ->name('pagina.cadastra');

Route::match(['get', 'post'], '/login', [RevistaController::class, 'logar'])
    ->name('login');

Route::match(['get', 'post'], '/servico/submeter', [RevistaController::class, 'submeter'])
    ->name('pagina.submeter');

Route::match(['get', 'post'], '/servico/publicar', [RevistaController::class, 'publicar'])
    ->name('pagina.publicar')->middleware(Checkuser::class);;

Route::match(['get', 'post'], '/servico/profil', [RevistaController::class, 'profiluser'])
    ->middleware('auth')->name('profil.user');

Route::match(['get', 'post'], '/servico/edit-user', [RevistaController::class, 'edituser'])
    ->name('edit.user');
    
Route::match(['get', 'post'], '/livewire/show-article', [ShowArticle::class, 'render']);


Route::match(['get', 'post'], '/cadastra/autor', [RevistaController::class, 'store'])
    ->name('store.user');

Route::match(['get', 'post'], '/usuario/logado', [RevistaController::class, 'makelogin'])
    ->name('logged');

Route::match(['get', 'post'], '/logout', [RevistaController::class, 'sair'])
    ->name('sair');

Route::match(['get', 'post'], '/submetendo', [RevistaController::class, 'storenrevista'])
    ->name('submetendo');

Route::match(['get', 'post'], '/publicando', [RevistaController::class, 'storesrevista'])
    ->name('publicando');


Route::match(['get', 'post'], '/servico/editado', [RevistaController::class, 'update'])
    ->name('update');


Route::match(['get', 'post'], '/search', [RevistaController::class, 'search'])
    ->name('search');


Route::match(['get', 'post'], 'resetauth/link', [ResetController::class, 'resetform'])
    ->name('reset.form')->middleware('guest');

Route::match(['get', 'post'], '/resetauth/link/post', [ResetController::class, 'submitlinkreset'])
    ->name('submit.reset.link')->middleware('guest');


Route::match(['get', 'post'], '/resetauth/reset/password/{token}', [ResetController::class, 'resetsenha'])
    ->name('reset.password')->middleware('guest');

Route::match(['get', 'post'], '/reseauth/password/reseted', [ResetController::class, 'submitREsetPassword'])
    ->name('password.reseted')->middleware('guest');


Route::match(['get', 'post'], '/revistas', [ResetController::class, 'viewRevista'])
    ->name('view.revista');






