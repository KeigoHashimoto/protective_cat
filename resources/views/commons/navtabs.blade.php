<ul class="nav nav-tabs nav-justified container">
    <li class="nav-item">
        <a href="{{route('user_cats',[$user->id])}} "class="nav-link {{Request::routeIs('user_cats') || Request::routeIs('welcome') || Request::routeIs('user.show')? 'active' : ''}}">POST</a>
    </li>
    <li class="nav-item">
        <a href="{{route('favorites',[$user->id])}}" class="nav-link {{Request::routeIs('favorites') ? 'active' : ''}}">FAVORITES</a>
    </li>
</ul>