@extends('layouts.app')

@section('content')
@if(Auth::check())
<div class="container vw-80">
    <h2 claas="profile-title">Profile</h2>
    <div class="row profile">
        <div class="col-sm-3"><img class=" profile-img" src="/*{{Auth::user()->user_image}}*/"></div>
        <div class="col-sm-1"></div>
        <div class="col-sm-8 profile-text">
            <p>ニックネーム：{{Auth::user()->nickname}}</p>
            <p>年齢：{{Auth::user()->age}}</p>
            <p>{!!nl2br(e(Auth::user()->comment))!!}</p>
        </div>
    </div>
</div>

<div class="container vw-80">
    <div class="row">
        <div class="my-cat col-sm-6">
            <h3>{{Auth::user()->nickname}}の投稿</h3>
            @foreach(Auth::user()->cats()->orderBy('id','desc')->get() as $cat)
                <div class="user-list">
                    <span class="cat-date">{{$cat->created_at}}</span>
                    <div class="cat-wrap">
                        <a href="{{route('cat.show',[$cat->id])}}"><img class="user-list-img" src="/*{{$cat->imagepath}}*/"></a>
                        <div class="user-list-text">
                            <p>{{$cat->cat_type}}</p>
                            <p>{{$cat->age}}</p>
                            <p>{{$cat->sex}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="favorites col-sm-6">
            <h3>{{Auth::user()->nickname}}のお気に入り</h3>
            @foreach(Auth::user()->favorites()->get() as $favorite)
                <div class="user-list">
                    <span class="cat-date">{{$cat->created_at}}</span>
                    <div class="cat-wrap">
                        <a href="{{route('cat.show',[$favorite->id])}}"><img class="user-list-img" src="/*{{$favorite->imagepath}}*/"></a>
                        <div class="user-list-text">
                            <p>{{$favorite->cat_type}}</p>
                            <p>{{$favorite->age}}</p>
                            <p>{{$favorite->sex}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
