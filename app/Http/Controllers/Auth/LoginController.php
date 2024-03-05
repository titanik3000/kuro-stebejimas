<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication successful, redirect user to dashboard or any other page
            return redirect('/dashboard');
        }
    
        // Authentication failed, redirect back with errors
        return redirect()->back()->withInput($request->only('email'));
    }
}
