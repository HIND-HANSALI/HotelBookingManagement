<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
// use App\Http\Controllers\Auth\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservationdetail;
use App\Http\Requests\StoreReservationdetailRequest;
use App\Http\Requests\UpdateReservationdetailRequest;

class ReservationdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationdetailRequest $request)
    {
        // dd("hii");
        // insert into booking user_id room_id chech_in checkout
        // insert into booking details booking_id room_name price totalpayment 
        // $data=$request->All();

        // Insert data into the reservations table
    $reservation = new Reservation;
    $reservation->checkIn = $request->input('checkIn');
    $reservation->checkOut = $request->input('checkOut');
    // $reservation->statutBooking = "pending";
    // $reservation->arrival = 0;
    // $reservation->refund = null;
    $reservation->chambre_id = $request->input('chambre_id');
    $reservation->user_id = Auth::id();
    $reservation->save();

    // Insert data into the reservationdetails table
    $reservationdetail = new Reservationdetail;
    $reservationdetail->roomName = $request->input('roomName');
    $reservationdetail->userName = $request->input('userName');
    $reservationdetail->phoneNum = $request->input('phoneNum');
    $reservationdetail->address = $request->input('address');
    // $reservationdetail->roomnum = $request->input('roomnum');
    $reservationdetail->price = $request->input('price');
    // $reservationdetail->total_payement = 0.0;
    $reservationdetail->total_payement = $request->input('total_payement');
    $reservationdetail->numberPerson = $request->input('numberPerson');
    // $reservationdetail->reservation_id = $reservation->id;
    $reservationdetail->reservation_id = $reservation->id;

    $reservationdetail->save();

    return redirect()->route('reservationdetails.index')
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
