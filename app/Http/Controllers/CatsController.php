<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;

class CatsController extends Controller
{
    public function create(){
        return view('cats.create');
    }
    
    public function store(Request $request){
        $request->validate([
                'cat_type'=>'required|max:255',
                'age'=>'required',
                'sex'=>'required',
                'protected_place'=>'required|max:255',
                'personality'=>'required|max:255',
                'castration'=>'required',
                'vaccination'=>'required',
                'flears'=>'required',
                'excretion'=>'required|max:255',
                'problem'=>'max:500',
            ]);
            
        $request->user()->cats()->create([
                'cat_type'=>$request->cat_type,
                'age'=>$request->age,
                'sex'=>$request->sex,
                'protected_place'=>$request->protected_place,
                'personality'=>$request->personality,
                'castration'=>$request->castration,
                'vaccination'=>$request->vaccination,
                'flears'=>$request->flears,
                'excretion'=>$request->excretion,
                'sick'=>$request->sick,
                'problem'=>$request->problem,
            ]);
            
        return redirect('/');
    }
    
    public function index(){
        $cats=Cat::orderBy('created_at','desc')->paginate(9);
        
        return view('cats.index',['cats'=>$cats]);
    }
    
    public function show($id){
        $cat=Cat::findOrFail($id);
        $user=$cat->user;
        
        return view('cats.show',['cat'=>$cat,'user'=>$user]);
    }
}
