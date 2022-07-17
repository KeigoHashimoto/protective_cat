<div class="profile-wrap">
    <h2>{{$user->nickname}}のプロフィール</h2>
    <div class="profile">
        <div class="profile-img"></div>
        <div class="profile-text">
            <p>ニックネーム：{{$user->nickname}}</p>
            <p>年齢：{{$user->age}}</p>
            <p>コメント：{!!nl2br(e($user->comment))!!}</p>
        </div>
    </div>
</div>