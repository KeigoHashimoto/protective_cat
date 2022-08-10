<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Message;
use App\User;

class MessagesController extends Controller
{
    
    public function store(Request $request ,$id){
        
        
        $request->validate([
            'message'=>'required',
            ]);
        
        $to_user = User::findOrFail($id);
        
        $message=new Message;
        $message->message = $request->message;
        $message->user_id = \Auth::id();
        $message->to_user_id = $to_user->id;
        $message->save();

        return back();
    }
    
    public function show($id){
        $user=User::findOrFail($id);
        $messages=Message::where('user_id','=',\Auth::id())->where('to_user_id','=',$user->id)
        ->orWhere(function($query) use($user){
            $query->where('user_id','=',$user->id)->where('to_user_id','=',\Auth::id());
        })
        ->orderBy('created_at','desc')->get();

        return view('chatrooms.chatshow',['messages'=>$messages,'user'=>$user]);
    }
    
    public function index(){
        $user=\Auth::user();

        $sends=$user->sends()->get();
        $recieves=$user->recieves()->get();
        $messageUsers=$sends->concat($recieves)->unique('id');
        
        $chatrooms=array();
        
        if(!empty($messageUsers)){
            
            foreach($messageUsers as $messageUser){
                
                $chats = Message::where('user_id','=',$user->id)
                ->orWhere('to_user_id','=',$user->id)
                ->orderBy('created_at','desc')
                ->get();
                
            
                foreach($chats as $chat){
                    
                    if($chat->user_id===$user->id){
                        $chatrooms[]=User::findOrFail($chat->to_user_id);
                    }else if($chat->to_user_id === $user->id){
                        $chatrooms[]=User::findOrFail($chat->user_id);
                    }
      
                }
            }
            
        }
        
      
        return view('chatrooms.chatrooms',['user'=>$user,'chatrooms'=>$chatrooms]);
    }
    
}
