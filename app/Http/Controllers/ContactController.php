<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Services;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("contact")->with("succes", null);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'contactService' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $getPage = $request->page;
        $addContact = new Contact();
        $addContact->firstName = $request->firstName;
        $addContact->lastName = $request->lastName;
        $addContact->email = $request->email;
        $addContact->service_id = Services::where("name", $request->contactService)->first()->id;
        $addContact->subject = $request->subject;
        $addContact->message = $request->message;
        $addContact->save();
        $serviceData = Services::where('name', '=', $getPage)->first();
        if ($getPage == "contact"){
            return view("contact")->with("serviceData", $serviceData)->with("succes", "Het bericht is verstuurd");
        }else {
            return view("layouts.infoServiceLayout")->with("serviceData", $serviceData)->with("succes", "Het bericht is verstuurd");

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact $contact)
    {
        //
    }
}
