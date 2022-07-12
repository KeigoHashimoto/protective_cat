<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function info(){
        return view('users.info');
    }
    
    public function store(Request $request){
        $user=\Auth::user();
        $user->nickname=$request->nickname;
        $user->age=$request->age;
        $user->comment=$request->comment;
        $user->save();
        
        return redirect('/');
    }
}
