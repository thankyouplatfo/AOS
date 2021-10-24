<?php

namespace App\Http\Controllers;

use App\Models\addCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AddCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.helpForms.addCountry.index', [
            'addCountry' => addCountry::orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.helpForms.addCountry.create');
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
            'name' => 'required|min:3|max:40|unique:add_countries,name',
            'slug' => 'required',
        ]);
        //
        $request['slug'] = Str::slug($request->name);
        //
        addCountry::create($request->all());
        //
        return redirect()->route('admin.helpForms.addCountry')->with('success', 'تم إضافة دولة جديدة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\addCountry  $addCountry
     * @return \Illuminate\Http\Response
     */
    public function show(addCountry $addCountry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\addCountry  $addCountry
     * @return \Illuminate\Http\Response
     */
    public function edit(addCountry $addCountry)
    {
        //
        return view('admin.helpForms.addCountry.edit', [
            'addCountry' => $addCountry,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\addCountry  $addCountry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, addCountry $addCountry)
    {
        //
        $request->validate([
            'name' => 'required|min:3|max:40',
            'slug' => 'required',
        ]);
        //
        $request['slug'] = Str::slug($request->name);
        //
        $addCountry->update($request->all());
        //
        return redirect()->route('admin.helpForms.addCountry')->with('success', 'تم تعديل معلومات دولة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\addCountry  $addCountry
     * @return \Illuminate\Http\Response
     */
    public function destroy(addCountry $addCountry)
    {

        //
        $addCountry->delete();
        //
        return redirect()->route('admin.helpForms.addCountry')->with('success', 'تم حذف معلومات دولة بنجاح');
    }
}
