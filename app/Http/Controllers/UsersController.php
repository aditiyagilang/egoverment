<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function showLoginForm()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if ($user) {
            // Start session if not started already
            if (!$request->session()->isStarted()) {
                $request->session()->start();
            }

            // Store user information in the session
            $request->session()->put('user_id', $user->id);
            $request->session()->put('user_email', $user->email);
            $request->session()->put('user_password', $user->password);

                return redirect('/index');

        }

        return redirect('/welcome')->with('error', 'Invalid credentials');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
