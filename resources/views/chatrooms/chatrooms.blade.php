@extends('layouts.app')

@section('content')
<div class="container">
    <div class="chatrooms-index">
            @foreach($chatrooms as $chatroom)
                <div class="chatroom">
                    <div><a href="{{route('user.show',[$chatroom->id])}}"><img class="chat-user-img" src="{{$chatroom->user_image}}"></a></div>
                    @if($chatroom->messages->sortByDesc('created_at')->first()->read == false)
                        {!! link_to_route('messages.show',$chatroom->nickname,[$chatroom->id],['class'=>'chatroom-btn']) !!}
                    @else
                        {!! link_to_route('messages.show',$chatroom->nickname,[$chatroom->id],['class'=>'chatroom-btn-ok']) !!}
                    @endif
                </div>
            @endforeach
        @if($chatrooms->isEmpty())
            <p>まだやり取りしているユーザーがいないにゃ！</p>
        @endif

    </div>
</div>
@endsection