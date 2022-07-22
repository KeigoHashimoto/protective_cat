<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Cat;

class CatsController extends Controller
{
    public function guest(){
        $cats=Cat::orderBy('created_at','desc')->paginate(9);
        
        return view('cats.index',['cats'=>$cats]);
    }
    
    public function guestshow($id){
        $cat=Cat::findOrFail($id);
        $user=$cat->user;
        
        return view('cats.show',['cat'=>$cat,'user'=>$user]);
    }
    
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

            
        $cat=new Cat;
        /*if($request->file('imagepath')){
            $image=$request->file('imagepath');
            $path=Storage::disk('s3')->putFile('/',$image,'public');
            $cat->imagepath=Storage::disk('s3')->url($path);
        }*/
        
        $cat->user_id=\Auth::id();
        $cat->cat_type=$request->cat_type;
        $cat->age=$request->age;
        $cat->sex=$request->sex;
        $cat->protected_place=$request->protected_place;
        $cat->personality=$request->personality;
        $cat->castration=$request->castration;
        $cat->vaccination=$request->vaccination;
        $cat->flears=$request->flears;
        $cat->excretion=$request->excretion;
        $cat->sick=$request->sick;
        $cat->problem=$request->problem;
        
        $cat->save();
            
            
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
