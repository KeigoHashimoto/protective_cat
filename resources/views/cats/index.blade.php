@extends('layouts.app')

@section('content')
<div class="cats-index-wrap">
    <div class="container">
        <h2>保護猫一覧</h2>
        <div class="row justify-content-start">
        
            @foreach($cats as $cat)
                <div class="cat-card col-md-4">
        
                    <img class="cat-index-img" src="{{$cat->imagepath}}" alt="">

                    <div class="cat-index-text">
                        <p class="place">{!!nl2br(e($cat->protected_place))!!}</p>
                        <p>{{$cat->age}}歳</p>
                        <p>{{$cat->sex}}</p>
                    </div>
                    @if(Auth::check())
                        {!! link_to_route('cat.show','more',[$cat->id],['class'=>'primary']) !!}
                    @else
                        {!! link_to_route('guest.show','more',[$cat->id],['class'=>'primary']) !!}
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    {{$cats->links()}}
</div>

@endsection