<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Http\Requests\StoreChambreRequest;
use App\Http\Requests\UpdateChambreRequest;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.all-rooms',['rooms'=>Chambre::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.add-room');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChambreRequest $request)
    {
        $photo = $request->file('pictureR');
        $file_name=rand() . '.' .$photo->getClientOriginalName();
        $photo->move(public_path('/assets/upload/rooms'),$file_name);
        $data=$request->only(['nameR','descriptionR','categorie_id','statutR','numberBed','priceR']);
        $data['pictureR'] = $file_name;
        Chambre::create($data);
        return redirect()->route('roomss.index')->with('success','Room created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chambre $chambre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chambre $chambre)
    {
        return view('dashboard.edit-room');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChambreRequest $request, Chambre $chambre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chambre $chambre)
    {
        //
    }
}
