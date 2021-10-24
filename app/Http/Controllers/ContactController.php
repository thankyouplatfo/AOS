<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\social;
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
        //
        return view('admin.cms.homePage.contact.index', [
            'contact' => contact::orderBy('id', 'desc')->get(),
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $id = contact::where('id', $id)->firstOrFail();
        return view('admin.cms.homePage.contact.show', [
            'contact' => $id,
            'social' => social::orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(contact $contact)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact $contact)
    {
        //
        $contact->delete();
        //
        return redirect()->route('admin.cms.homePage.contact')->with('success', 'تم حذف رسالة دعم بنجاح');
    }
}
