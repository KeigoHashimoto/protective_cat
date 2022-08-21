@extends('layouts.app')

@section('content')
<div class="form-wrap">
    <div class="container">
        <h1 class="logo">
            ^           ^<br>
            ProtectiveCat
        </h1>
        <h2>Login</h2>
        
        <div class="form">
            
            {!! Form::open(['route'=>'login.post']) !!}
                <div class="form-group login-form">
                    {!! Form::label('email','Email') !!}
                    {!! Form::email('email',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group login-form">
                    {!! Form::label('password','Password') !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>
                
                {!! Form::submit('Login',['class'=>'form-control primary']) !!}
                <p class="or">or</p>
            {!! Form::close() !!}
                
            {!! link_to_route('guest.index','登録しないで使用',[],['class'=>'form-control primary']) !!}
            
            <p class="sub-link"><span>登録がお済じゃありませんか？</span>{!! link_to_route('signup.get','新規登録') !!}</p>
        </div>
    </div>
</div>


@endsection