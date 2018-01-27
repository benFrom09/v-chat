<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            @if(Auth::check());
            <a class="navbar-brand" href="{{ route('home')}}">Easy-chat</a>
            @else
            <a class="navbar-brand" href="{{ route('Home')}}">Easy-chat</a>
            @endif

        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                @if(Auth::check())
                <!--<li class="{{routeIsActive('home')}}"><a href="{{ route('home')}}">Home</a></li>-->
                <li class="{{routeIsActive('profile')}}"><a href="{{url('/profile')}}/{{ Auth::user()->id}}">Profil</a></li>
                <li class="{{routeIsActive('creategroup')}}"><a href="{{url('/creategroup')}}">Créer un  groupe</a></li>
                <li class="{{routeIsActive('group')}}"><a href="{{url('/group')}}">Voir les groupes</a></li>
                <li class="{{routeIsActive('About')}}"><a href="{{ route('About')}}">A propos</a></li>
                 @endif
            </ul>
               
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                <li><a href="{{ route('login') }}">Se connecter</a></li>
                <li><a href="{{ route('register') }}">Créer un compte</a></li>
                @else
                <li class="dropdown">
                    <a class="logout" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                    <ul class="dropdown-menu" role="menu">
                        <li class="{{routeIsActive('logout')}}">
                            <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
@if(session('success'))
<div class="container">

    <div class="alert alert-success">
        {{session('success')}}
    </div>
        
</div>
@endif
@if(session('errors'))
<div class="container">

    <div class="alert alert-danger">
         {{session('errors')}}
    </div>
        
</div>
@endif