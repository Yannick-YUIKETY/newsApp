<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\NewsStandardController;

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

Route::get('/', function () {
    return view('welcome');
});


/***********Affichage des news pour le client  */

Route::get('/newsstandard',[NewsStandardController::class , 'index'])->name('news.standard');
Route::get('/newsstandard/{actu}',[NewsStandardController::class , 'detail'])->name('news.standard.detail');


/*********** FIN Affichage des news pour le client  */


Route::get('/secure', function () {
    return view('secure');
})->middleware(['auth']); // sécurisé la route secure via le middleware 'auth'

Route::get('/notsecure', function () {
    return view('notsecure');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () { // sécurise un groupe d'info
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*Route sécurisée pour la gestion des News */

Route::middleware(['auth'])->group(function () {

   Route::get('admin/news/add', [AdminNewsController::class , 'formAdd'])->name('news.add');//get affiche les infos
   Route::post('admin/news/add', [AdminNewsController::class , 'add'])->name('news.add');//post pour receptionner les infos

   Route::get('admin/news/edit/{id}', [AdminNewsController::class , 'formEdit'])->name('news.edit'); //envoyer les données sur le formulaire
   Route::post('admin/news/edit/{id}', [AdminNewsController::class , 'edit'])->name('news.edit');//routes pour editer


   Route::get('admin/news/liste', [AdminNewsController::class , 'index'])->name('news.liste');
   Route::get('admin/news/delete/{id}', [AdminNewsController::class , 'delete'])->name('news.delete');


});

Route::get('/news',[NewsController::class , 'index']) ;
Route::get('/news/{id}',[NewsController::class , 'detail'])->name('news.detail');





require __DIR__.'/auth.php';
