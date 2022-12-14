<?php

namespace App\Http\Controllers;

use App\Models\CalonGuru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function registerPost(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        CalonGuru::create([
            'id' => $user->id,
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            $request->session()->regenerate();
            return redirect(route('dataDiri'));
        }
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            if (auth()->user()->isAdmin) {
                return redirect(route('admin.index'));
            }
            return redirect(route('profile'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $req)
    {
        try {
            $bearer_token = $req->bearerToken();
            $token = PersonalAccessToken::findToken($bearer_token);
            $token->delete();

            return redirect('/');

        } catch (\Exception $e) {
            return response([
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
