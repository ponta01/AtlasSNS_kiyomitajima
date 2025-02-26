<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(Request $request){
        // $request->validate([
        //     'post' => ['required', 'string', 'min:1', 'max:150'],
        // ]);
        return view('posts.index');
    }
}
