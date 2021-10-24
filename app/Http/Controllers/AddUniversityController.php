<?php

namespace App\Http\Controllers;

use App\Models\addCity;
use App\Models\addCountry;
use App\Models\addUniversity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AddUniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.addUniversity.index', [
            'addUniversity' => addUniversity::orderBy('id', 'desc')->get(),
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
        return view('admin.addUniversity.create', [
            'addCountry' => addCountry::orderBy('id', 'desc')->get(),
            'addCity' => addCity::orderBy('id', 'desc')->get(),
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
            'name' => 'required|min:3|max:40|unique:add_universities,name',
            'slug' => 'required',
            'add_countrie_id' => 'required',
            'add_citie_id' => 'required',
            'type' => 'required',
            'internationalRanking' => 'required',
            'localRanking' => 'required',
            'url' => 'required|url',
            'about' => 'required',
            'keywords'=>'required|min:3|max:881'
        ]);
        //
        $fileExtension = $request->image->getClientOriginalExtension();
        $fileName = time() . '.' . $fileExtension;
        $path = 'images/addUniversity/';
        $request->image->move($path, $fileName);
        //
        $request['slug'] = Str::slug($request->name);
        //
        //dd($request->all());
        addUniversity::create([
            'image' => $fileName,
            'alt' => $request->alt,
            'name' => $request->name,
            'slug' => $request->slug,
            'add_countrie_id' => $request->add_countrie_id,
            'add_citie_id' => $request->add_citie_id,
            'type' => $request->type,
            'internationalRanking' => $request->internationalRanking,
            'localRanking' => $request->localRanking,
            'url' => $request->url,
            'about' => $request->about,
            'keywords' => $request->keywords,
        ]);
        //
        return redirect()->route('admin.addUniversity')->with('success', 'تم إضافة جامعة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\addUniversity  $addUniversity
     * @return \Illuminate\Http\Response
     */
    public function show(addUniversity $addUniversity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\addUniversity  $addUniversity
     * @return \Illuminate\Http\Response
     */
    public function edit(addUniversity $addUniversity)
    {
        //
        return view('admin.addUniversity.edit', [
            'addUniversity' => $addUniversity,
            'addCountry' => addCountry::orderBy('id', 'desc')->get(),
            'addCity' => addCity::orderBy('id', 'desc')->get(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\addUniversity  $addUniversity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, addUniversity $addUniversity)
    {
        //
        //
        $request->validate([
            'alt' => 'required|min:3|max:881',
            'name' => 'required|min:3|max:40',
            'slug' => 'required',
            'add_countrie_id' => 'required',
            'add_citie_id' => 'required',
            'type' => 'required',
            'internationalRanking' => 'required',
            'localRanking' => 'required',
            'url' => 'required|url',
            'about' => 'required',
            'keywords' => 'required|min:3|max:881',
        ]);
        //
        $request['slug'] = Str::slug($request->name);
        //
        $addUniversity->update($request->except('image'));
        //
        if ($request->hasFile('image')) {
            //
            $fileExtension = $request->image->getClientOriginalExtension();
            $fileName = time() . '.' . $fileExtension;
            $path = 'images/addUniversity/';
            $request->image->move($path, $fileName);
            //
            if (File::exists(public_path('images/addUniversity/' . $addUniversity->image))) {
                File::delete(public_path('images/addUniversity/' . $addUniversity->image));
            }
            //
            $addUniversity->update(['image' => $fileName]);
        }
        //
        return redirect()->route('admin.addUniversity')->with('success', 'تم تعديل معلومات جامعة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\addUniversity  $addUniversity
     * @return \Illuminate\Http\Response
     */
    public function destroy(addUniversity $addUniversity)
    {
        //
        $addUniversity->delete();
        //
        return redirect()->route('admin.addUniversity')->with('success', 'تم حذف معلومات جامعة بنجاح');
    }
}
