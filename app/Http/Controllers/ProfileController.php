<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $adminData = User::findOrFail($id);
        return view('profile', compact('adminData'));
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }


    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $adminData = User::findOrFail($id);
        $adminData->name = $request->name;
        $adminData->email = $request->email;
        if ($request->hasFile('picture_url')) {
            $file = $request->file('picture_url');
            @unlink(public_path('uploads/' . $adminData->picture_url));
            $imageName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $imageName);
            $adminData->picture_url = $imageName;
        }
        $adminData->save();

        return redirect()->back()->with([
            'message' => 'Admin profile updated successfully!',
            'alert-type' => 'success',
        ]);
    }
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function changepassword()
    {
        return view('auth.changepassword');
    }
    public function updatepassword(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required |confirmed',
        ]);
        if (!Hash::check($request->old_password, Auth::user()->password))
        {
            return redirect()->back()->with([
                'message'=>'Old password does not match',
                'alert-type'=>'error',
            ]);
        }
         User::whereId(Auth::user()->id)->update([
            'password'=>Hash::make($request->new_password),
        ]);
        return redirect()->back()->with([
            'message'=>'password changed successfully',
            'alert-type'=>'success',
        ]);
        
          
    }
}
