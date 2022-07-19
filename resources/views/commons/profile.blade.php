<div class="container vw-80">
    <h2 claas="profile-title">Profile</h2>
    <div class="row profile">
        <div class="col-sm-3"><img class=" profile-img" src="/*{{Auth::user()->user_image}}*/"></div>
        <div class="col-sm-1"></div>
        <div class="col-sm-8 profile-text">
            <p>ニックネーム：{{$user->nickname}}</p>
            <p>年齢：{{$user->age}}</p>
            <p>{!!nl2br(e($user->comment))!!}</p>
        </div>
    </div>
</div>