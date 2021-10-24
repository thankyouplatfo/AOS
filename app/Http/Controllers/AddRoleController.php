<?php

namespace App\Http\Controllers;

use App\Models\addRole;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AddRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.helpForms.addRole.index',[
            'addRoles' => addRole::orderBy('id','desc')->get(),
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
        return view('admin.helpForms.addRole.create');
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
            'name' => 'required|min:3|max:40|unique:add_roles,name',
            'slug' => 'required',
        ]);
        //
        $request['slug'] = Str::slug($request->name);
        //
        addRole::create($request->all());
        //
        return redirect()->route('admin.helpForms.addRole')->with('success','تم إضافة دور بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\addRole  $addRole
     * @return \Illuminate\Http\Response
     */
    public function show(addRole $addRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\addRole  $addRole
     * @return \Illuminate\Http\Response
     */
    public function edit(addRole $addRole)
    {
        //
        return view('admin.helpForms.addRole.edit',[
            'addRole' => $addRole,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\addRole  $addRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, addRole $addRole)
    {
        //
        //
        $request->validate([
            'name' => 'required|min:3|max:40',
            'slug' => 'required',
        ]);
        //
        $request['slug'] = Str::slug($request->name);
        //
        $addRole->update($request->all());
        //
        return redirect()->route('admin.helpForms.addRole')->with('success','تم تعديل دور بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\addRole  $addRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(addRole $addRole)
    {
        //
        $addRole->delete();
        //
        return redirect()->route('admin.helpForms.addRole')->with('success','تم حذف دور بنجاح');
    }
}
