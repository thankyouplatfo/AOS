<?php

namespace App\Http\Controllers;

use App\Models\addCity;
use App\Models\addCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AddCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.helpForms.addCity.index',[
            'addCitys' => addCity::orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.helpForms.addCity.create',[
            'addCountry' => addCountry::orderBy('id','desc')->get(),
            'addCity' => addCity::all(),
            
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
        $request->validate([
            'name' => 'required|min:3|max:40|unique:add_cities,name',
            'add_countrie_id' => 'required',
            'slug' => 'required'
        ]);
        //
        $request['slug'] = Str::slug($request->name);
        //
        addCity::create($request->all());
        //
        return redirect()->route('admin.helpForms.addCity')->with('success','تم إضافة مدينة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\addCity  $addCity
     * @return \Illuminate\Http\Response
     */
    public function show(addCity $addCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\addCity  $addCity
     * @return \Illuminate\Http\Response
     */
    public function edit(addCity $addCity)
    {
        return view('admin.helpForms.addCity.edit',[
            'addCountry' => addCountry::all(),
            'addCity' => $addCity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\addCity  $addCity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, addCity $addCity)
    {
        $request->validate([
            'name' => 'required|min:3|max:',
            'add_countrie_id' => 'required',
            'slug' => 'required'
        ]);
        //
        $request['slug'] = Str::slug($request->name);
        //
        $addCity->update($request->all());
        //
        return redirect()->route('admin.helpForms.addCity')->with('success','تم تعديل معلومات مدينة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\addCity  $addCity
     * @return \Illuminate\Http\Response
     */
    public function destroy(addCity $addCity)
    {
       $addCity->delete();
       //
       return redirect()->route('admin.helpForms.addCity')->with('success','تم حذف معلومات مدينة بنجاح');

    }
}
