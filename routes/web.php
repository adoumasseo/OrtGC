<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\DepartementController;
use App\Models\Departement;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\BanqueController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\UeController;
use App\Http\Controllers\UfrController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EcueController;
use App\Http\Controllers\FiliereController;

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
        "departements" => DepartementController::class,
        "classes" => ClasseController::class,
        "ues" => UeController::class,
        "enseignants" => EnseignantController::class,
        "cycles" => CycleController::class,
        "ecues" => EcueController::class,
        "filieres" => FiliereController::class
    ]);


    Route::controller(AjaxController::class)->group(function () {
        Route::post('/delete-banques', 'deleteBanques')->name('delete-banques');
        Route::post('/delete-ues', 'deleteUes')->name('delete-ues');
        Route::post('/delete-enseignants', 'deleteEnseignants')->name('delete-enseignants');
        Route::post('/delete-cycles', 'deleteCycles')->name('delete-cycles');
        Route::post('/delete-ecues', 'deleteEcues')->name('delete-ecues');
    });
        Route::resources([
                "banques" => BanqueController::class,
                "contrats" => ContratController::class,
                "ufrs" => UfrController::class,
                "enseignants" => EnseignantController::class,
                "cycles" => CycleController::class,
        ]);


        Route::controller(AjaxController::class)->group(function () {
                Route::post('/delete-banques', 'deleteBanques')->name('delete-banques');
                Route::post('/delete-ufrs', 'deleteUfrs')->name('delete-ufrs');
                Route::post('/delete-enseignants', 'deleteEnseignants')->name('delete-enseignants');
                Route::post('/delete-cycles', 'deleteCycles')->name('delete-cycles');
            Route::post('/delete-filieres', 'deleteFilieres')->name('delete-filieres');
    });
});
