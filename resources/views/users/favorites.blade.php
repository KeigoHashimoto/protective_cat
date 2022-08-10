@extends('layouts.app')

@section('content')

@include('commons.profile')

@include('commons.navtabs')

<div class="favorites container">
    <h3>{{$user->nickname}}のお気に入り</h3>
    @foreach($user->favorites()->get() as $favorite)
        <div class="user-list mt-3">
            <span class="cat-date">投稿日時：{{$favorite->created_at}}</span>
            <div class="cat-wrap">
                <a href="{{route('cat.show',[$favorite->id])}}"><img class="user-list-img" src="{{$favorite->imagepath}}"></a>
                <div class="user-list-text">
                    <p class="cat-type">{{$favorite->cat_type}}</p>
                    <div class="cat-info">
                        <p>{{$favorite->age}}歳</p>
                        <p>性別{{$favorite->sex}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection