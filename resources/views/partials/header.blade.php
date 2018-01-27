<!--Navigation-->
<header>



<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button id="toggle-menu" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Easy-Chat</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    
        <li class="nav-item active">
            <div class="menu-flex-item">
                <i class="fa fa-home fa-2x"></i>
                @if(Auth::check())
                <a class="nav-link" href="{{ url('/espace-perso') }}">Acceuil<span class="sr-only">(current)</span></a>
                @else
                <a class="nav-link" href="{{ url('/') }}">Acceuil<span class="sr-only">(current)</span></a>  
                @endif
                 
            </div>        
         </li>
        <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <div class="menu-flex-item">
                <i class="fa fa-registered fa-2x"></i> 
                <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
            </div>
        </li>

      <li class="nav-item">
            <div class="menu-flex-item">
                <i class="fa fa-sign-in fa-2x "></i> 
                <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
            </div>       
      </li> 
    
    @else
        <li class="nav-item active">
            <div class="menu-flex-item">
                <i class="fa fa-users fa-2x"></i>
                <a class="nav-link" href="{{ url('/groupes')}}">Voir les groupes</a>   
            </div>        
        </li>
        <li class="nav-item ">
            

            <div class="menu-flex-item">
                    <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                       Se déconnecter
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
            </div>   
            
        </li>
       
        @endguest                     
    </ul>
    <!--<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>-->
  </div>
</nav>
    <!--/.Navbar-->


</header>
<!--/Navigation-->