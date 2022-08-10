@extends('layouts.app')

@section('content')
<div class="container">
    <div class="chatrooms-index">
        @foreach(array_unique($chatrooms) as $chatroom)
            <div class="chatroom">
                <div class="chat-user-img"><img src=""></div>
               {!! link_to_route('messages.show',$chatroom->nickname,[$chatroom->id],['class'=>'chatroom-btn']) !!}
            </div>
        @endforeach

    </div>
</div>
@endsection