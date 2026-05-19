<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('authanticate.Login');
    }

public function login(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $remember = $request->filled('remember');

    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password,
    ],$remember)) {

        $request->session()->regenerate();

        // check redirect source
        if ($request->input('redirect') === 'cart') {
            return redirect()->route('cart');
        }
        else {
            return redirect()->route('home');
        }   
    }

    return back()->withErrors([
        'email' => 'Invalid email or password.',
    ])->withInput();
}

    public function showSignUpForm() {
        return view('authanticate.Sign_up');
    }

    public function signUp(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // here we will create a new user in the database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'avatar'=> 'https://ui-avatars.com/api/?name=' . urlencode($request->name) . '&background=random',
            ]);

        return redirect()->route('show.login')->with('success', 'Account created successfully. Please log in.');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home')->with('error', 'You have been Logged Out.');
    }

    public function showAccount() {
        $user = User::find(Auth::id());
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('nav-links.Account', compact('user', 'cartItems'));
    }   

    public function showForgotPasswordForm() {
        return view('authanticate.password.Forgot_password');
    }

    public function resetmailsender(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = bin2hex(random_bytes(32));
        $email = $request->email;

        // YOU MUST SAVE IT HERE
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => $token, 
                'created_at' => now()
            ]
        );

        Mail::to($email)->send(new Email($token, $email));

        return redirect()->route('show.login')->with('success', 'Password reset link has been sent to your email.');
    }

    public function showResetPasswordForm(Request $request, $token) {
        $email = $request->query('email');
        return view('authanticate.password.reset_password',compact('token', 'email'));
    }
    
    public function resetPassword(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required',
        ]);
        $record = DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->where('token', $request->token)
        ->first();

        // ❌ Token not found
        if (!$record) {
            return response()->json(['message' => 'Invalid token.'], 400);
        }

        // ❌ Token doesn't match
        if ($record->token !== $request->token) {
            return response()->json(['message' => 'Invalid token.'], 400);
        }

        // ❌ Token expired — older than 60 minutes
        if (Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return response()->json(['message' => 'Token has expired. Please request a new one.'], 400);
        }

        $user = User::where('email', $request->email)->update([
            'password' => bcrypt($request->password),
        ]);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('show.login')->with('success', 'Password reset successfully.');
    }

}