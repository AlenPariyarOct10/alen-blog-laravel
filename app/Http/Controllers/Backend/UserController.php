<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::first();
        return view('backend.setting.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::first();
        return view('backend.setting.edit', compact('user'));
    }

    function verifyUser(Request $request)
    {
        //dd($request);
        $userData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(Auth::attempt($userData))
        {

            return redirect()->route('backend.index');
        }else{
            return redirect()->route('login')->withErrors(["email"=>"Couldn't find user"]);
        }
    }

    function getChangepassword()
    {

        return view('backend.setting.changepassword');
    }
    function changePassword(Request $request)
    {

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed', // 'confirmed' requires 'new_password_confirmation' field in the form
        ]);


        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return redirect()->back()->withErrors(["current_password" => "Current password is incorrect."]);
        }else{
            $user = Auth::user();
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->route('backend.setting.index')->with('success', 'Password changed successfully.');
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => [
                'required',
                'email',
                'max:255',

            ],
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string|max:500',
        ]);

        // Handle file upload if present
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/uploads/setting/'), $filename);
            $validatedData['profile_image'] = $filename; // Update the filename in validated data
        }

        // Find the user by ID and update their information
        $user = User::first();
        if ($user->update($validatedData)) {
            session()->flash('success', 'Settings Updated Successfully');
        } else {
            session()->flash('error', 'Something Went Wrong');
        }

        return redirect()->route('backend.setting.index');
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
