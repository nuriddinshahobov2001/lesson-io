<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\StoreLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'], // будет захеширован через casts()
        ]);

        Auth::login($user);

        return redirect()->route('dashboard.index')->with('success', 'You have registered successfully.');
    }

    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard.index');
        }
        return view('auth.login');
    }

    public function login(StoreLoginRequest $request)
    {
        $credentials = $request->validated();
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors(['email' => 'Incorrect email or password']);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard.index')->with('success', 'You are logged in.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('success', 'Вы вышли из системы.');
    }
}



