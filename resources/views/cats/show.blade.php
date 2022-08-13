@extends('layouts.app')

@section('content')
<div class="cat-show-wrap container">
 
    <div>
        <div class="image-wrap">
            <img class="cat-show-img" src="{{$cat->imagepath}}" alt="">
        </div>
        
        <p class="show-number">問い合わせ番号：{{$cat->id}}</p>
        
        @if(Auth::check())
            @if(Auth::id() != $cat->user->id)
                @if(Auth::user()->is_favorite($cat->id))
                    {!! Form::open(['route'=>['unfavorite',$cat->id],'method'=>'delete']) !!}
                        {!! Form::submit('お気に入り解除',['class'=>'btn']) !!}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route'=>['favorite',$cat->id]]) !!}
                        {!! Form::submit('お気に入り登録',['class'=>'btn']) !!}
                    {!! Form::close() !!}
                @endif
            @endif
        @else
            {!! link_to_route('signup.get','新規登録してお気に入り登録',[],['class'=>'btn']) !!}
        @endif
        
            <div class="delete">
                @if(Auth::id() == $cat->user->id)
                    {!! Form::open(['route'=>['cat.delete',$cat->id],'method'=>'delete']) !!}
                        {!! Form::submit('この保護猫の掲載を終了する',['class'=>'delete-btn']) !!}
                    {!! Form::close() !!}
                @endif
            </div>

        
        <div class="cat-profile">
            @if(Auth::id() == $cat->user->id)
                {!! link_to_route('cat.edit','編集',[$cat->id],['class'=>'edit-btn']) !!}
            @endif

            <div>
                <p>種類：{{$cat->cat_type}}</p>
                <p>年齢：{{$cat->age}}</p>
                <p>性別：{{$cat->sex}}</p>
                <p>保護した場所：{{$cat->protected_place}}</p>
                <p>性格：{{$cat->personality}}</p>
            </div>
            <div>
                <p>去勢手術：{{$cat->castration}}</p>
                <p>ワクチン：{{$cat->vaccination}}</p>
                <p>ノミダニ駆除：{{$cat->flears}}</p>
                <p>トイレの可否：{{$cat->excretion}}</p>
                <p>必要な医療的処置：{{$cat->sick}}</p>
                <p>その他問題：{{$cat->problem}}</p>
            </div>
        </div>
    </div>
    
</div>

@include('commons.profile')

@endsection