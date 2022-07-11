@extends('layouts.app')

@section('content')
<div class="wrap">
<div class="form-container">
    <div>
        <div class="logo">
            ^           ^<br>
            ProtectiveCat
        </div>
        <h1>Signin</h1>
        
        <div class="form">

            {!! Form::open(['route'=>'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('nickname','Name') !!}
                    {!! Form::text('nickname',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email','Email') !!}
                    {!! Form::email('Email',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password','Password') !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation','Confirmation') !!}
                    {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                </div>

                {!! Form::submit('新規登録',['class'=>'form-control submit']) !!}
                <p class="or">or</p>
            {!! Form::close() !!}
                {!! Form::submit('登録せずに使用',['class'=>'form-control submit']) !!}
            </div>    
        </div>
    </div>
</div>
</div>
@endsection