@extends('layouts.app')

@section('content')
<div class="user-show-wrap">
    @include('commons.profile')
    
    <div class="users-cats-wrap">
        <div class="my-cat">
            <h3>{{$user->nickname}}の投稿</h3>
            @foreach($user->cats()->get() as $cat)
                <div class="user-list">
                    <p>{!! link_to_route('cat.show',$cat->cat_type,[$cat->id]) !!}</p>
                </div>
            @endforeach
        </div>
        
        <div class="favorites">
            <h3>{{$user->nickname}}のお気に入り</h3>
            @foreach($user->favorites()->get() as $favorite)
                <div class="user-list">
                    <img class="favorite-img" src="{{$favorite->imagepath}}">
                    <div class="favorite-text">
                        <p>{{$favorite->cat_type}}</p>
                        <p>{{$favorite->age}}</p>
                        <p>{{$favorite->sex}}</p>
                    </div>
                    
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection