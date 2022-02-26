<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ManagerAuthController;
use App\Http\Controllers\ReceptionistAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangerController;
use App\Http\Controllers\ReceptionestController;
// use App\Http\Controllers\LoginController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\UserReservationController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\RoomController;



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
Route::get('/main', function(){
    return view('main');
});


// //LOg in
// Route::get('/admin-login', [LoginController::class,'admin']);
// Route::get('/manager-login', [LoginController::class,'manager']);
// Route::get('/receptionest-login', [LoginController::class,'receptionest']);
// Route::get('/guest-login', [LoginController::class,'guest']);


//Manager
Route::get('/data-manger', [MangerController::class,'getManagerData'])->name('ManagerData');
Route::get('/mang-manger', [MangerController::class,'manage'])->name('manage.manager');

Route::get('/add-manager', [MangerController::class,'add']);
Route::post('/store-manager', [MangerController::class,'store']);

Route::get('/del-manager/{id}', [MangerController::class,'delete']);
Route::get('/show-manager/{id}', [MangerController::class,'show']);

Route::get('/edit-manager/{id}', [MangerController::class,'update']);
Route::post('/save-manager', [MangerController::class,'save']);

//Receptionist
Route::get('/data-receptionest', [ReceptionestController::class,'getReceptionestData'])->name('ReceptionestData');
Route::get('/mang-receptionest', [ReceptionestController::class,'manage']);

Route::get('/add-receptionest', [ReceptionestController::class,'add']);
Route::post('/store-receptionest', [ReceptionestController::class,'store']);

Route::get('/edit-receptionest/{id}', [ReceptionestController::class,'update']);
Route::post('/save-receptionest', [ReceptionestController::class,'save']);

Route::get('/del-receptionest/{id}', [ReceptionestController::class,'delete']);
Route::get('/show-receptionest/{id}', [ReceptionestController::class,'show']);

Route::get('/ban-receptionest/{id}', [ReceptionestController::class,'ban']);


//user
Route::get('/data-user', [UserController::class,'getUserData'])->name('UserData');
Route::get('/mang-user', [UserController::class,'manage']);
Route::get('/accept/{id}', [UserController::class,'accept']);

//Room
Route::get('/show-rooms', [UserReservationController::class,'getRooms'])->name('room.all');
Route::get('reservations/rooms/{roomId}', [UserReservationController::class,'showOneRoom'])->name('room.oneRoom');
Route::post('reservations/rooms/check/{roomId}', 
[UserReservationController::class,'checkNumberWithRoomCapacity'])->name('room.check');

//show reservation 
Route::get('reservations/{user_id}', [UserReservationController::class,'getAllReservations'])->name('user.reservation');

//Floor
Route::get('/data-floor', [FloorController::class,'getFloorData'])->name('FloorData');
Route::get('/mang-floor', [FloorController::class,'manage']);

Route::get('/add-floor', [FloorController::class,'add']);
Route::post('/store-floor', [FloorController::class,'store']);


//STRIPE
Route::get('payment', [UserReservationController::class,'index']);
Route::post('stripe', [UserReservationController::class,'paymentWithStripe'])->name('stripe');


Route::get('/edit-floor/{id}', [FloorController::class,'update']);
Route::post('/save-floor', [FloorController::class,'save']);

Route::get('/del-floor/{id}', [FloorController::class,'delete']);

//Room Admin Side
Route::get('/data-room', [RoomController::class,'getRoomData'])->name('RoomData');
Route::get('/mang-room', [RoomController::class,'manage']);

Route::get('/add-room', [RoomController::class,'add']);
Route::post('/store-room', [RoomController::class,'store']);

Route::get('/edit-room/{id}', [RoomController::class,'update']);
Route::post('/save-room', [RoomController::class,'save']);

Route::get('/del-room/{id}', [RoomController::class,'delete']);


// Receptionist See Hos Approved Clients
Route::get('client', [ReceptionestController::class,'index'])->name('client.data');
Route::get('data-client', [ReceptionestController::class,'clientData'])->name('ClientData');



