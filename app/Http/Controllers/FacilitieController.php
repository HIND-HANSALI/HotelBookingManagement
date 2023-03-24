<?php

namespace App\Http\Controllers;

use App\Models\Facilitie;
use App\Http\Requests\StoreFacilitieRequest;
use App\Http\Requests\UpdateFacilitieRequest;

class FacilitieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.all-facilities',['facilities'=>Facilitie::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.add-facilitie');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacilitieRequest $request)
    {
        
        $data=$request->only(['name','description']);
        
        Facilitie::create($data);
        return redirect()->route('facilitiess.index')->with('success','Facilitie created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Facilitie $facilitie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $facilitie=Facilitie::findorfail($id);//recuper le facility de bdd
        return view('dashboard.edit-facilitie',['facilitie'=>$facilitie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacilitieRequest $request, $id)
    {
       
        $validatedData = $request->validated();
       
        $facilitie=Facilitie::findorfail($id);
            $facilitie->update($validatedData);

       
        
        return redirect()->route('facilitiess.index')->with('success','Facilitie updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $facilitie=Facilitie::findorfail($id);
        dd('$facilitie');
        $facilitie->DELETE();

         return redirect()->back()->with('success','Facilitie deleted successfully!');
    }
}
