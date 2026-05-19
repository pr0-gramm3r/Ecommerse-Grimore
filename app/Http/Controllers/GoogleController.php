<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Merchant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Exception;

class GoogleController extends Controller
{
    // ── REDIRECT ──────────────────────────────────────────────
    // Call this with ?type=merchant from your merchant login page
    public function redirect(Request $request)
    {
        $type = $request->query('type', 'user'); // 'user' or 'merchant'
        session(['google_login_type' => $type]);

        return Socialite::driver('google')->redirect();
    }


    // ── CALLBACK ──────────────────────────────────────────────
    public function callback(Request $request)
    {
        $type = session('google_login_type', 'user'); // retrieve type from session
        try {
            // $googleUser = Socialite::driver('google')->user();
            $googleUser = Socialite::driver('google')->stateless()->user(); // stateless is fine now
            // dd($type, $googleUser);
            if ($type === 'merchant') {
                return $this->handleMerchant($googleUser);
            }

            return $this->handleUser($googleUser);
        }
        catch (Exception $e) {
            $loginRoute = $type === 'merchant'
                ? 'show.merchant.login'
                : 'show.login';

            return redirect()->route($loginRoute)
                ->with('error', 'Google Login failed. Please try again.');
        }
    }


    // ── PRIVATE HANDLERS ──────────────────────────────────────
    private function handleUser($googleUser)
    {
        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            $user = User::create([
                'google_id'         => $googleUser->id,
                'name'              => $googleUser->name,
                'email'             => $googleUser->email,
                'password'          => bcrypt(Str::random(32)),
                'avatar'            => $googleUser->avatar,
                'email_verified_at' => now(),
            ]);
        } else {
            $user->update(['google_id' => $googleUser->id]);
        }

        Auth::login($user);
        return redirect()->route('home');
    }

    private function handleMerchant($googleUser)
    {
        $merchant = Merchant::where('merchant_email', $googleUser->email)->first();

        if (!$merchant) {
            $merchant = Merchant::create([
                'google_id'              => $googleUser->id,
                'merchant_name'          => $googleUser->name,
                'merchant_email'         => $googleUser->email,
                'merchant_password'      => bcrypt(Str::random(32)),
                'merchant_avatar'        => $googleUser->avatar,
                'email_verified_at'      => now(),
            ]);
        } else {
            $merchant->update(['google_id' => $googleUser->id]);
        }

        Auth::guard('merchant')->login($merchant);
        return redirect()->route('merchant.dashboard');
    }
}