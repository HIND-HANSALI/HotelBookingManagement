<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $contacts=Contact::paginate(10); ['contacts'=>$contacts])
        return view('dashboard.all-contacts');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $data = $request->All();
        // $contact = Contact::create($data);
        // return redirect()->back()->with('success', 'Contact created successfully!');
        // dd($data);
        Mail::send('email-page', $data, function($message) use ($data) {
            $message->to($data['email'])
            ->subject($data['subject']);
          });
        return back()->with(['message' => 'Email successfully sent!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        // $contact=Contact::findorfail($id);
        
        $contact->DELETE();

         return redirect()->back()->with('success','Contact deleted successfully!');
    }
}
