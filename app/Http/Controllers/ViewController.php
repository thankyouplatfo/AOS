<?php

namespace App\Http\Controllers;

use App\Models\addCollege;
use App\Models\addCountry;
use App\Models\CMSHomePage;
use App\Models\AddMember;
use App\Models\addSpecialty;
use App\Models\addUniversity;
use App\Models\contact;
use App\Models\social;
use App\Models\modal;
use App\Models\tfasol;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function home()
    {
        return view('welcome', [
            'CMSHomePage' => CMSHomePage::orderBy('id', 'desc')->paginate(1),
            'addMember' => addMember::orderBy('id', 'asc')->get(),
            'social' => social::orderBy('id', 'asc')->get(),
            'modal' => modal::orderBy('id', 'asc')->paginate(1),
            'universityInfo' => addUniversity::orderBy('id', 'desc')->get(),
            'tfasolInfo' => tfasol::orderBy('id', 'desc')->paginate(1),
        ]);
    }
    //
    public function our_team($slug)
    {
        # code...
        $addMember = addMember::where('slug', $slug)->firstOrFail();
        return view('our_team', [
            'addMember' => $addMember,
            'social' => social::orderBy('id', 'asc')->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contact $contact)
    {
        //
        return view('home', [
            'contact' => $contact
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|min:3|max:25',
            'email' => 'required|min:7|max:25',
            'subject' => 'required|min:3|max:72',
            'message' => 'required|min:25|max:881',
            'receiveReply' => 'required',
        ]);
        //
        contact::create($request->all());
        //
        return redirect()->route('home', '#contact')->with('success', 'تم إرسال رسالتك بنجاح');
    }
    //
    public function university($id)
    {
        //
        $universityInfo = addUniversity::where('id', $id)->firstOrFail();
        //
        $affiliateColleges = addCollege::where('add_universitie_id', $universityInfo->id)->latest()->get();
        //
        $otherUniversities = addUniversity::orderBy('id', 'desc')->get();
        //
        $social = social::orderBy('id', 'desc')->get();
        //
        return view('university', [
            'universityInfo' => $universityInfo,
            'affiliateColleges' => $affiliateColleges,
            'otherUniversities' => $otherUniversities,
            'social' => $social,
        ]);
    }
    //
    public function college($id)
    {
        //
        $collegeInfo = addcollege::where('id', $id)->firstOrFail();
        //
        $affiliateSpecialties = addSpecialty::where('add_college_id', $collegeInfo->id)->latest()->get();
        //
        $social = social::orderBy('id', 'desc')->get();
        //
        return view('college', [
            'collegeInfo' => $collegeInfo,
            'affiliateSpecialties' => $affiliateSpecialties,
            'social' => $social,
        ]);
    }
    //
    public function specialty($id)
    {
        //
        $specialtyInfo = addSpecialty::where('id', $id)->firstOrFail();
        //
        $social = social::orderBy('id', 'desc')->get();
        //
        return view('specialty', [
            'specialtyInfo' => $specialtyInfo,
            'social' => $social,
        ]);
    }
}
