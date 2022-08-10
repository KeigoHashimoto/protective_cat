@extends('layouts.app')

@section('content')
<div class="chatroom-show container">
    <h3>{{$user->nickname}}とのメッセージ</h3>
    {!! Form::open(['route'=>['messages.post',$user->id]]) !!}
        {!! Form::textarea('message',null,['class'=>'chat-post']) !!}
        {!! Form::submit('送信',['class'=>'form-control btn']) !!}
    {!! Form::close() !!}
    
    @foreach($messages as $message)
        <div class="message container">
            <div><img class="message-user-img" src="{{$message->user->user_image}}"></div>
            <div class="message-wrap">
                <p class="send-user">{{$message->user->nickname}}</p>
                <p>{{$message->message}}</p>
                <p class="message-created-at">{{$message->created_at}}</p>
            </div>
        </div>
    @endforeach
</div>

{!! link_to_route('messages.get','メッセージボードに戻る',[$user->id],['class'=>'btn mb-5']) !!}
@endsection