<?php

namespace App\Http\Controllers;

use App\Models\Chambreimage;
use App\Http\Requests\StoreChambreimageRequest;
use App\Http\Requests\UpdateChambreimageRequest;

class ChambreimageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $images=Chambreimage::groupBy('chambre_id')->get();
        // return view('dashboard.add-room-images',['images'=>$images]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.add-room-images');
    }

     public function createImage($id)
    {
        // $chambreimage=Chambreimage::findorfail($id);
        return view('dashboard.add-room-images',['id'=> $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChambreimageRequest $request )
    {
        $photo = $request->file('picture');
        $data['chambre_id'] = $request->input('chambre_id');
        $file_name = rand() . '.' . $photo->getClientOriginalName();
        $photo->move(public_path('/assets/upload/rooms'), $file_name);
        $data = $request->only([ 'chambre_id']);
        $data['picture'] = $file_name;
        Chambreimage::create($data);
        // $images=Chambreimage::groupBy('chambre_id')->get();
        // return view('dashboard.add-room-images',['images'=>$images]);
        return redirect()->back()->with('success', 'Room Picture created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chambreimage $chambreimage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd('hi');
        // dd($chambreimage=Chambreimage::findorfail($id));
        // return view('dashboard.add-room-images',['chambreimage'=>$chambreimage]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChambreimageRequest $request, Chambreimage $chambreimage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $image=Chambreimage::findorfail($id);
        
        $image->DELETE();

         return redirect()->back()->with('success','Room picture deleted successfully!');
    }
}
