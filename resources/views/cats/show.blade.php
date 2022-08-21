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
                        {!! Form::submit('お気に入り解除',['class'=>'primary']) !!}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route'=>['favorite',$cat->id]]) !!}
                        {!! Form::submit('お気に入り登録',['class'=>'primary']) !!}
                    {!! Form::close() !!}
                @endif
            @endif
        @else
            {!! link_to_route('signup.get','新規登録してお気に入り登録',[],['class'=>'primary']) !!}
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
                <p><span class="profile-label">種類</span>：{{$cat->cat_type}}</p>
                <p><span class="profile-label">年齢</span>：{{$cat->age}}</p>
                <p><span class="profile-label">性別</span>：{{$cat->sex}}</p>
                <p><span class="profile-label">保護した場所</span>：{{$cat->protected_place}}</p>
                <p><span class="profile-label">性格</span>：{{$cat->personality}}</p>
            </div>
            <div>
                <p><span class="profile-label">去勢手術</span>：{{$cat->castration}}</p>
                <p><span class="profile-label">ワクチン</span>：{{$cat->vaccination}}</p>
                <p><span class="profile-label">ノミダニ駆除</span>：{{$cat->flears}}</p>
                <p><span class="profile-label">トイレの可否</span>：{{$cat->excretion}}</p>
                <p><span class="profile-label">必要な医療的処置</span>：{{$cat->sick}}</p>
                <p><span class="profile-label">その他問題行動</span>：{{$cat->problem}}</p>
            </div>
        </div>
    </div>
    
</div>

@include('commons.profile')

@endsection