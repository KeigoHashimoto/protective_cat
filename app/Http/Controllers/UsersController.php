<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;

class UsersController extends Controller
{
    public function info(){
        return view('users.info');
    }
    
    public function store(Request $request){
        $user=\Auth::user();
        /*if($request->file('user_image')){
            $image=$request->file('user_image');
            $path=Storage::disk('s3')->putFile('/',$image,'public');
            $user->user_image=Storage::disk('s3')->url($path);
        }*/
        $user->nickname=$request->nickname;
        $user->age=$request->age;
        $user->comment=$request->comment;
        $user->save();
        
        return redirect('/');
    }
    
    
    public function show($id){
        $user=USer::findOrFail($id);
        
        return view('users.show',['user'=>$user]);
    }
}
