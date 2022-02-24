<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ManagerAuthController;
use App\Http\Controllers\ReceptionistAuthController;
use App\Http\Controllers\UserController;
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
})->name('dashboard');

//->middleware(['auth'])

//Login blades :::
Route::get('/admin-login', [AdminAuthController::class,'create'])->name('admin.login.blade');
Route::get('/manager-login', [ManagerAuthController::class,'create'])->name('manager.login.blade');
Route::get('/receptionist-login', [ReceptionistAuthController::class,'create'])->name('receptionist.login.blade');
//Route::get('/guest-login', [LoginController::class,'guest'])->name('guest.login.blade');

Route::post('/admin', [AdminAuthController::class,'login'])->name('admin.login');
Route::post('/manager', [ManagerAuthController::class,'login'])->name('manager.login');
Route::post('/receptionist', [ReceptionistAuthController::class,'login'])->name('receptionist.login');

//Logout Action For Each User:Guard
Route::post('/admin-logout', [AdminAuthController::class,'logout'])->name('admin.logout');
Route::post('/manager-logout', [ManagerAuthController::class,'logout'])->name('manager.logout');
Route::post('/receptionist-logout', [ReceptionistAuthController::class,'logout'])->name('receptionist.logout');


//Route::get('/All-dashboard' , function (){
//    return view('dashboard');
//    return 'Mayteen Om Hossam';
//})->name('dashboard');

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

require __DIR__.'/auth.php';
