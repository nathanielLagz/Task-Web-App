<?php

namespace App\Http\Controllers;

use Carbon\Traits\ToStringFormat;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCredentials;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\error;

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
            'password' => 'required|string'
        ]);
        try {
            $received = UserCredentials::get(['username', 'password'])
                        ->where('username', $credentials['username'])
                        ->firstOrFail()->toArray();
            if(Hash::check($credentials['password'], $received['password'])) {
                return redirect()->intended('home');
            }
            else
                return redirect()->back()->with('error', 'Invalid username/password.');
        } 
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'No username found. Please register');
        }
    }

    public function home() {
        return view('home');
    }

    // Logging out
    public function logout() {
        // Auth::logout();
        return redirect()->intended()->with('loggedOut', 'You have logged out.');
    }

    /*
    * @Register page
    */
    public function registerview() {
        return view('components.register');
    }
    
    // Registering
    public function store(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'username' => 'required',
            'password' =>  'required|confirmed',
        ]);
        if(UserCredentials::where('username', $request->username)->exists()) {
            return redirect()->back()->with('error', 'Username already exists. Enter new one');
        }
        if(UserCredentials::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'Email already exists. Enter new one');
        }
        $user = new  UserCredentials();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->intended('home')
            ->with('success', 'Registration successfully.');
    }
}
