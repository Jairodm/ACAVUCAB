<nav class="navbar navbar-expand-lg bg-warning navbar-light sticky-top">

    <div id="navb" class="navbar-collapse collapse hide">
        <ul class="nav navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-bars"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route ('productos')}}">Nuestros productos</a>
                    <a class="dropdown-item" href="{{route ('index.evento')}}">Eventos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="diarioCerveza">Diario de una cerveza</a>
                </div>
            </li>
        </ul>

        <div id="navb" class="navbar-collapse collapse hide">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-brand" href="{{route ('index')}}"><img class="logo"  src="{{asset('logooo.png')}}" height="58rem"></a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="fas fa-user"></span>Mi cuenta</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        @if(!auth()->user())
                        <a class="dropdown-item" href="{{route('login')}}">Iniciar sesión</a>
                        <a class="dropdown-item" href="menuRegistro">Registrarse</a>
                        <div class="dropdown-divider"></div>
                        @else
                            @if(auth()->user()->name == 1)
                            <a class="dropdown-item" href="{{route('consultarClienteNatural')}}">Mi cuenta</a>
                            @elseif(auth()->user()->name == 2)
                            <a class="dropdown-item" href="{{route('consultarClienteJuridico')}}">Mi cuenta</a>
                            @elseif(auth()->user()->name == 3)
                            <a class="dropdown-item" href="{{route('consultarPerfilProveedor')}}">Mi cuenta</a>
                            @else
                            <a class="dropdown-item" href="{{route('Empleado')}}">Mi cuenta</a>
                            @endif

                            <!--Aquí iría una comprobación del tipo de usuario logeado
                            para saber si mandarlo a ConsultarClienteNatural, ConsultarClientejuridico,
                            ConsultarEmpleado o ConsultarProveedor-->
                            <a class="dropdown-item" href="miscompras">Mis compras</a>

                            @can('ConsultarEmpleado')
                            <a class="dropdown-item" href="{{route('menuAdministrador')}}">Administrador</a>
                            @endcan

                            <a class="dropdown-item" href="menuProveedor">Proveedor</a>
            

        
                            <!-- Cerraaaar sesión -->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar sesión') }}
                            </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>


                        @endif
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('carrito') }}"><span class="fas fa-shopping-cart">
                        </span>Carrito</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
