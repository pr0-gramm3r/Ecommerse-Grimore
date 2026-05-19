<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Hash;

class MerchantController extends Controller
{
    public function viewMerchantDashboard() {
        $products = Product::where('merchant_id', Auth::guard('merchant')->id())->get();
        $merchant = Merchant::find(Auth::guard('merchant')->id());

        return view('merchant.Dashboard', compact('merchant','products'))->with('success', 'Merchant dashboard loaded successfully.');
    }
    public function showMerchantSignUpForm() {
        return view('merchant.Sign_up');
    }

    public function merchantSignUp(Request $request) {
        // Validate the request data
        $request->validate([
            'merchant_email' => 'required|email|unique:merchants',
            'merchant_password' => 'required|min:6|confirmed',
            ]);
            // dd($request->all());
            // Create a new merchant
            $merchant = Merchant::create([
                'merchant_name' => $request->merchant_name,
                'merchant_email' => $request->merchant_email,
                'merchant_password' => bcrypt($request->merchant_password),
                'merchant_avatar'=> 'https://ui-avatars.com/api/?name=' . urlencode($request->merchant_name) . '&background=random',
                
                'merchant_phone' => $request->merchant_phone,
                'merchant_address' => $request->merchant_address,
                ]);
                
                // Log the merchant in
                auth()->guard('merchant')->login($merchant);
                
                return redirect()->route('merchant.dashboard');
    }

    public function showMerchantLoginForm() {
        return view('merchant.Login');
    }

    public function merchantLogin(Request $request) {
        // Validate the request data
        $request->validate([
            'merchant_email' => 'required|email',
            'merchant_password' => 'required|min:6',
        ]);

        // Attempt to authenticate the merchant
        if (auth()->guard('merchant')->attempt([
            'merchant_email' => $request->merchant_email,
            'password' => $request->merchant_password, // map to 'password'
        ])) {
            return redirect()->route('merchant.dashboard');
        }

        return back()->withErrors(['merchant_email' => 'Invalid credentials. Please try again.']);
    }

    
    public function merchantLogout(Request $request) {
        auth()->guard('merchant')->logout();

        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }


        
    public function merchantProfilePicUpdate(Request $req){
        $req->validate([
            'merchant_avatar' => 'nullable|file|mimes:jpeg,png,jpg|max:10240'
        ]);

        $merchant = Auth::guard('merchant')->user();

        if ($req->hasFile('merchant_avatar')) {

            if ($merchant->merchant_avatar_public_id) {
                cloudinary()->uploadApi()->destroy($merchant->merchant_avatar_public_id);
            }

            $uploaded = cloudinary()->uploadApi()->upload(
                $req->file('merchant_avatar')->getRealPath(),
                ['folder' => 'merchant_avatars']
            );

            $merchant->merchant_avatar           = $uploaded['secure_url'];
            $merchant->merchant_avatar_public_id = $uploaded['public_id'];
            $merchant->save();
        }

        return back()->with('success', 'Avatar updated successfully.');
    }

    public function merchantProfileUpdateShow(){
        return view('merchant.dashboardModifications.modify_details');
    }
    
    public function merchantProfileUpdate(Request $request){
        $request->validate([
            'merchant_password' => 'required',
        ]);
        $merchant = Auth::guard('merchant')->user();

        if(!Hash::check($request->merchant_password, $merchant->merchant_password)){
            return back()->withErrors(['password' => 'Incorrect Password. Changes not saved.']);
        }

        if ($request->filled('merchant_name')) {
            $merchant->merchant_name = $request->merchant_name;
        }

        $merchant->save();
        return redirect()->route('merchant.dashboard')->with('success','Profile Uploaded Successfully.');
    }

    public function merchantAccountDelete(Request $request){
        $request->validate([
            'merchant_password' => 'required'
        ]);

        $merchant = Auth::guard('merchant')->user();

        if(!Hash::check($request->merchant_password, $merchant->merchant_password)){
            return back()->withErrors(['password' => 'Incorrect Password. Changes not saved.'])->withInput();
        }

        Auth::guard('merchant')->logout();
        $merchant->delete();
        
        return redirect()->route('home')->with('success','Merchant Account Deleted successfully');
    }

}                
