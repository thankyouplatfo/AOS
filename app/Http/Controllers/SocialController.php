<?php

namespace App\Http\Controllers;

use App\Models\social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.cms.social.index', [
            'social' => social::orderBy('id', 'desc')->get(),
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
        return view('admin.cms.social.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Social $social)
    {
        //
        $request->validate([
            'url' => 'required|url',
            'title' => 'required|min:3|max:25',
            'icon' => 'required',
        ]);
        //
        $social->create($request->all());
        //
        return redirect()->route('admin.cms.social')->with('success', 'تمت إضافة وسيلة تواصل إجتماعي بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(social $social)
    {
        //
        return view('admin.cms.social.edit', [
            'social' => $social
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, social $social)
    {
        //
        $request->validate([
            'url' => 'required|url',
            'title' => 'required|min:3|max:25',
            'icon' => 'required',
        ]);
        //
        $social->update($request->all());
        //
        return redirect()->route('admin.cms.social')->with('success', 'تمت تحديث معلومات وسيلة تواصل إجتماعي بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(social $social)
    {
        //
        $social->delete();
        //
        return redirect()->route('admin.cms.social')->with('success', 'تمت حذف معلومات وسيلة تواصل إجتماعي بنجاح');
    }
}
