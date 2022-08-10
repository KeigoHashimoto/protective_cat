<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CatsUsersController extends Controller
{
    public function store($id){
        \Auth::user()->add_favorite($id);
        
        return back();
    }
    
    public function destroy($id){
        \Auth::user()->unfavorite($id);
        
        return back();
    }
    
    public function favorites($id){
        $user=User::findOrFail($id);
        $favorites=$user->favorites()->paginate(10);
        
        return view('users.favorites',['user'=>$user,'favorites'=>$favorites]);
    }
}
