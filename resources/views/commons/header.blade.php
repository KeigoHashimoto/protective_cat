<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light">
        @if(!empty(Auth::user()->age))
        <a class="navbar-brand ml-3" href="/">
            ^           ^<br>
            ProtectiveCat
        </a>
        @else
        <p>
            ^           ^<br>
            ProtectiveCat
        </p>
        @endif
            
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <div class="sarch-form-group mr-3">
                {!! Form::open(['route'=>['cats.index'],'method'=>'get']) !!}
                    {!! Form::text('sarch',null,['class'=>'sarch-form','placeholder'=>'キーワードを入力して可愛い猫を検索！']) !!}
                    {!! Form::submit('検索',['class'=>'sarch-btn']) !!}
                {!! Form::close()!!}
            </div>
            <ul class="navbar-nav">
                
                @if(Auth::check())
                    {!! link_to_route('cats.create','猫を譲る',[],['class'=>'nav-link mr-5']) !!}
                    {!! link_to_route('cats.index','猫を探す',[],['class'=>'nav-link mr-5']) !!}
                @else
                    {!! link_to_route('signup.get','猫を譲る',[],['class'=>'nav-link mr-5']) !!}
                    {!! link_to_route('guest.index','猫を探す',[],['class'=>'nav-link mr-5']) !!}
                @endif
                
                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('welcome','MyProfile') !!}</li> 
                            <li class="dropdown-item">{!! link_to_route('messages.get','Chatroom',[Auth::id()]) !!}</li>
                            <li class="dropdown-item">{!! link_to_route('logout.get','ログアウト') !!}</li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">guest</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('signup.get','新規登録') !!}</li> 
                            <li class="dropdown-item">{!! link_to_route('login','ログイン') !!}</li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>