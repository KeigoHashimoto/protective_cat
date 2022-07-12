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
                
                {!! Form::submit('Login',['class'=>'form-control submit']) !!}
                <p class="or">or</p>
            {!! Form::close() !!}
                
            <a href="" class="form-control submit'>登録せず使用</a>
                
        </div>
    </div>
</div>


@endsection