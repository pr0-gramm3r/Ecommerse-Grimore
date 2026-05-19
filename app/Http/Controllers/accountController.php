<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class accountController extends Controller
{
    public function profilePicUpdate(Request $request){
        $request->validate([
            'avatar' => 'nullable|file|mimes:jpeg,png,jpg|max:10240'
        ]);

        // dd($request);
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            if ($user->avatar_public_id) {
                cloudinary()->uploadApi()->destroy($user->avatar_public_id);
            }

            $uploaded = cloudinary()->uploadApi()->upload(
                $request->file('avatar')->getRealPath(),
                ['folder' => 'avatar']
            );

            $user->avatar           = $uploaded['secure_url'];
            $user->avatar_public_id = $uploaded['public_id'];
            $user->save();
        }
        return back()->with('success', 'Avatar Updated successfully.');
    }

    public function profileModifyShow(){
        return view('nav-links.modify.profile');
    }

    public function updateProfile(Request $req){
        $req->validate([
            'password' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($req->password, $user->password)) {
            return back()->withErrors(['password' => 'Incorrect Password Try Again!!']);
        }

        if ($req->filled('name')) {
            $user->name = $req->name;
        }

        $user->save();
        return redirect()->route('account')->with('success','Name Modified Sucessfully');
    }

    public function deleteAccount(Request $req){
        $req->validate([
            'password' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($req->password, $user->password)) {
            return back()->withErrors(['password' => 'Incorrect Password Try Again !!']);
        }

        $user->delete();
        return redirect()->route('home')->with('error','Account Removed Successfully');
    }
}
