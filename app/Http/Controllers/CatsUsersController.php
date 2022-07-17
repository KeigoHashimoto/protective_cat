<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
