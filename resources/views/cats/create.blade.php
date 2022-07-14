@extends('layouts.app')

@section('content')
<div class="cats_wrap">
    <h2>保護猫を登録する</h2>
    <div class="form">
    {!!Form::open(['route'=>'cats.store']) !!}
        <div class="form-group">
            {!! Form::label('cat_type','猫の種類',['class'=>'cats-label']) !!}
            {!! Form::text('cat_type',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('age','猫の年齢',['class'=>'cats-label']) !!}
            {!! Form::number('age',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('sex','猫の性別',['class'=>'cats-label']) !!}
            <div class="form-group">
                {!! Form::radio('sex','♂',true) !!}
                {!! Form::label('sex','♂') !!}
                {!! Form::radio('sex','♀',false) !!}
                {!! Form::label('sex','♀') !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('protected_place','保護した場所',['class'=>'cats-label']) !!}
            {!! Form::text('protected_place',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('personality','猫の性格',['class'=>'cats-label']) !!}
            {!! Form::text('personality',null,['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('sick','必要な医療的処置',['class'=>'cats-label']) !!}
            {!! Form::text('sick',null,['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('castration','去勢手術の実施',['class'=>'cats-label']) !!}
            <div class="form-group">
                {!! Form::radio('castration','実施',true) !!}
                {!! Form::label('castration','実施') !!}
                {!! Form::radio('castration',null,false) !!}
                {!! Form::label('castration','未実施','未実施') !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('vaccination','ワクチンの実施',['class'=>'cats-label']) !!}
            <div class="form-group">
                {!! Form::radio('vaccination','実施',true) !!}
                {!! Form::label('vaccination','実施') !!}
                {!! Form::radio('vaccination','未実施',false) !!}
                {!! Form::label('vaccination','未実施') !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('flears','ノミダニ駆除の実施',['class'=>'cats-label']) !!}
            <div class="form-group">
                {!! Form::radio('flears','実施',true) !!}
                {!! Form::label('flears','実施') !!}
                {!! Form::radio('flears','未実施',false) !!}
                {!! Form::label('flears','未実施') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('excretion','トイレの可否',['class'=>'cats-label']) !!}
            <div class="form-group">
                {!! Form::radio('excretion','可',true) !!}
                {!! Form::label('excretion','可') !!}
                {!! Form::radio('excretion','不可',false) !!}
                {!! Form::label('excretion','不可') !!}
            </div>
            
        </div>
        <div class="form-group">
            {!! Form::label('problem','その他問題行動',['class'=>'cats-label']) !!}
            {!! Form::textarea('problem',null,['class'=>'form-control']) !!}
        </div>
        {!! Form::submit('登録',['class'=>'form-control submit'])!!}
    {!! Form::close() !!}
    </div>
</div>
@endsection