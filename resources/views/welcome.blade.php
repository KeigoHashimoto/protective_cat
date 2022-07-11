@extends('layouts.app')

@section('content')
<div class="wrap">
    <div class="main">
        <div>
            <h1 class="main-title">
                ^          ^<br>
                ProtectiveCat
            </h1>
            <div class="buttons">
                <button>{!! link_to_route('signup.get','Signup',[],['class'=>'']) !!}</button>
                
                <button><a href="">Login</a></button>
            </div>
            <a class="no-login" href="">登録せずに使用する</a>
        </div>
    </div>
</div>
@endsection
