<?php

namespace App\Http\Controllers;

use App\Models\addCollege;
use App\Models\addSpecialty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use function GuzzleHttp\Promise\all;

class AddSpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.addSpecialty.index', [
           'addSpecialty' => addSpecialty::orderBy('id','desc')->get(),
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
        return view('admin.addSpecialty.create', [
           'addCollege' => addCollege::orderBy('id','desc')->get(),
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
           'image' =>'required|mimes:png,jpg',
           'alt'=>'required|min:3|max:881',
           'name' =>'required|min:3|max:40',
           'slug' =>'required',
           'url' =>'required|url',
           'add_college_id' =>'required',
           'about' =>'required|min:72|max:881',
           'keywords'=>'required|min:3|max:881',
        ]);
        //
        $fileExtension = $request->image->getClientOriginalExtension();
        $fileName = time() .'.' . $fileExtension;
        $path ='images/addSpecialty/';
        $request->image->move($path, $fileName);
        //
        $request['slug'] = Str::slug($request->name);
        //
        //dd($request->all());
        addSpecialty::create([
            'image'=>$fileName,
            'alt'=>$request->alt,
            'name'=>$request->name,
            'slug'=>$request->slug,
            'type'=>$request->type,
            'url'=>$request->url,
            'add_college_id'=>$request->add_college_id,
            'about'=>$request->about	,
            'keywords'=>$request->keywords,
        ]);
        //
        return redirect()->route('admin.addSpecialty')->with('success','تم إضافة تخصص بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\addSpecialty  $addSpecialty
     * @return \Illuminate\Http\Response
     */
    public function show(addSpecialty $addSpecialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\addSpecialty  $addSpecialty
     * @return \Illuminate\Http\Response
     */
    public function edit(addSpecialty $addSpecialty)
    {
        //
        return view('admin.addSpecialty.edit', [
           'addSpecialty' => $addSpecialty,
           'addCollege' => addCollege::orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\addSpecialty  $addSpecialty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, addSpecialty $addSpecialty)
    {
        //
        $request->validate([
            'alt' =>'required|min:3|max:881',
            'name' =>'required|min:3|max:40',
            'slug' =>'required',
           'url' =>'required|url',
           'add_college_id' =>'required',
           'about' =>'required|min:72|max:881',
           'keywords' =>'required|min:3|max:881',
        ]);
        //
        $request['slug'] = Str::slug($request->name);
        //
        $addSpecialty->update($request->except('image'));
        //
        if ($request->hasFile('image')) {
            //
            $fileExtension = $request->image->getClientOriginalExtension();
            $fileName = time() .'.' . $fileExtension;
            $path ='images/addSpecialty/';
            $request->image->move($path, $fileName);
            //
            if (File::exists(public_path('images/addSpecialty/' . $addSpecialty->image))) {
                File::delete(public_path('images/addSpecialty/' . $addSpecialty->image));
            }
            //
            $addSpecialty->update(['image' => $fileName]);
        }

        //
        return redirect()->route('admin.addSpecialty')->with('success','تم تعديل معلومات تخصص بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\addSpecialty  $addSpecialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(addSpecialty $addSpecialty)
    {
        //
        $addSpecialty->delete();
        //
        return redirect()->route('admin.addSpecialty')->with('success','تم حذف معلومات تخصص بنجاح');

    }
}
