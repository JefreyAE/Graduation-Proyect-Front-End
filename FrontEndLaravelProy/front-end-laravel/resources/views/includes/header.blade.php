<nav id="nav-1" class="navbar navbar-expand-xl navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link " href="{{ url('/main/index/') }}" aria-current="page">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Módulo de Animales
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/animals/index/animales activos') }}">Listado de
                                animales activos</a></li>
                        <li><a class="dropdown-item" href="{{ url('/animals/dead/animales fallecidos') }}">Listado de
                                animales fallecidos</a></li>
                        <li><a class="dropdown-item"
                                href="{{ url('/animals/indexAll/todos los animales registrados') }}">Listado de todos
                                los animales registrados</a></li>
                        <li><a class="dropdown-item" href="{{ url('/animals/register/') }}">Registrar un
                                nacimiento</a></li>
                        <li><a class="dropdown-item" href="{{ url('/animals/search') }}">Buscar un animal</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ url('/purchases/register/') }}" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Módulo de
                        Compras</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/purchases/index/') }}">Listado animales
                                comprados</a></li>
                        <li><a class="dropdown-item" href="{{ url('/purchases/register/') }}">Registrar compras</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ url('/purchases/search/') }}">Consultar compras por
                                fecha</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ url('/sales/register/') }}" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Módulo de
                        Ventas</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/sales/index/') }}">Listado animales vendidos</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ url('/sales/register/') }}">Registrar ventas</a></li>
                        <li><a class="dropdown-item" href="{{ url('/sales/search/') }}">Consultar ventas por fecha</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ url('/incidents/register/') }}" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Módulo de
                        Incidentes</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/incidents/index/') }}">Listado de incidentes</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ url('/incidents/register/') }}">Registrar un
                                incidentes</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ url('/injectables/register/') }}" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Módulo de
                        Inyectables</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/injectables/index/') }}">Listado inyectables
                                aplicados</a></li>
                        <li><a class="dropdown-item" href="{{ url('/injectables/register/') }}">Registrar aplicación
                                de inyectable</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ url('/notifications/index/') }}" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Módulo de
                        Notificaciones</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item"
                                href="{{ url('/notifications/index/notificaciones activas') }}">Listado de
                                notificaciones activas</a></li>
                        <li><a class="dropdown-item"
                                href="{{ url('/notifications/checked/notificaciones vistas') }}">Listado de
                                notificaciones vistas</a></li>
                        <li><a class="dropdown-item"
                                href="{{ url('/notifications/indexAll/todas las notificaciones') }}">Listado de todas
                                las notificaciones</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdown"
                      role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Módulo de
                      Estadísticas</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{ url('/statistics/index') }}">Estadísticas globales</a></li>
                      <li><a class="dropdown-item" href="{{ url('/statistics/auctions') }}">Estadísticas de subastas</a></li>
                  </ul>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown" style="margin-right: 100px;">
                    <a class="nav-link dropdown-toggle" href="{{ url('/user/profile') }}"
                        href="{{ url('/user/profile') }}" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Cuenta</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/user/profile') }}">Cambio de contraseña</a></li>
                        <li><a class="dropdown-item" href="{{ url('/user/logout/') }}">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
