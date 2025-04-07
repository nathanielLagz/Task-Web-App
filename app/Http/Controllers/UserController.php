<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCredentials;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /*
    * @Login page
    */
    public function loginview() {
        return view('login');
    }
    
    // Logging in
    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required'
        ]);
        // Auth::login($credentials);
        // dd('bet');
        try {
            $received = UserCredentials::get()
            ->where('username', $credentials['username'])
            ->firstOrFail()->toArray();
            if(Hash::check($credentials['password'], $received['password'])) {
                $request->headers->set('userId', $received['id']);              
                return redirect()->intended('home');
            }
            else
                return redirect()->back()->with('error', 'Invalid username/password.');
        } 
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Invalid username/password');
        }
    }

    public function home() {
        return view('home');
    }

    // Logging out
    public function logout() {
        // Auth::logout();
        return redirect()->intended()->with('status', 'You have logged out.');
    }

    /*
    * @Register page
    */
    public function registerview() {
        return view('register');
    }
    
    // Registering
    public function store(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'username' => 'required',
            'password' =>  'required|confirmed',
        ]);
        if(UserCredentials::where('username', $request->username)->exists()) {
            return redirect()->back()->with('status', 'Username already exists. Enter new one');
        }
        if(UserCredentials::where('email', $request->email)->exists()) {
            return redirect()->back()->with('status', 'Email already exists. Enter new one');
        }
        $user = UserCredentials::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
        return redirect()->intended('home')
            ->with('status', 'Registration successfully.');
    }
}
