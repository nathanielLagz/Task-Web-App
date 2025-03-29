<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCredentials;
use App\Http\Controllers\User;

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
        
    //     return redirect()->intended('/home');
    // }
        if(Auth::attempt($credentials)) {
            return redirect()->intended('home.page');
        }
        else {
            return redirect()->back()->name('login.page');
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
        return view('/components/register');
    }
    
    // Registering
    public function store(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'username' => 'required',
            'password' =>  'required|confirmed',
        ]);
        
        $user = new  UserCredentials();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->intended('/home')->with('success', '
        Registration successfully.');
    }
}
