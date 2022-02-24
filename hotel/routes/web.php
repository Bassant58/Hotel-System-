<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangerController;
use App\Http\Controllers\ReceptionestController;
use App\Http\Controllers\LoginController;


// use Spatie\Permission\Models\Role;

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

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//LOg in
Route::get('/admin-login', [LoginController::class,'admin']);
Route::get('/manager-login', [LoginController::class,'manager']);
Route::get('/receptionest-login', [LoginController::class,'receptionest']);
Route::get('/guest-login', [LoginController::class,'guest']);


//Manager
Route::get('/mang-manger', [MangerController::class,'manage']);

Route::get('/add-manager', [MangerController::class,'add']);
Route::post('/store-manager', [MangerController::class,'store']);

Route::get('/del-manager/{id}', [MangerController::class,'delete']);
Route::get('/show-manager/{id}', [MangerController::class,'show']);

Route::get('/edit-manager/{id}', [MangerController::class,'update']);
Route::post('/save-manager', [MangerController::class,'save']);

//Receptionist
Route::get('/mang-receptionest', [ReceptionestController::class,'manage']);

Route::get('/add-receptionest', [ReceptionestController::class,'add']);
Route::post('/store-receptionest', [ReceptionestController::class,'store']);

Route::get('/edit-receptionest/{id}', [ReceptionestController::class,'update']);
Route::post('/save-receptionest', [ReceptionestController::class,'save']);

Route::get('/del-receptionest/{id}', [ReceptionestController::class,'delete']);
Route::get('/show-receptionest/{id}', [ReceptionestController::class,'show']);

//user
Route::get('/mang-user', [UserController::class,'manage']);