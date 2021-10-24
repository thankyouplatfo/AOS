<?php

namespace App\Http\Controllers;

use App\Models\addCategoryTool;
use App\Models\addTool;
use Illuminate\Http\Request;

class AddToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.addTool.index', [
            'addTool' => addTool::orderBy('id', 'desc')->get(),
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
        return view('admin.addTool.create',[
            'addCategoryTool' => addCategoryTool::orderBy('id','desc')->get(),
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
            'name' => 'required|min:3|max:40|unique:add_tools,name',
            'url' => 'required',
            'about' => 'min:3|max:881',
            'add_category_tool_id'=>'required'
        ]);
        //
        addTool::create($request->all());
        //
        return redirect()->route('admin.addTool')->with('success', 'تم إضافة أداة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\addTool  $addTool
     * @return \Illuminate\Http\Response
     */
    public function show(addTool $addTool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\addTool  $addTool
     * @return \Illuminate\Http\Response
     */
    public function edit(addTool $addTool)
    {
        //
        return view('admin.addTool.edit', [
            'addTool' => $addTool,
            'addCategoryTool' => addCategoryTool::orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\addTool  $addTool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, addTool $addTool)
    {
        //
        $request->validate([
            'name' => 'required|min:3|max:40',
            'url' => 'required',
            'about' => 'required|min:3|max:881',
            'add_category_tool_id'=>'required'
        ]);
        //
        $addTool->update($request->all());
        //
        return redirect()->route('admin.addTool')->with('success', 'تم التعديل على معلومات أداة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\addTool  $addTool
     * @return \Illuminate\Http\Response
     */
    public function destroy(addTool $addTool)
    {
        //
        $addTool->delete();
        //
        return redirect()->route('admin.addTool')->with('success', 'تم حذف أداة بنجاح');
    }
}
