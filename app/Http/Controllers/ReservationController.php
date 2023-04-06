<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Chambre;
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
    public function searchRoom(Request $request)
{
    $rooms = null;

    if($request->filled(['checkIn', 'checkOut', 'numberPerson'])) {
        $checkIn = Carbon::parse($request->input('checkIn'));
        $checkOut = Carbon::parse($request->input('checkOut'));
        $numberPerson = $request->input('numberPerson');

        $rooms = Chambre::where('numberBed', '>=', $numberPerson)
            ->whereDoesntHave('reservations', function ($query) use ($checkIn, $checkOut) {
                $query->where(function ($query) use ($checkIn, $checkOut) {
                    $query->where('checkIn', '>=', $checkIn)
                          ->where('checkOut', '<=', $checkOut);
                })->orWhere(function ($query) use ($checkIn, $checkOut) {
                    $query->where('checkIn', '<=', $checkIn)
                          ->where('checkOut', '>', $checkIn);
                })->orWhere(function ($query) use ($checkIn, $checkOut) {
                    $query->where('checkIn', '<', $checkOut)
                          ->where('checkOut', '>=', $checkOut);
                });
            })
            ->get();
    }

    return view('welcome', compact('rooms'));
}


    // public function searchRoom(Request $request)
    // {
    //     $rooms = null;
    //     if($request->filled(['checkIn', 'checkOut', 'numberPerson'])) {
    //         $times = [
    //             Carbon::parse($request->input('checkIn')),
    //             Carbon::parse($request->input('checkOut')),
    //         ];

    //         $rooms = Room::where('numberPerson', '>=', $request->input('numberPerson'))
    //             ->whereDoesntHave('events', function ($query) use ($times) {
    //                 $query->whereBetween('checkIn', $times)
    //                     ->orWhereBetween('checkOut', $times)
    //                     ->orWhere(function ($query) use ($times) {
    //                         $query->where('checkIn', '<', $times[0])
    //                             ->where('checkOut', '>', $times[1]);
    //                     });
    //             })
    //             ->get();
    //     }

    //     return view('welcome', compact('rooms'));
    // }

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
    //    dd('hiii');
        $data=$request->only(['checkIn','checkOut','typeBooking','totalPrice','numberPerson','chambre_id','user_id']);
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
