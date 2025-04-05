<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'min:2', 'max:12', 'unique:users'],
            'email' => ['required', 'email', 'min:5', 'max:40', 'unique:users'],
            'password' => ['required', 'regex:/^[a-zA-Z0-9]+$/','min:8', 'max:20', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required', 'regex:/^[a-zA-Z0-9]+$/','min:8', 'max:20','same:password'],
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('user.login')->with('username', $user->username);
    }

    public function added(): View
    {
        return view('auth.added');
    }
}
