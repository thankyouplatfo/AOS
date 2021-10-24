<?php

namespace App\Http\Controllers;

use App\Models\addCity;
use App\Models\addCollege;
use App\Models\addCountry;
use App\Models\addUniversity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AddCollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.addCollege.index', [
            'addCollege'  =>  addCollege::orderBy('id', 'desc')->get(),
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
        return view('admin.addCollege.create', [
            'addCollege'  =>  addCollege::orderBy('id', 'desc')->get(),
            'addCountry'  =>  addCountry::orderBy('id', 'desc')->get(),
            'addCity'  =>  addCity::orderBy('id', 'desc')->get(),
            'addUniversity' => addUniversity::orderBy('id', 'desc')->get(),
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
            'image' => 'required|mimes:png,jpg',
            'alt' => 'required|min:3|max:881',
            'name' => 'required|min:3|max:40',
            'slug' => 'required',
            'type' => 'required',
            'url' => 'required|url',
            'add_universitie_id' => 'required',
            'about' => 'required|min:3|max:881',
            'keywords' => 'required|min:3|max:881',
        ]);
        //
        $fileExtension = $request->image->getClientOriginalExtension();
        $fileName = time() . '.' . $fileExtension;
        $path = 'images/addCollege/';
        $request->image->move($path, $fileName);
        //
        $request['slug'] = Str::slug($request->name);
        //
        addCollege::create([
            'image' => $fileName,
            'alt' => $request->alt,
            'name' => $request->name,
            'slug' => $request->slug,
            'type' => $request->type,
            'url' => $request->url,
            'add_universitie_id' => $request->add_universitie_id,
            'about' => $request->about,
            'keywords' => $request->keywords,
        ]);
        //
        return redirect()->route('admin.addCollege')->with('success', 'تم إضافة كلية بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\addCollege  $addCollege
     * @return \Illuminate\Http\Response
     */
    public function show(addCollege $addCollege)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\addCollege  $addCollege
     * @return \Illuminate\Http\Response
     */
    public function edit(addCollege $addCollege)
    {
        //
        return view('admin.addCollege.edit', [
            'addCollege'  =>  $addCollege,
            'addCountry'  =>  addCountry::orderBy('id', 'desc')->get(),
            'addCity'  =>  addCity::orderBy('id', 'desc')->get(),
            'addUniversity' => addUniversity::orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\addCollege  $addCollege
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, addCollege $addCollege)
    {
        //
        $request->validate([
            'alt' => 'required|min:3|max:881',
            'name' => 'required|min:3|max:40|unique:add_colleges,name',
            'slug' => 'required',
            'type' => 'required',
            'url' => 'required|url',
            'add_universitie_id' => 'required',
            'about' => 'required|min:3|max:881',
            'keywords' => 'required|min:3|max:881',
        ]);
        //
        $request['slug'] = Str::slug($request->name);
        //
        $addCollege->update($request->except('image'));
        //
        if ($request->hasFile('image')) {
            //
            $fileExtension = $request->image->getClientOriginalExtension();
            $fileName = time() . '.' . $fileExtension;
            $path = 'images/addCollege/';
            $request->image->move($path, $fileName);
            //
            if (File::exists(public_path('images/addCollege/' . $addCollege->image))) {
                File::delete(public_path('images/addCollege/' . $addCollege->image));
            }
            //
            $addCollege->update(['image' => $fileName]);
        }
        //
        return redirect()->route('admin.addCollege')->with('success', 'تم تعديل معلومات كلية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\addCollege  $addCollege
     * @return \Illuminate\Http\Response
     */
    public function destroy(addCollege $addCollege)
    {
        //
        return $addCollege->delete();
        //
        return redirect()->route('admin.addCollege')->with('success', 'تم حذف معلومات كلية بنجاح');
    }
}
