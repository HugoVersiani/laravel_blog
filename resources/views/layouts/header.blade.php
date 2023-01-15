<header class="bg-light header-top">
    <div class="header-div-child-1">
        <div class="header-div-child-2 d-flex">
            <a>
                <img class="logo" src="{{asset('img/v-logo-ico.png')}}">
            </a>
            <nav id="nav">
                <button aria-label="Abrir ou fechar menu" id="btn-mobile" aria-expanded="false">Menu
                    <span id="hamb"></span>
                </button>
                <ul role="menu" id="nav-ul">
                    <li>
                    <a href="{{url('/blog')}}">Blog</a>
                    </li> 
                    <li>
                    <a href="{{url('/tags')}}">Tags</a>
                    </li> 
                    <li>
                    <a>Portifólio</a>
                    </li> 
                    <li>
                      @if(Auth::check())
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            </a>
                        </li>
                    @endif
                    <a><i class="fas fa-solid fa-moon fa-1x" aria-hidden="true"></i></a>
                    </li> 
                </ul>
            </nav>
        </div>
    </div>
    
</header>