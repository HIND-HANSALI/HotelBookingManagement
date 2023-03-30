<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacilitieController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\ReservationController;
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
Route::get('/facilitiesFront', function () {
    return view('facilities');
})->name('facilitiesFront');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/roomsFront', function () {
    return view('rooms');
})->name('roomsFront');

Route::get('/activitiesFront', function () {
    return view('activities');
})->name('activitiesFront');

    Route::view('/dashboard','dashboard.index');
    // Route::view('/all-facilities','dashboard.all-facilities');
// Route::get('/facilities', function () {
//         return view('dashboard.all-facilities');
//     })->name('facilities');
    Route::get('/addfacilitie', function () {
        return view('dashboard.add-facilitie');
    })->name('addfacilitie');
    Route::get('/editfacilitie', function () {
        return view('dashboard.edit-facilitie');
    })->name('editfacilitie');

    Route::get('/facilities', [FacilitieController::class,'index'])->name('facilities');
    Route::resource('facilitiess', FacilitieController::class)->only(['index','show','create','store','edit','update','destroy']);
    // Route::get('facilitiess/{facilitiess}',[FacilitieController::class,'edit']);
    // Route::post('facilitiess', [FacilitieController::class, 'store'])->name('facilities.store');
    Route::get('/rooms', [ChambreController::class,'index'])->name('rooms');
    Route::resource('roomss', ChambreController::class)->only(['index','show','create','store','edit','update','destroy']);
    Route::get('/roomadd', [ChambreController::class,'create'])->name('roomadd');
    Route::get('/roomedit', [ChambreController::class,'edit'])->name('roomedit');
    Route::get('/roomaddimage', [ChambreController::class,'createImage'])->name('roomImage');
    Route::get('/roomdetails', [ChambreController::class,'show'])->name('roomdetails');

    Route::get('/booking', [ReservationController::class,'index'])->name('bookings');
    Route::resource('bookings', ReservationController::class)->only(['index','show','create','store','edit','update','destroy']);
    Route::get('/bookingadd', [ReservationController::class,'create'])->name('bookingadd');
    Route::get('/bookingedit/{id}', [ReservationController::class,'edit'])->name('bookingedit');