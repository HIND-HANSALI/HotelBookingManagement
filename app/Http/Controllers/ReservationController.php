<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.all-booking',['bookings'=>Reservation::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.add-booking');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
       
        $data=$request->All();
        Reservation::create($data);
        return redirect()->route('bookings.index')->with('success','Booking created successfully!');

    }

    /**
     * Display the specified resource.
     */
   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reservation=Reservation::findorfail($id);
        return view('dashboard.edit-booking',['booking'=>$reservation]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, $id)
    {
        $validatedData = $request->validated();
       
        $reservation=Reservation::findorfail($id);
            $reservation->update($validatedData);

       
        
        return redirect()->route('bookings.index')->with('success','Reservation updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservation=Reservation::findorfail($id);
        
        $reservation->DELETE();

         return redirect()->back()->with('success','Booking deleted successfully!');
    }
}
