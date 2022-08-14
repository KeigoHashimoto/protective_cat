<div class="container">
    <div class="row profile mt-5">
        <div class="profile-img-wrap col-lg-3">
            <div><a href="{{route('user.show',[$user->id])}}"><img class="profile-img" src="{{$user->user_image}}"></a></div>
        </div>
        
        
        <div class="col-lg-8">
 
            <div class="profile-text">
                {{--ログインユーザーのみ自分のプロフィールを編集できる--}}
                @if(Auth::id()==$user->id)
                    {!! link_to_route('user.edit','編集',[$user->id],['class'=>'edit-btn']) !!}
                @endif
                
                    <p>ニックネーム：{{$user->nickname}}</p>
                    <p>年齢：{{$user->age}}</p>
                    <p>{!!nl2br(e($user->comment))!!}</p>
                
            </div>
            
            @if(AUth::check())
                @if(Auth::id() != $user->id)
                    {!! link_to_route('messages.show','メッセージを送る',[$user->id],['class'=>'btn mt-3 form-control']) !!}
                @else
                    {!! link_to_route('messages.get','メッセージボード',[$user->id],['class'=>'btn mt-3 form-control']) !!}
                @endif
            @else
                {!! link_to_route('signup.get','新規登録してメッセージを送る',[],['class'=>'btn mt-3 form-control']) !!}
            @endif
        </div>
    </div>
</div>