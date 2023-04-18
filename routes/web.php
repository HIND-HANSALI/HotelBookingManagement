<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FacilitieController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\ChambreimageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReservationdetailController;
use App\Http\Controllers\PDFController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
    
Route::get('/redirect',[HomeController::class,'redirect']);
Route::middleware('admin')->get('/dashboard', [ReservationController::class,'dashboard'])->name('dashboard');

});


// Route::get('/redirect',[HomeController::class,'redirect']);

Route::get('/about', function () {
    return view('about');
})->name('about');


// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');

// Route::get('/roomsFront', function () {
//     return view('rooms');
// })->name('roomsFront');

Route::get('/activitiesFront', function () {
    return view('activities');
})->name('activitiesFront');

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->name('dashboard');

// Route::get('/facilitiesFront', function () {
//     return view('facilities');
// })->name('facilitiesFront');

Route::get('/facilitiesFront', [FacilitieController::class,'displayFacilities'])->name('facilitiesFront');

    // Route::view('/dashboard','dashboard.index');
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
    //here
    Route::post('/searchRoom',[ReservationController::class,'searchRoom'])->name('searchRoom');

    

   
    Route::post('/checkAvailability',[ReservationController::class,'checkAvailability'])->name('checkAvailability');

   

    // Route::get('/roomaddimage', [ChambreController::class,'createImage'])->name('roomImage');

    // Route::get('/roomdetails', [ChambreController::class,'show'])->name('roomdetails');
    Route::get('/confirmBooking/{id}', [ChambreController::class,'confirmBooking'])->name('confirmBooking');

    Route::get('/roomsFront', [ChambreController::class,'diplayRooms'])->name('roomsFront');
    Route::get('/', [ChambreController::class,'diplayRoomswelcome'])->name('roomsWelcome');

    // Route::get('/roomFacilities', [ChambreController::class,'facilities'])->name('roomfacilities');

    Route::resource('images', ChambreimageController::class)->only(['index','show','create','store','edit','update','destroy']);
    Route::get('/roomaddimage/{id}', [ChambreimageController::class,'createImage'])->name('roomImage');
    Route::get('/roomgetimage/{id}', [ChambreimageController::class,'getallImage'])->name('getImage');

    Route::post('/changeStatutRoom', [ChambreController::class,'changeStatutRoom']);


    Route::get('/booking', [ReservationController::class,'index'])->name('bookings');
    Route::resource('bookings', ReservationController::class)->only(['index','show','create','store','edit','update','destroy']);
    Route::get('/bookingadd', [ReservationController::class,'create'])->name('bookingadd');
    Route::get('/bookingedit/{id}', [ReservationController::class,'edit'])->name('bookingedit');

    


    Route::resource('detailsbook', ReservationdetailController::class)->only(['index','show','create','store','edit','update','destroy']);
    Route::get('/isAvailable', [ReservationController::class,'isAvailable'])->name('reservationisAvailable');
    Route::post('/changeStatutBooking', [ReservationController::class,'changeStatutBooking'])->name('changeStatutBooking');
    // Route::post('/updateStatut/{id}', [ReservationController::class,'updateStatut'])->name('updateStatut');

    Route::get('/cancelbooking/{bookingId}', [ReservationController::class,'cancelbooking']);

   

    
    

    // Route::get('/changeStatutBooking', [ReservationController::class,'changeStatutBooking'])->name('changeStatutBooking');
    Route::get('/historique-Bookings', [ReservationController::class,'historiqueBookings'])->name('historique-Bookings');



    Route::get('/responcebooking', function () {
    return view('responcebooking');
})->name('responcebooking');

// Route::get('/historique-Bookings', function () {
//     return view('historique-Bookings');
// })->name('historique-Bookings');
   
    // responcebooking
    // Route::post('/booking/check-availability/{checkin_val}/{checkout_val}', [ChambreController::class,''])->name('');




    Route::resource('users', AuthController::class)->only(['index','show','create','store','edit','update','destroy']);
    Route::post('/rooms/fetchFacilities', [ChambreController::class, 'fetchRoomfacilities']);

    // Route::get('/contactAdd', [ContactController::class,'create'])->name('contactAdd');
    Route::resource('contacts', ContactController::class);

    Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('generatePDF');