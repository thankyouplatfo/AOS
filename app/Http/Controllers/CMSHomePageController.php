<?php

namespace App\Http\Controllers;

use App\Models\CMSHomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CMSHomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.cms.homePage.index', ['CMSHomePage' => CMSHomePage::orderBy('id', 'desc')->paginate(1)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.cms.homePage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CMSHomePage $CMSHomePage)
    {
        //
        $request->validate([
            'headerImage' => 'required|image',
            'altHeaderImage' => 'required|min:3|max:881',
            'about' => 'required|min:72|max:881',
            'keywords' => 'required|min:72|max:881',
            'address' => 'required|max:72',
            'tel' => 'required|max:25',
            'email' => 'required|max:25|email',
            'mapImage' => 'required|image',
            'altMapImage' => 'required|min:3|max:881',
            'whatsAppID' => 'required|min:30|max:100'
        ]);
        //
        $fileExtension = $request->headerImage->getClientOriginalExtension();
        $fileName = time() . '.' . $fileExtension;
        $path = 'images/headerImage';
        $request->headerImage->move($path, $fileName);
        //
        $fileExtensionmapImage = $request->mapImage->getClientOriginalExtension();
        $fileNamemapImage = time() . '.' . $fileExtensionmapImage;
        $path = 'images/mapImage';
        $request->mapImage->move($path, $fileNamemapImage);
        //
        $CMSHomePage->create([
            'headerImage' => $fileName,
            'altHeaderImage' => $request->altHeaderImage,
            'about' => $request->about,
            'keywords' => $request->keywords,
            'address' => $request->address,
            'tel' => $request->tel,
            'email' => $request->email,
            'mapImage' => $fileNamemapImage,
            'altMapImage' => $request->altMapImage,
            'whatsAppID' => $request->whatsAppID
        ]);
        //
        return redirect()->route('admin.cms.homePage')->with('success', 'تمت إدارة محتوى الصفحة الرئيسية بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CMSHomePage  $CMSHomePage
     * @return \Illuminate\Http\Response
     */
    public function show(CMSHomePage $CMSHomePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CMSHomePage  $CMSHomePage
     * @return \Illuminate\Http\Response
     */
    public function edit(CMSHomePage $CMSHomePage)
    {
        //
        return view('admin.cms.homePage.edit', [
            'CMSHomePage' => $CMSHomePage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CMSHomePage  $CMSHomePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CMSHomePage $CMSHomePage)
    {
        //
        $request->validate([
            'altHeaderImage' => 'required|min:3|max:881',
            'about' => 'required|min:72|max:881',
            'keywords' => 'required|min:72|max:881',
            'address' => 'required|max:72',
            'tel' => 'required|max:25',
            'email' => 'required|max:25|email',
            'altMapImage' => 'required|min:3|max:881',
            'whatsAppID' => 'required|min:30|max:100'
        ]);
        //
        $CMSHomePage->update($request->except('headerImage', 'mapImage', 'whatsAppID'));
        //
        if ($request->hasFile('headerImage') || $request->validate(['headerImage' => 'image'])) {
            # code...
            $fileExtension = $request->headerImage->getClientOriginalExtension();
            $fileName = time() . '.' . $fileExtension;
            $path = 'images/headerImage';
            $request->headerImage->move($path, $fileName);
            //
            if (File::exists(public_path('images/headerImage' . $CMSHomePage->headerImage))) {
                File::delete(public_path('images/headerImage' . $CMSHomePage->headerImage));
            }
            //
            $CMSHomePage->update(['headerImage' => $fileName]);
        }
        //
        if ($request->hasFile('mapImage') || $request->validate(['mapImage' => 'image'])) {
            # code...
            $fileExtensionmapImage = $request->mapImage->getClientOriginalExtension();
            $fileNamemapImage = time() . '.' . $fileExtensionmapImage;
            $path = 'images/mapImage';
            $request->mapImage->move($path, $fileNamemapImage);
            //
            if (File::exists(public_path('images/mapImage' . $CMSHomePage->mapImage))) {
                File::delete(public_path('images/mapImage' . $CMSHomePage->mapImage));
            }
            //
            $CMSHomePage->update(['mapImage' => $fileNamemapImage]);
        }
        //
        if (strlen($request['whatsAppID']) > 0) {
            $request->validate(['whatsAppID' => 'min:30|max:100']);
        }
        //
        return redirect()->route('admin.cms.homePage')->with('success', 'تم  تعديل محتوى الاجزاء الرئيسية في الصفحة الرئيسية بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CMSHomePage  $CMSHomePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CMSHomePage $CMSHomePage)
    {
        //
        $CMSHomePage->delete();
        //
        return redirect()->route('admin.cms.homePage')->with('success', 'تم حذف معلومات الاجزاء الرئيسية في الصفحة الرئيسية');
    }
}
