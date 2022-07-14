<header class="mb-4">
    <nav class="navbar navbar-expand-sm">
        <a class="navbar-brand" href="/">
            ^           ^<br>
            ProtectiveCat
        </a>
            
        <button tyupe="button" class="navbar-toggler" data-toggle="collapse" date-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                {!! link_to_route('cats.create','猫を譲る',[],['class'=>'nav-link mr-5']) !!}
                {!! link_to_route('cats.index','猫を探す',[],['class'=>'nav-link mr-5']) !!}
                @if(Auth::check())
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                         <li class="dropdown-item">{!! link_to_route('users.index','ユーザー一覧') !!}</li>
                         <li class="dropdown-item">{!! link_to_route('logout.get','ログアウト') !!}</li>
                    </ul>
                </li>
               
                @endif
            </ul>
        </div>
    </nav>
</header>