@extends('layouts.app')

@section('content')
<div class="cat-show-wrap">
    <div>
        <div class="cat-show-img">
            
        </div>
        
        <p class="show-number">問い合わせ番号：{{$cat->id}}</p>
        
        <a href="" class="favorite btn">お気に入り</a>
        
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
@endsection