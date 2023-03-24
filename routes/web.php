<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacilitieController;
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
// Route::get('/facilities', function () {
//     return view('facilities');
// })->name('facilities');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/rooms', function () {
    return view('rooms');
})->name('rooms');

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