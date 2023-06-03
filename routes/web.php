<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerUsers;

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

