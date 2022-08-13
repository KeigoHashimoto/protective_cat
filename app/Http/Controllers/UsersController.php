<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;

class UsersController extends Controller
{
    public function welcome(){
        $user=\Auth::user();
        
        return view('welcome',['user'=>$user]);
    }
    
    public function info(){
        return view('users.info');
    }
    
    public function posts($id){
        $user=User::findOrFail($id);
        $posts=$user->cats()->paginate(10);
        
        return view('users.user_cats',['user'=>$user,'posts'=>$posts]);
    }
    
    public function store(Request $request){
        $request->validate([
                'nickname'=>'max:255',
                'age'=>'required|numeric|between:1,100',
                'comment'=>'required|max:255',
            ]);
        
        $user=\Auth::user();
        if($request->file('user_image')){
            $image=$request->file('user_image');
            $path=Storage::disk('s3')->putFile('/',$image,'public');
            $user->user_image=Storage::disk('s3')->url($path);
        }else if($request->file('user_image') == null){
            $user->user_image=Storage::disk('s3')->url('default_user.jpg');
        }
        

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
    
    public function edit($id){
        $user=User::findOrFail($id);
        
        return view('users.edit',['user'=>$user]);
    }
    
    public function update(Request $request , $id){
        $request->validate([
                'nickname'=>'max:255',
                'age'=>'required|between:1,100',
                'comment'=>'required|max:255',
            ]);
        
        $user=User::findOrFail($id);
        
        if($request->file('user_image')){
            $image=$request->file('user_image');
            $path=Storage::disk('s3')->putFile('/',$image,'public');
            $user->user_image=Storage::disk('s3')->url($path);
        }
        
        $user->nickname=$request->nickname;
        $user->age=$request->age;
        $user->comment=$request->comment;
        $user->save();
        
        return redirect('/');
    }
}
