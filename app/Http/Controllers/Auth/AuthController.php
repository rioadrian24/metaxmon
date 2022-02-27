<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signin()
    {
        return view('auth.login');
    }

    public function post_signin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = auth()->user();
            $user = User::find($user->id);
            $user->last_login = Carbon::now()->timestamp;
            $user->save();
            return redirect()->route('admin.dashboard')->with('success', 'You have logged in');
        } else {
            return back()->with('error', 'Email or password is wrong');
        }
    }

    public function signout()
    {
        $this->_logout();
        return redirect()->route('signin')->with('success', 'You have logged out');
    }

    private function _logout()
    {
        Auth::logout();
    }
}