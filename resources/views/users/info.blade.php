@extends('layouts.app')

@section('content')
<div class="userinfo-wrap mt-5 mb-5">
    <h2>初めに、ユーザー登録をしてください。</h2>
    
    <div class="form">
        {!! Form::open(['route'=>'user_info.post']) !!}
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
            {!! Form::submit('登録',['class'=>'form-control submit']) !!}
        {!! Form::close() !!}
    </div>
</div>
        
@endsection