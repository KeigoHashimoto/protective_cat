@extends('layouts.app')

@section('content')
<div class="container">
    <div class="chatrooms-index r">
        @foreach($recieves->unique('nickname') as $recieve)
            <div class="chatroom">
                <div class="chat-user-img"><img src=""></div>
                {!! link_to_route('messages.show',$recieve->nickname,[$recieve->id],['class'=>'chatroom-btn']) !!}
            </div>
        @endforeach

    </div>
</div>
@endsection