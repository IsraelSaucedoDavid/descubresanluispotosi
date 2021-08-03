<link rel="stylesheet" href="css/nav.css">

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" onclick="paginaInicio()"><img class="logo1" src="favicons/logoslp.PNG"> <img class="logo2"
            src="favicons/logo2slp.PNG"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"> <i class="fa fa-navicon" style="color:#aa1e82; font-size:28px;"></i></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a href="{{ url('paquetes') }}" class="btn btnpaquetes mr-auto" style=""><span>Paquetes
                    </span></a>&nbsp;&nbsp;

            </li>
            <li class="nav-item">
                <a class="btn btnpromotores mr-auto"
                    href="https://www.google.com/maps/d/edit?mid=1sA1O0Anr6fMPVjPYpnjeL2CN295IRA6x&usp=sharing"
                    style="cursor: pointer"><span>Mapa</span></a>&nbsp;&nbsp;
            </li>
            <li class="nav-item ">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a class="btn btnlogin" href="{{ url('/home') }}" style="cursor: pointer"><span>Mi
                                    Perfil</span></a>
                        @else
                            <a class="btn btnlogin" href="{{ route('login') }}" style="cursor: pointer"><span>Mi
                                    Perfil</span></a>

                            @if (Route::has('register'))
                                {{-- <a href="{{ route('register') }}"></a> --}}
                            @endif
                        @endauth
                    </div>
                @endif
            </li>
        </ul>
    </div>
</nav>
