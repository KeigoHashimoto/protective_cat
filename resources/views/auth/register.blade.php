@extends('layouts.app')

@section('content')

<div class="form-wrap">
    <div class="container">
        <h1 class="logo">
            ^           ^<br>
            ProtectiveCat
        </h1>
        <h2>Signup</h2>
        
        <div class="form">

            {!! Form::open(['route'=>'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name','名前') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email','メールアドレス') !!}
                    {!! Form::email('email',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password','パスワード') !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation','パスワード(確認)') !!}
                    {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                </div>

                {!! Form::submit('新規登録',['class'=>'form-control primary']) !!}
                <p class="or">or</p>
            {!! Form::close() !!}
            
            {!! link_to_route('cats.index','登録しないで使用',[],['class'=>'form-control primary']) !!}
               
                <p class="sub-link">{!! link_to_route('login','ログイン') !!}</p>
            </div>    
        </div>
    </div>
</div>

@endsection