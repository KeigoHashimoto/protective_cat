@extends('layouts.app')

@section('content')
<div class="cats-index-wrap">
    <h2>保護猫一覧</h2>
    
    <div class="grid">
        
    @foreach($cats as $cat)
        <div class="cat-card">
            <div class="cat-index-img"></div>
            <div class="cat-index-text">
                <p>{{$cat->protected_place}}</p>
                <p>{{$cat->age}}歳</p>
                <p>{{$cat->sex}}</p>
            </div>
            {!! link_to_route('cat.show','more',[$cat->id],['class'=>'btn']) !!}
        </div>
    @endforeach
    </div>
</div>

@endsection