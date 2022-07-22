<div class="container vw-80">
    <div class="row">
        <div class="my-cat col-md-6">
            <h3>{{$user->nickname}}の投稿</h3>
            @foreach($user->cats()->orderBy('id','desc')->get() as $cat)
                <div class="user-list">
                    <span class="cat-date">{{$cat->created_at}}</span>
                    <div class="cat-wrap">
                        <a href="{{route('cat.show',[$cat->id])}}"><img class="user-list-img" src="/*{{$cat->imagepath}}*/"></a>
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
        
        <div class="favorites col-md-6">
            <h3>{{$user->nickname}}のお気に入り</h3>
            @foreach($user->favorites()->get() as $favorite)
                <div class="user-list">
                    <span class="cat-date">{{$favorite->created_at}}</span>
                    <div class="cat-wrap">
                        <a href="{{route('cat.show',[$favorite->id])}}"><img class="user-list-img" src="/*{{$favorite->imagepath}}*/"></a>
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
    </div>
</div>