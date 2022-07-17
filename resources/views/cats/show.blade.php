@extends('layouts.app')

@section('content')
<div class="cat-show-wrap">
    <div>
        <div class="cat-show-img">
            
        </div>
        
        <p class="show-number">問い合わせ番号：{{$cat->id}}</p>
        
        @if(Auth::id() != $cat->user->id)
            @if(Auth::user()->is_favorite($cat->id))
                {!! Form::open(['route'=>['unfavorite',$cat->id]]) !!}
                    {!! Form::submit('お気に入り解除',['class'=>'btn']) !!}
                {!! Form::close() !!}
            @else
                {!! Form::open(['route'=>['favorite',$cat->id]]) !!}
                    {!! Form::submit('お気に入り登録',['class'=>'btn']) !!}
                {!! Form::close() !!}
            @endif
        @endif
        
        <div class="cat-profile">
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

<div class="profile-wrap">
    <div class="profile">
        <div class="profile-img"></div>
        <div class="profile-text">
            <p>ニックネーム：{{$user->nickname}}</p>
            <p>年齢：{{$user->age}}</p>
            <p>{!!nl2br(e($user->comment))!!}</p>
        </div>
    </div>
</div>

@endsection