@extends('layouts.app')

@section('content')
@if(Auth::check())
@include('commons.profile')

@include('commons.navtabs')

@include('users.user_cats')
    
@else
    <div class="main">
        <div>
            <img src="{{ Storage::disk('s3')->url('logo.png') }}" alt="logo" class="logo-title">
            <div class="buttons">
                {!! link_to_route('signup.get','Signup',[],['class'=>'welcome-btn']) !!}
                
                {!! link_to_route('login','Login',[],['class'=>'welcome-btn']) !!}
            </div>
            {!! link_to_route('guest.index','登録せずに使用する',[],['class'=>'sub-link']) !!}
        </div>
    </div>
@endif

@endsection
