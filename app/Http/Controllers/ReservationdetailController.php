<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
// use App\Http\Controllers\Auth\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservationdetail;
use App\Models\Chambre;
use App\Http\Requests\StoreReservationdetailRequest;
use App\Http\Requests\UpdateReservationdetailRequest;

class ReservationdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chambre_id = request()->input('chambre_id');
        $availableBeds = Chambre::findOrFail($chambre_id)->numberBed;
        return view('confirm-booking', ['availableBeds' => $availableBeds]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationdetailRequest $request)
    {
   
    // Insert data into the reservations table
    $reservation = new Reservation;
    $reservation->checkIn = $request->input('checkIn');
    $reservation->checkOut = $request->input('checkOut');
    // $reservation->statutBooking = "pending";
    // $reservation->arrival = 0;
    // $reservation->refund = null;
    $reservation->chambre_id = $request->input('chambre_id');
    $reservation->user_id = Auth::id();
    

    // Check if the rerservation is available and update the booking status
    $bol = $reservation->isAvailable($reservation->checkIn, $reservation->checkOut, $reservation->chambre_id, $request->input('numberPerson'), $reservation->id);
    // dd($bol);
    if ($bol == 0) {
         // If the room is not available
    return back()->with('error','The Room is not available for the selected dates.');

    } else {
        $reservation->save();

    
    $chambre = Chambre::findOrFail($reservation->chambre_id);
    // $chambre->numberBed -= $request->input('numberPerson');
    if ($chambre->numberBed - $request->input('numberPerson') < 0) {
        // If it will be negative, set it to zero instead
        $chambre->numberBed = 0;
    } else {
        // If it won't be negative, subtract the number of beds
        $chambre->numberBed -= $request->input('numberPerson');
    }
    $chambre->save();

   

    // Insert data into the reservationdetails table
    $reservationdetail = new Reservationdetail;
    $reservationdetail->roomName = $request->input('roomName');
    $reservationdetail->userName = $request->input('userName');
    $reservationdetail->phoneNum = $request->input('phoneNum');
    $reservationdetail->address = $request->input('address');
    // $reservationdetail->roomnum = $request->input('roomnum');
    $reservationdetail->price = $request->input('price');
    $reservationdetail->total_payement = $request->input('total_payement');
    $reservationdetail->numberPerson = $request->input('numberPerson');
    $reservationdetail->reservation_id = $reservation->id;

        $reservation->statutBooking = "booked";
        $reservation->save();
        $reservationdetail->save();
       
    }

    return redirect()->route('responcebooking')
    ->with('success', 'Reservation details created successfully.');

    }
   

    /**
     * Display the specified resource.
     */
    public function show(Reservationdetail $reservationdetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservationdetail $reservationdetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationdetailRequest $request, Reservationdetail $reservationdetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservationdetail $reservationdetail)
    {
        //
    }
}
