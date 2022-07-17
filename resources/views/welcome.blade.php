@extends('layouts.app')

@section('content')
@if(Auth::check())
<div class="profile-wrap">
    <h2>Profile</h2>
    <div class="profile">
        <img class="profile-img" src="{{Auth::user()->user_image}}">
        <div class="profile-text">
            <p>ニックネーム：{{Auth::user()->nickname}}</p>
            <p>年齢：{{Auth::user()->age}}</p>
            <p>{!!nl2br(e(Auth::user()->comment))!!}</p>
        </div>
    </div>
</div>

<div class="users-cats-wrap">
        <div class="my-cat">
            <h3>{{Auth::user()->nickname}}の投稿</h3>
            @foreach(Auth::user()->cats()->get() as $cat)
                <div class="user-list">
                    <p>{!! link_to_route('cat.show',$cat->cat_type,[$cat->id]) !!}</p>
                </div>
            @endforeach
        </div>
        
        <div class="favorites">
            <h3>{{Auth::user()->nickname}}のお気に入り</h3>
            @foreach(Auth::user()->favorites()->get() as $favorite)
                <div class="user-list">
                    <div class="favorite-img"></div>
                    <div class="favorite-text">
                        <p>{{$favorite->cat_type}}</p>
                        <p>{{$favorite->age}}</p>
                        <p>{{$favorite->sex}}</p>
                    </div>
                    
                </div>
            @endforeach
        </div>
    </div>

    
@else
    <div class="main">
        <div>
            <h1 class="main-title display-2">
                ^          ^<br>
                ProtectiveCat
            </h1>
            <div class="buttons">
                <button class="welcome-btn">{!! link_to_route('signup.get','Signup') !!}</button>
                
                <button class="welcome-btn">{!! link_to_route('login','Login') !!}</button>
            </div>
            <a class="sub-link" href="">登録せずに使用する</a>
        </div>
    </div>
@endif

@endsection
