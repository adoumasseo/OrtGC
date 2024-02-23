<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BanqueController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ContratController;

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

Auth::routes();
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('dashboard');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resources([
        "banques" => BanqueController::class,
        "contrats" => ContratController::class,
    ]);


    Route::get('/generateWord', [ContratController::class, 'generateWord'])->name('generateWord');

    Route::controller(AjaxController::class)->group(function () {
        Route::post('/delete-banques', 'deleteBanques')->name('delete-banques');
    });
});
