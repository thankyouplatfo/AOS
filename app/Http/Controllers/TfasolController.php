<?php

namespace App\Http\Controllers;

use App\Models\tfasol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TfasolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.cms.homePage.tfasol.index', [
            'tfasol' => tfasol::orderBy('id' , 'desc')->get(),
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
        return view('admin.cms.homePage.tfasol.create');
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
            'file' => 'required',
            'title' => 'required|min:3|max:881',
            'openClose'=>'required|integer',
        ]);
        //
        $fileExtension = $request->file->getClientOriginalExtension();
        $fileName = time() . '.' . $fileExtension;
        $path = 'file/tfasol/';
        $request->file->move($path, $fileName);
        //
        tfasol::create([
            'file' => $fileName,
            'title' => $request->title,
            'openClose' => $request->openClose,
        ]);
        //
        return redirect()->route('admin.cms.homePage.tfasol')->with('success', 'تم إضافة ملف تفاضل جديد بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tfasol  $tfasol
     * @return \Illuminate\Http\Response
     */
    public function show(tfasol $tfasol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tfasol  $tfasol
     * @return \Illuminate\Http\Response
     */
    public function edit(tfasol $tfasol)
    {
        //
        return view('admin.cms.homePage.tfasol.edit', ['tfasol' => $tfasol]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tfasol  $tfasol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tfasol $tfasol)
    {
        //
        $request->validate([
            'title' => 'required|min:3|max:881',
            'openClose'=>'required|integer',
        ]);
        //
        $tfasol->update($request->except('file'));
        //
        if ($request->hasFile('file')) {
            //
            $fileExtension = $request->file->getClientOriginalExtension();
            $fileName = time() . '.' . $fileExtension;
            $path = 'files/tfasol/';
            $request->file->move($path, $fileName);
            //
            if (File::exists(public_path('files/tfasol/' . $tfasol->file))) {
                File::delete(public_path('files/tfasol/' . $tfasol->file));
            }
            //
            $tfasol->update(['file' => $fileName]);
        }

        //
        return redirect()->route('admin.cms.homePage.tfasol')->with('success', 'تم تعديل معلومات ملف تفاضل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tfasol  $tfasol
     * @return \Illuminate\Http\Response
     */
    public function destroy(tfasol $tfasol)
    {
        //
        $tfasol->delete();
        //
        return redirect()->route('admin.cms.homePage.tfasol')->with('success', 'تم حذف معلومات ملف تفاضل بنجاح');

    }
}
