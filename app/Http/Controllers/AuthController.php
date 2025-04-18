<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'password' => 'required|string'
    ]);

    // Check if user exists
    $user = \App\Models\User::where('name', $request->name)->first();

    if (!$user) {
        return back()->withErrors([
            'login_error' => 'User does not exist. Please try again.',
        ]);
    }

    // Attempt to login
    if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
        $request->session()->regenerate();

        // Redirect to dashboard or peminjaman index
        return redirect()->route('peminjaman.index');
    }

    return back()->withErrors([
        'login_error' => 'Invalid password. Please try again.',
    ]);
}


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
