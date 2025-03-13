<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function search(Request $request){
        // 1つ目の処理
        $keyword = $request->input('keyword');
        // 2つ目の処理
        if(!empty($keyword)){
        $users = User::where('title','like', '%'.$keyword.'%')->get();
        }else{
        $users = User::all();
        }
        // 3つ目の処理
        return view('users.search',['users'=>$users]);
    }
}
