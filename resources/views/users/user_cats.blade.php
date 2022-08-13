@extends('layouts.app')

@section('content')

@include('commons.profile')

@include('commons.navtabs')

<div class="my-cat container">
    @if(!isset($user->nickname))
        <h3>名無しの猫好き人間　の投稿</h3>
    @else
        <h3>{{$user->nickname}}　の投稿</h3>
    @endif
    
    @foreach($user->cats()->orderBy('id','desc')->get() as $cat)
        <div class="user-list mt-3">
            <span class="cat-date">投稿日時：{{$cat->created_at}}</span>
            <div class="cat-wrap">
                <a href="{{route('cat.show',[$cat->id])}}"><img class="user-list-img" src="{{$cat->imagepath}}"></a>
                <div class="user-list-text">
                    <p class="cat-type">{{$cat->cat_type}}</p>
                    <div class="cat-info">
                        <p>{{$cat->age}}歳</p>
                        <p>性別：{{$cat->sex}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection


