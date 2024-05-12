<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerUsers;
use App\Http\Controllers\ControllerMedecin;
use App\Http\Controllers\ControllerDaily;
use App\Http\Controllers\ControllerWolcomePage;

use App\Http\Controllers\ControllerSignIn;
use App\Http\Controllers\ControllerHome;


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


// ========================Landing==========================Page====================

Route::get('/' , function(){ return view('LandingPage.welcome'); } );

Route::post('/Comment' , [ControllerWolcomePage::class , 'store'] )->name(('Comment.store'));

Route::get('/showComment' , [ControllerWolcomePage::class , 'show'])->name('showComment.show');

Route::get('/SiteStats' , [ControllerWolcomePage::class , 'Stats'])->name('SiteStats.Stats');




Route::get('/dashboard',  [ControllerHome::class , 'index'] )->name('Home.index');
Route::get('/dashboard/calcUsers',  [ControllerHome::class , 'calcUsers'] )->name('Home.calcUsers');
Route::get('/dashboard/daily',  [ControllerHome::class , 'daily'] )->name('Home.daily');

// show List Users
Route::get('/List-clients' , [ControllerUsers::class , 'index'])->name('List-clients.index');

// Create New Users

Route::post('/List-clients' , [ControllerUsers::class , 'store'])->name('List-clients.store');

Route::get('/list-clients/read' , [ControllerUsers::class , 'readData'])->name('list-client.read');
 
Route::get('/list-clients/{id}' , [ControllerUsers::class , 'show'])->name('list-clients.show');

Route::get('/List-clinets/search' ,[ControllerUsers::class , 'search'])->name('List-clinets.search');

Route::get('/list-clinets/list-docter' ,[ControllerUsers::class , 'listDocter'])->name('List-clinets.listDocter');


Route::get('/Restart/{id}' , [ControllerUsers::class , 'Restart'])->name('Restart');

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

Route::post('/horaire' , [ControllerDaily::class , 'store'])->name('horaire.store');

Route::get('/horaire/show' , [ControllerDaily::class , 'show'])->name('horaire.show');

Route::get('/horaire/saerch' , [ControllerDaily::class , 'saerch'])->name('horaire.saerch');

Route::get('/horaire/single/{id}' , [ControllerDaily::class , 'single'])->name('horaire.single');

Route::get('/horaire/delete/{id}' , [ControllerDaily::class , 'delete'])->name('horaire.delete');

// =================================================================================================

Route::get('/connexion' , [ControllerSignIn::class , "index"])->name('connexion.index');

Route::post('/create-Account' , [ControllerSignIn::class , "forstTime"])->name('connexion.forstTime');

Route::post('/create-Account/new' , [ControllerSignIn::class , "newAccounr"])->name('createAccount.newAccounr');

