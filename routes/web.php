<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerUsers;
use App\Http\Controllers\ControllerMedecin;
use App\Http\Controllers\ControllerDaily;

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
    return view('index');
})->name('Home.index');

// show List Users
Route::get('/List-clients' , [ControllerUsers::class , 'index'])->name('List-clients.index');

// Create New Users

Route::post('/List-clients' , [ControllerUsers::class , 'store'])->name('List-clients.store');

Route::get('/list-clients/read' , [ControllerUsers::class , 'readData'])->name('list-client.read');

Route::get('/list-clients/{id}' , [ControllerUsers::class , 'show'])->name('list-clients.show');

Route::get('/List-clinets/search' , [ControllerUsers::class , 'search'])->name('List-clinets.search');

Route::post('/UpdateAdulte/{id}' , [ControllerUsers::class , 'updateAdulte'])->name('updateAdulte');

// delet users

Route::get('/deleUsers/{id}/{type}' , [ControllerUsers::class , 'destroy'])->name('destroy');

// ===========================================Medecin============================================

Route::get('/List-Medecin' , [ControllerMedecin::class , 'index'] )->name('List-Medecin.index');

Route::get('/List-Medecin/read' , [ControllerMedecin::class , 'read'] )->name('List-Medecin.read');

Route::get('/List-Medecin/search' , [ControllerMedecin::class , 'search'] )->name('List-Medecin.search');

Route::get('/List-Medecin/show/{id}' , [ControllerMedecin::class , 'show'] )->name('List-Medecin.show');

Route::post('/List-Medecin/update/{id}' , [ControllerMedecin::class , 'update'] )->name('List-Medecin.update');

Route::get('/List-Medecin/destroy/{id}' , [ControllerMedecin::class , 'destroy'] )->name('List-Medecin.destroy');

Route::post('/List-Medecin' , [ControllerMedecin::class , 'store'] )->name('List-Medecin.store');

// ================================================Daily==========================================

Route::get('/horaire' , [ControllerDaily::class , 'index'])->name('horaire.index');
Route::get('/horaire/search-user' , [ControllerDaily::class , 'searchUser'])->name('horaire.search-user');


