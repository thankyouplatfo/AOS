<?php

namespace App\Http\Controllers;

use App\Models\modal;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.cms.homePage.modal.index', [
            'modal' => modal::orderBy('id', 'desc')->paginate(1),
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
        return view('admin.cms.homePage.modal.create', [
            'modal' => modal::class
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
            'openClose'=>'required|integer',
            'title'=>'required|min:3|max:72',
            'image'=>'required|image',
            'describe'=>'required|min:72|max:881',
            'startDate'=>'required',
            'expiryDate'=>'required',
        ]);
        //
        $fileExtension = $request->image->getClientOriginalExtension();
        $fileName = time() . '.' . $fileExtension;
        $path = 'images/modal';
        $request->image->move($path, $fileName);
        //
        dd($request->all());
        modal::create([
            'openClose'=>$request->openClose,
            'title' => $request->title,
            'image' => $fileName,
            'describe' => $request->describe,
            'startDate' => $request->startDate,
            'expiryDate' => $request->expiryDate,
        ]);
        //
        return redirect()->route('admin.cms.homePage.modal')->with('success', 'تم إضافة عرضك بنجاح ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function show(modal $modal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function edit(modal $modal)
    {
        //
        return view('admin.cms.homePage.modal.edit', [
            'modal' => $modal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, modal $modal)
    {
        //
        $request->validate([
            'openClose'=>'required|integer',
            'title'=>'required|min:3|max:72',
            'describe'=>'required|min:72|max:881',
            'startDate'=>'required',
            'expiryDate'=>'required',
        ]);
        //
        $modal->update($request->except('image'));
        //
        if ($request->hasFile('image')) {
            //
            $fileExtension = $request->image->getClientOriginalExtension();
            $fileName = time() . '.' . $fileExtension;
            $path = 'images/modal';
            $request->image->move($path, $fileName);
            //
            if (File::exists(public_path('images/modal/' . $modal->image))) {
                File::delete(public_path('images/modal/' . $modal->image));
            }
            //
            $modal->update(['image' => $fileName]);
        }
        //
        return redirect()->route('admin.cms.homePage.modal')->with('success', 'تم تحديث عرضك بنجاح ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function destroy(modal $modal)
    {
        //
        $modal->delete();
        //
        return redirect()->route('admin.cms.homePage.modal')->with('success', 'تم حذف عرضك بنجاح ');
    }
}
