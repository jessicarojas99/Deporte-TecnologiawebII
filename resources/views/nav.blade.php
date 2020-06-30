

<nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow-sm ">
  <div class="container">
      <a class="navbar-brand"  href="{{route('home')}}">
        <span style="font-size: 28px; color: red;">
          <i class="fas fa-volleyball-ball" ></i>
        </span>
       
        Deporte </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
          <span class=" navbar-toggler-icon"></span>
        </button>
    <div class=" collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav nav-pills">
        <li class="nav-item px-2">
            <a href="{{route('home')}}" class="nav-link btn btn-light btn-lg ">
              <i class="fas fa-home"></i>
              Home
            </a>
        </li>
        <li class="nav-item px-2">
          <div class="btn-group">
            <a  href="" class="nav-link btn btn-light btn-lg" >
              <i class="fas fa-address-book"></i>
              Registro
            </a>
                <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                  <div class="dropdown-menu active">
                    @if(auth()->check() && auth()->user()->rol == 'admin')                             
                   <a class="dropdown-item" href="{{route('users.store')}}"> <i class="fas fa-user"></i>Usuario</a>
                    @endif
                    <a class="dropdown-item" href="{{route('atleta.store')}}"><i class="fas fa-running"></i>Atletas</a>
                    <a class="dropdown-item" href="{{route('deporte.store')}}"><i class="fas fa-futbol"></i>Deporte</a>
                    <a class="dropdown-item" href="{{route('equipo.store')}}"><i class="fas fa-users"></i>Equipos</a>
                    <a class="dropdown-item" href="{{route('torneo.store')}}"><i class="fas fa-trophy"></i>Torneo</a>
                  </div>
          </div>
         </li>
        <li class="nav-item px-2 ">
          
            <a href="{{route('about')}}" class="nav-link btn btn-light btn-lg">
              <i class="fas fa-info-circle"></i>
              About</a>
        </li>
        <li class="nav-item px-2">
           <a href="{{route('contacto')}}" class="nav-link btn btn-light btn-lg">
            <i class="fas fa-envelope-open-text"></i>
            Contacto</a>
        </li>
        {{--  //guest=invitado si estas como invitado mostrar login  --}}
        @guest
        <li class="nav-item px-2">
          <a href="{{route('login')}}" class="nav-link btn btn-light btn-lg">
            <i class="fas fa-user-lock"></i>
            Login</a>
       </li>
       {{--  //si esta autenticado mostrar cerrar sesion  --}}
       @else
           <li class="nav-item px-2">
             
             <a class="nav-link btn btn-light btn-lg" href="#"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Cerrar Sesion</a>
            </li>
            {{--  //nombre del usuario con el que esta ingresando  --}}
           
              <li class="navbar-brand"  href="#">
                <span style="font-size: 18px;">
                  <i class="fas fa-user-check"></i>
              
                </span>
                {{auth()->user()->rol}}
       
              </li>
                                                          
              
       @endguest
      </ul>
    </div>
    </div>
    
  </nav>


{{--  //formulario de cerrar sesion  --}}
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>

