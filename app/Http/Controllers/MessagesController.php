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
        
        $msg=$messages->where('user_id','=',$user->id)->first();
        
        if($msg != null){
            if($msg->read == false){
                $msg->read = true;
                $msg->save();
            };
        };
        
        
        return view('chatrooms.chatshow',['messages'=>$messages,'user'=>$user,]);
    }
    
    public function index(){
        $userId=\Auth::id();
        $subQuery = function($query) use ($userId) {
            $query->from('messages')
                ->selectRaw("case when user_id= {$userId} then to_user_id
                                  else user_id
                             end as user_id")
                ->selectRaw('max(created_at) as latest_message_at')
                ->where('messages.user_id', $userId)
                ->orWhere('messages.to_user_id', $userId)
                ->groupByRaw("case when user_id= $userId then to_user_id
                                  else user_id
                             end");
        };
        //サブクエリをusersテーブルと結合してユーザー情報を取得
        $chatrooms=User::select(['users.id', 'users.name', 'users.nickname','user_image',])->joinSub($subQuery, 'messages', 'users.id', 'messages.user_id')->orderBy('latest_message_at','desc')->get();
        
        return view('chatrooms.chatrooms',['user'=>$userId,'chatrooms'=>$chatrooms,]);
    }
}
