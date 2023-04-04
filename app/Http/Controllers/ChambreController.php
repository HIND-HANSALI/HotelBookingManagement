<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Facilitie;
use App\Http\Requests\StoreChambreRequest;
use App\Http\Requests\UpdateChambreRequest;

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
        return view('rooms', ['rooms' => Chambre::paginate(10)]);
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
        $data = $request->only(['nameR', 'descriptionR', 'categorie_id', 'statutR', 'numberBed', 'priceR']);
        // $data['pictureR'] = $file_name;
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
    public function show()
    {
        return view('room-details');
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
        $photo = $request->file('pictureR');
        $file_name = rand() . '.' . $photo->getClientOriginalName();
        $photo->move(public_path('/assets/upload/rooms'), $file_name);
        $data = $request->only(['nameR', 'descriptionR', 'categorie_id', 'statutR', 'numberBed', 'priceR']);
        $data['pictureR'] = $file_name;
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
}
