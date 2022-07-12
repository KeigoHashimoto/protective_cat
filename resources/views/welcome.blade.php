@extends('layouts.app')

@section('content')
@if(Auth::check())
    <p>hello!!{{Auth::user()->nickname}}</p>
    
    <div class="profile">
        <h2>Profile</h2>
        <p>ニックネーム：{{Auth::user()->nickname}}</p>
        <p>年齢：{{Auth::user()->age}}</p>
        <p>{!!nl2br(e(Auth::user()->comment))!!}</p>
    </div>
    
    
@else
    <div class="main">
        <div>
            <h1 class="main-title display-2">
                ^          ^<br>
                ProtectiveCat
            </h1>
            <div class="buttons">
                <button>{!! link_to_route('signup.get','Signup',[],['class'=>'btn']) !!}</button>
                
                <button>{!! link_to_route('login','Login',[],['class'=>'btn']) !!}</button>
            </div>
            <a class="sub-link" href="">登録せずに使用する</a>
        </div>
    </div>
@endif

@endsection
