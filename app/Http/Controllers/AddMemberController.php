<?php

namespace App\Http\Controllers;

use App\Models\addMember;
use App\Models\addRole;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use function GuzzleHttp\Promise\all;

class AddMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.cms.homePage.addMember.index', [
           'addMember' => addMember::orderBy('id','asc')->get()
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
        return view('admin.cms.homePage.addMember.create',[
           'addRole' => addRole::orderBy('id','desc')->get(),
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
           'image' =>'required|image',
           'alt' =>'required|min:3|max:881',
           'name' =>'required|min:3|max:25|unique:add_members,name,add_member_id',
           'slug' =>'required',
           'about' =>'required|min:72|max:881',
           'keywords' =>'required|min:3|max:881',
           'email' =>'required|email',
           'tel' =>'required|min:7|max:25',
           'add_role_id' =>'required',
           'facebookAccount' =>'required|url',
           'twitterAccount' =>'required|url',
           'instagramAccount' =>'required|url',
        ]);
        //
        $fileExtension = $request->image->getClientOriginalExtension();
        $fileName = time() .'.' . $fileExtension;
        $path ='images/addMember/';
        $request->image->move($path, $fileName);
        //
        $request['slug'] = Str::slug($request->name);
        //
        addMember::create([
           'image' => $fileName,
           'alt' => $request->alt,
           'name' => $request->name,
           'slug' => $request->slug,
           'about' => $request->about,
           'keywords' => $request->keywords,
           'email' => $request->email,
           'tel' => $request->tel,
           'add_role_id' => $request->add_role_id,
           'facebookAccount' => $request->facebookAccount,
           'twitterAccount' => $request->twitterAccount,
           'instagramAccount' => $request->instagramAccount,
        ]);
        //
        return redirect()->route('admin.cms.homePage.addMember')->with('success','تم إضافة عضو جديد إلى فريقك');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\addMember  $addMember
     * @return \Illuminate\Http\Response
     */
    public function show(addMember $addMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\addMember  $addMember
     * @return \Illuminate\Http\Response
     */
    public function edit(addMember $addMember)
    {
        //
        return view('admin.cms.homePage.addMember.edit', [
           'addMember' => $addMember,
           'addRole' => addRole::orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\addMember  $addMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, addMember $addMember)
    {
        //
        $request->validate([
           'alt' =>'required|min:3|max:881',
           'name' =>'required|min:3|max:25',
           'slug' =>'required',
           'about' =>'required|min:72|max:881',
           'keywords' =>'required|min:3|max:881',
           'email' =>'required|email',
           'tel' =>'required|min:7|max:25',
           'add_role_id' =>'required',
           'facebookAccount' =>'required|url',
           'twitterAccount' =>'required|url',
           'instagramAccount' =>'required|url',
        ]);
        //
        $request['slug'] = Str::slug($request->name);
        //
        $addMember->update($request->except('image'));
        //
        if ($request->hasFile('image')) {
            //
            $fileExtension = $request->image->getClientOriginalExtension();
            $fileName = time() .'.' . $fileExtension;
            $path ='images/addMember/';
            $request->image->move($path, $fileName);
            //
            if (File::exists(public_path('images/addMember/' . $addMember->image))) {
                File::delete(public_path('images/addMember/' . $addMember->image));
            }
            //
            $addMember->update(['image' => $fileName]);
        }
        //
        return redirect()->route('admin.cms.homePage.addMember')->with('success','تم تحديث معلومات عضو في فريقك');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\addMember  $addMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(addMember $addMember)
    {
        //
        $addMember->delete();
        //
        return redirect()->route('admin.cms.homePage.addMember')->with('success','تم حذف عضو من فريقك');
    }
}
