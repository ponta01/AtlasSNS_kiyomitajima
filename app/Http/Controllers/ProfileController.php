<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function profile(Request $request){
        $request->validate([
            'username' => ['required', 'string', 'min:2', 'max:12'],
            'email' => ['required', 'string', 'email', 'min:5', 'max:40'],
            'newpassword' => ['required', 'regex:/^[a-zA-Z0-9]+$/','min:8', 'max:20', 'confirmed', Rules\Password::defaults()],
            'newpassword_confirmation' => ['required', 'regex:/^[a-zA-Z0-9]+$/','min:8', 'max:20', 'confirmed','same:newpassword'],
            'bio' => ['required', 'string', 'max:150'],
            'icon_image' => ['required', 'image', 'bmp,png,jpg,gif,svg'],
        ]);
        return view('profiles.profile');
    }
}
