<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Facilitie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreChambreRequest;
use App\Http\Requests\UpdateChambreRequest;

use App\Models\ReviewRating;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.all-rooms', ['rooms' => Chambre::paginate(10)]);
    }

    // public function facilities(){
    //     return view('dashboard.add-room',['facilities'=>Facilitie::All()]);
    // }
    //diplay Rooms in Room page
    public function diplayRooms()
    {
        // Chambre::paginate(10)
        $rooms = Chambre::with(['facilities', 'chambreimages'])->paginate(10);
        return view('rooms', ['rooms' =>$rooms ]);
    }

    //diplay Rooms in Welcome page
    public function diplayRoomswelcome()
    {
        $rooms = Chambre::with(['facilities', 'chambreimages'])->paginate(3);
        return view('welcome', ['rooms' => $rooms]);
    }

    // dd($request);
        // $fac_count=0;
        // $roomFacilities = Chambre::with(['facilities'])->get();

        // if(in_array($roomFacilities->id,$request->facilities)){
        //     $fac_count++; 
        // }
        // if(count($request->facilities)!=$fac_count){
        //     continue;
        // }
        // // $facilities = $request->input('facilities');
        // // Do something with the facilities list
        // $response = "Rooms updated!";
        // return response()->json($response);



     

    public function fetchRoomfacilities(Request $request)
    {
        
        $matching_rooms = [];
        $fac_count = 0;
        $roomFacilities = Chambre::with(['facilities','chambreimages'])->get();
        foreach ($roomFacilities as $room) {
            $room_fac_count = 0;
            
                    foreach ($request->facilities as $fac) {

                        // Check if the room has this facility
                        if ($room->facilities->contains('id', $fac)) {
                            // If it does, increment the count of matching facilities for this room
                            $room_fac_count++;
                        }
                    }

                    // If the room has all the requested facilities, increment the count of matching rooms
                    if ($room_fac_count == count($request->facilities)) {
                        // $fac_count++;
                        $matching_rooms[] = $room;
                    }
                }

              

                // If there are rooms with all the requested facilities, return a success message
               
                return response()->json($matching_rooms);
     }
                
            

    public function confirmBooking($id){
        $user = Auth::user(); // Retrieve the authenticated user
        // $chambre=Chambre::findorfail($id);
        $availableBeds = Chambre::findOrFail($id)->numberBed;
        $chambre = Chambre::with('chambreimages')->findOrFail($id);
        return view('confirm-booking',['room' => $chambre, 'user' => $user,'availableBeds' => $availableBeds]);
    }

   
     

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.add-room', ['facilities' => Facilitie::All()]);
    }
    // public function createImage()
    // {
    //     return view('dashboard.add-room-images');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChambreRequest $request)
    {
        // $photo = $request->file('pictureR');
        // $file_name = rand() . '.' . $photo->getClientOriginalName();
        // $photo->move(public_path('/assets/upload/rooms'), $file_name);
        $data = $request->only(['nameR', 'descriptionR', 'categorie_id', 'numberBed', 'priceR']);
        // $data['pictureR'] = $file_name;

        $data['numberBedOriginal'] = $data['numberBed'];
        $chambre = Chambre::create($data);
        // Store the selected facilities for the chambre
        

        $facilities = $request->input('facilities');
        if ($facilities) {
            foreach ($facilities as $facility_id) {
                $chambre->facilities()->attach($facility_id);
            }
        }
       

        return redirect()->route('roomss.index')->with('success', 'Room created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room = Chambre::with(['facilities', 'chambreimages','ReviewData'])->find($id);
        return view('room-details',['room'=>$room]); 
        // return view('room-details');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $chambre=Chambre::findorfail($id);
        return view('dashboard.edit-room',['room'=>$chambre,'facilities' => Facilitie::All()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChambreRequest $request, int $id)
    {
        $chambre=Chambre::findorfail($id);
        // dd($request->All());
        // $photo = $request->file('pictureR');
        // $file_name = rand() . '.' . $photo->getClientOriginalName();
        // $photo->move(public_path('/assets/upload/rooms'), $file_name);
        $data = $request->only(['nameR', 'descriptionR', 'categorie_id', 'numberBed', 'priceR']);
        // $data['pictureR'] = $file_name;
        $chambre ->update($data);
        // $chambre->facilities()->detach();
        
        // Store the selected facilities for the chambre
        
        $facilities = $request->input('facilities');
        if ($facilities) {
            foreach ($facilities as $facility_id) {
                $chambre->facilities()->sync([$facility_id => ['chambre_id' => $chambre->id]]);
                // $chambre->facilities()->attach($facility_id, ['chambre_id' => $chambre->id]);
            }
        }
       

        return redirect()->route('roomss.index')->with('success', 'Room created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $chambre=Chambre::findorfail($id);
        
        $chambre->DELETE();

         return redirect()->back()->with('success','Room deleted successfully!');
    }


    public function changeStatutRoom(Request $request){
        $id = $request->input('id');
        $statusRoom = $request->input('value');

        $room=Chambre::findorfail($id);
        $room->statutR = $statusRoom ;
        $room->save();
        return response()->json([
            'status' => $statusRoom
          ]);
    }




    public function reviewstore(Request $request){
        $review = new ReviewRating();
        $review->chambre_id = $request->chambre_id;
        $review->name    = $request->name;
        $review->email   = $request->email;
        $review->phone   = $request->phone;
        $review->comments= $request->comment;
        $review->star_rating = $request->rating;
        $review->save();
        return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
    }
}
