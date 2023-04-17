<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Chambre;
use App\Models\Facilitie;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Reservationdetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('dashboard.all-booking',['bookings'=>Reservation::paginate(10)]);
        $bookings = Reservation::with('reservationdetails')->paginate(10);
        // dd($bookings);
        return view('dashboard.all-booking',['bookings'=>$bookings]);
    }

    public function historiqueBookings()
    {
        $user = auth()->user();
        // return view('dashboard.all-booking',['bookings'=>Reservation::paginate(10)]);
        $bookings = Reservation::with('reservationdetails')
                    ->where('user_id', $user->id)
        
                    ->paginate(10);
                    // dd($bookings);
        return view('historique-Bookings',['bookings'=>$bookings]);
    }

   
    public function dashboard(){
        // product::count()
        // $roomsReserved=Chambre::with('reservations')->get();
        // $countRoomsReserved =  $roomsReserved->count();
        $roomsReserved = Chambre::has('reservations')->get();
        $countRoomsReserved = $roomsReserved->count();
    
        $roomsNotReserved = Chambre::whereDoesntHave('reservations')->get();
        $countRoomsNotReserved =  $roomsNotReserved->count();
    
        $facilities=Facilitie::count();
        $rooms=Chambre::count();

        // Count clients
        $userClient = User::where('userType', 0)->count();
        // $users=User::count();
    
        return view('dashboard.index', compact('countRoomsReserved', 'countRoomsNotReserved', 'facilities', 'userClient','rooms'));
    }


    private function  getSpecificRooms($checkIn,$checkOut,$numberPerson){

        $rooms = Chambre::with('reservations')->get();
        $available_Rooms_Without_Resevation =[];
        $available_Rooms_With_reservation = [];
        foreach($rooms as $room){
            if(count($room->reservations)==0){
                array_push($available_Rooms_Without_Resevation,$room);
            }else{
                array_push($available_Rooms_With_reservation,$room);
            }
        }
        $reservations = Reservation::with('reservationdetails','chambre')
        ->get();
        $chambres_temp= [];
        $inrange_false = [];
        foreach($reservations as $reservation){
            if($reservation->checkOut<$checkIn ||$reservation->checkIn>$checkOut){
                echo "out of range";
            }elseif((($reservation->chambre->numberBedOriginal) - $reservation->reservationdetails->numberPerson) >=$numberPerson){
                if(!in_array($reservation->chambre,$chambres_temp) && !in_array($reservation->chambre,$inrange_false)){
                    echo "inrange true";
                    array_push($chambres_temp,$reservation->chambre);
                }else{
                    echo "inrange true but another is false ";
                }
            }
            else{
                echo "in range condition false";
                echo(count($chambres_temp));
                array_push($inrange_false,$reservation->chambre);
                $chambres_temp =  array_diff($chambres_temp, [$reservation->chambre]);
                echo(count($chambres_temp));
                echo '--------------------------------------- <br>';
               
            }
        }
        foreach($available_Rooms_With_reservation as $room){
            $in = false;
            foreach($room->reservations as $reservation){
                if($reservation->checkOut<$checkIn ||$reservation->checkIn>$checkOut){

                }else{
                    $in = true;
                }
            }
            if($in){
                $available_Rooms_With_reservation =  array_diff($available_Rooms_With_reservation, [$room]);
            }
        }
        $rooms = array_merge($available_Rooms_With_reservation, $chambres_temp);
        return $rooms;
    }

    public function checkAvailability(Request $request)
    {

        // Retrieve the available rooms based on the input parameters
        $checkIn = $request->input('checkIn');
        $checkOut = $request->input('checkOut');
        $numberPerson = $request->input('numberPerson');
        $rooms = $this->getSpecificRooms($checkIn,$checkOut,$numberPerson);

        // Pass the available rooms to the view
        return view('welcome', ["rooms"=>$rooms]);
        
        
            
    }

//     public function searchRoom(Request $request)
// {
//     $rooms = null;

//     if($request->filled(['checkIn', 'checkOut', 'numberPerson'])) {
//         $checkIn = Carbon::parse($request->input('checkIn'));
//         $checkOut = Carbon::parse($request->input('checkOut'));
//         $numberPerson = $request->input('numberPerson');

//         $rooms = Chambre::where('numberBed', '>=', $numberPerson)
//             ->whereDoesntHave('reservations', function ($query) use ($checkIn, $checkOut) {
//                 $query->where(function ($query) use ($checkIn, $checkOut) {
//                     $query->where('checkIn', '>=', $checkIn)
//                           ->where('checkOut', '<=', $checkOut);
//                 })->orWhere(function ($query) use ($checkIn, $checkOut) {
//                     $query->where('checkIn', '<=', $checkIn)
//                           ->where('checkOut', '>', $checkIn);
//                 })->orWhere(function ($query) use ($checkIn, $checkOut) {
//                     $query->where('checkIn', '<', $checkOut)
//                           ->where('checkOut', '>=', $checkOut);
//                 });
//             })
//             ->get();
//     }

//     return view('welcome', compact('rooms'));
// }

public function changeStatutBooking(Request $request){

       $validated= $request->validate([
            'Bookingid' => 'required|integer',
            'statut_ids'=>'required'
        ]);
        $id = $request->input('Bookingid');
        $statusIds = $request->input('statut_ids');
        // dd($id , $statusIds);
        $booking = Reservation::findOrFail($id);
        $booking->statutBooking = $statusIds;
        $booking->save();

    return redirect()->back()->with('success', 'statut Booking is changed!');
}



        public function updateStatut(Request $request,$id){
            
            
            $validated= $request->validate([
                'statutBooking'=>'required']);
                dd($id);
                // dd($request->all());
                // dd($validated);
              
            $reservation=Reservation::findorfail($id);

            // dd($reservation);
            
            $reservation->statutBooking='canceled';
             $reservation->save();

             return view('historique-Bookings')->with('success','Status Reservation updated successfully!');
        }

    public function cancelbooking( $bookingId){
        // dd($bookingId);
            try {
                // dd($request);
                // $booking_id = $request->input('id');

                
                $booking = Reservation::find($bookingId);
                
            $booking->statutBooking = 'canceled';
            
            DB::table('reservationdetails')
            ->where('id',$bookingId )
            ->update(['numberPerson' => 0]);
            // $booking->reservationdetails->numberPerson=0;
            $booking->save();

            return response()->json([
                'success' => true,
            ]);    
        } catch (Exception $th) {
            Log::error($th->getMessage());
        }        
    }
    // public function cancelbooking1($bookingId){
    //     return response()->json(['success' => $bookingId]);
    //     dd($bookingId);
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
        $data=$request->only(['checkIn','checkOut','chambre_id','user_id']);
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
        $booking=Reservation::findorfail($id);
        
        $reservationdetail = $booking->reservationdetails();
        
        $rooms = Chambre::all();
        return view('dashboard.edit-booking',compact('booking', 'reservationdetail', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, $id)
    {

        $validatedData = $request->validated();
       
        $reservation=Reservation::findorfail($id);
        
        $reservation->update($validatedData);

        $room = Chambre::find($request->input('chambre_id'));
        $new_room_name = $room->nameR;

        $reservationDetails = Reservationdetail::findOrFail($request->input('reservationdetail_id'));
        $reservationDetails->update([
            // 'phoneNum' => $request->input('phoneNum'),
            // 'address' => $request->input('address'),
            // 'price' => $request->input('price'),
            'numberPerson' => $request->input('numberPerson'),
            'total_payement' => $request->input('total_payement'),
            'chambre_id' => $request->input('chambre_id'), 
        ]);
    
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
