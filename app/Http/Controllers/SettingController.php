<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\SocialMedia;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userData = Auth::user();
        $userSocialData = SocialMedia::where('user_id', Auth::user()->id)->first();
        return view('admin.setting.setting', compact('userData', 'userSocialData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, string $id)
     {
         $user = User::findOrFail($id);
         $userSocialData = SocialMedia::where('user_id', $id)->firstOrNew();
     
         $request->validate([
             'name' => 'required',
             'email' => 'required|email',
             'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
         ]);
     
         if ($request->hasFile('image')) {
             $file = $request->file('image');
             $file_name = time() . '.' . $file->getClientOriginalExtension();
             $file->move(public_path('images'), $file_name);
             $user->image = $file_name;
         }
     
         $user->fill($request->only('name', 'email'));
         $userSocialData = SocialMedia::updateOrCreate(
            ['user_id' => $id],
            ['facebook' => $request->facebook, 'twitter' => $request->twitter, 'youtube' => $request->youtube, 'instagram' => $request->instagram]
        );
        
         $userSocialData->save();
         $user->save();
     
         toastr()->success('Data updated successfully');
     
         return redirect()->back();
     }
     
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
