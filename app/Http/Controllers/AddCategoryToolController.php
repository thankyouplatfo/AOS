<?php

namespace App\Http\Controllers;

use App\Models\addCategoryTool;
use Illuminate\Http\Request;

class AddCategoryToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.helpForms.addCategoryTool.index',[
            'addCategoryTool' => addCategoryTool::orderBy('id','desc')->get(),
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
        return view('admin.helpForms.addCategoryTool.create');
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
            'name' => 'required|min:3|max:40|unique:add_category_tools,name',
            'slug' => 'required',
        ]);
        //
        addCategoryTool::create($request->all());
        //
        return redirect()->route('admin.helpForms.addCategoryTool')->with('success','تم إضافة فئة أدوات جديدة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\addCategoryTool  $addCategoryTool
     * @return \Illuminate\Http\Response
     */
    public function show(addCategoryTool $addCategoryTool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\addCategoryTool  $addCategoryTool
     * @return \Illuminate\Http\Response
     */
    public function edit(addCategoryTool $addCategoryTool)
    {
        //
        return view('admin.helpForms.addCategoryTool.edit',[
            'addCategoryTool' => $addCategoryTool,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\addCategoryTool  $addCategoryTool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, addCategoryTool $addCategoryTool)
    {
        //
         //
         $request->validate([
            'name' => 'required|min:3|max:40',
            'slug' => 'required',
        ]);
        //
        $addCategoryTool->update($request->all());
        //
        return redirect()->route('admin.helpForms.addCategoryTool')->with('success','تم تحرير فئة أدوات جديدة بنجاح');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\addCategoryTool  $addCategoryTool
     * @return \Illuminate\Http\Response
     */
    public function destroy(addCategoryTool $addCategoryTool)
    {
        //
        $addCategoryTool->delete();
        //
        return redirect()->route('admin.helpForms.addCategoryTool')->with('success','تم حذف فئة أدوات جديدة بنجاح');
    }
}
