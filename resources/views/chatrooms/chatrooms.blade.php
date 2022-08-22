@extends('layouts.app')

@section('content')
<div class="container">
    <div class="chatrooms-index">
        @if($chatrooms = null)
            @foreach($chatrooms as $chatroom)
                <div class="chatroom">
                    <div><a href="{{route('user.show',[$chatroom->id])}}"><img class="chat-user-img" src="{{$chatroom->user_image}}"></a></div>
                   {!! link_to_route('messages.show',$chatroom->nickname,[$chatroom->id],['class'=>'chatroom-btn']) !!}
                </div>
            @endforeach
        @else
            <p>まだやり取りしているユーザーがいないにゃ！</p>
        @endif

    </div>
</div>
@endsection