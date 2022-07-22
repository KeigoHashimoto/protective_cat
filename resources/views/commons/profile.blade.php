<div class="container vw-80">
    <h2 claas="profile-title">Profile</h2>
    <div class="row profile">
        <div class="col-md-3"><a href="{{route('user.show',[$user->id])}}"><img class=" profile-img" src="{{--{{Auth::user()->user_image}}--}}"></a></div>
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <div class="profile-text">
                <p>id：{{$user->id}}</p>
                <p>ニックネーム：{{$user->nickname}}</p>
                <p>年齢：{{$user->age}}</p>
                <p>{!!nl2br(e($user->comment))!!}</p>
            </div>
            @if(Auth::id() != $user->id)
                {!! link_to_route('messages.show','メッセージを送る',[$user->id],['class'=>'btn mt-3 form-control']) !!}
            @else
                {!! link_to_route('messages.get','メッセージボード',[$user->id],['class'=>'btn mt-3 form-control']) !!}
            @endif
        </div>
    </div>
</div>