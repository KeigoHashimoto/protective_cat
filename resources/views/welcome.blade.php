@extends('layouts.app')

@section('content')
@if(Auth::check())
@include('commons.profile')

@include('commons.user_cats')
    
@else
    <div class="main">
        <div>
            <h1 class="main-title display-2">
                ^          ^<br>
                ProtectiveCat
            </h1>
            <div class="buttons">
                {!! link_to_route('signup.get','Signup',[],['class'=>'welcome-btn']) !!}
                
                {!! link_to_route('login','Login',[],['class'=>'welcome-btn']) !!}
            </div>
            {!! link_to_route('guest.index','登録せずに使用する',[],['class'=>'sub-link']) !!}
        </div>
    </div>
@endif

@endsection
