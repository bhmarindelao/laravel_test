<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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
    return view('auth.login');
});

//Ruta para acceder a los componentes de las películas
Route::resource('movie', MovieController::class);
Auth::routes();

Route::get('/home', [MovieController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [MovieController::class, 'index'])->name('home');
});
