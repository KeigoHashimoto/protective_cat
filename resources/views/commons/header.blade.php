<header class="mb-4">
    <nav class="navbar navbar-expand-sm bg-dark">
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
                @if(Auth::check())
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                         <li class="dropdown-item center">{!! link_to_route('logout.get','ログアウト') !!}</li>
                    </ul>
                </li>
               
                @endif
            </ul>
        </div>
    </nav>
</header>