@extends('layouts.app')

@section('content')
<div class="userinfo-wrap mt-5 mb-5">
    <h2>ユーザー情報の変更</h2>
    
    <div class="form">
        {!! Form::model($user,['route'=>['user.update',$user->id],'files'=>true,'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('nickname','ニックネーム') !!}
                {!! Form::text('nickname',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('age','年齢') !!}
                {!! Form::number('age',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('comment','プロフィール') !!}
                {!! Form::textarea('comment',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('user_image','画像') !!}
                {!! Form::file('user_image',null,['class'=>'form-control']) !!}
            </div>
            {!! Form::submit('変更',['class'=>'form-control primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection