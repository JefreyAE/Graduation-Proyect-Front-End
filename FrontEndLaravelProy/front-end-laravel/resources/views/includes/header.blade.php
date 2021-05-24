
<nav id="nav">
    <ul>
        <li><a href="{{url('/main/index/') }}">Inicio</a></li>
        <li><a href="{{ url('/animals/register/')  }}">Módulo de Animales</a>
            <ul>
                <li><a href="{{ url('/animals/index/animales activos') }}">Listado de animales activos</a></li>
                <li><a href="{{ url('/animals/dead/animales fallecidos')}}">Listado de animales fallecidos</a></li>
                <li><a href="{{ url('/animals/indexAll/todos los animales registrados') }}">Listado de todos los animales registrados</a></li>
                <li><a href="{{ url('/animals/register/') }}">Registrar un nacimiento</a></li>  
                <li><a href="{{ url('/animals/search')}}">Buscar un animal</a></li>
            </ul>
        </li>
        <li><a href="{{ url('/purchases/register/')}}">Módulo de Compras</a>
            <ul>
                <li><a href="{{ url('/purchases/index/')}}">Listado animales comprados</a></li>
                <li><a href="{{ url('/purchases/register/')}}">Registrar compras</a></li>
                <li><a href="{{ url('/purchases/search/')}}">Consultar compras por fecha</a></li>
            </ul>
        </li>
        <li><a href="{{ url('/sales/register/')}}">Módulo de Ventas</a>
            <ul>
                <li><a href="{{ url('/sales/index/')}}">Listado animales vendidos</a></li>
                <li><a href="{{ url('/sales/register/')}}">Registrar ventas</a></li>
                <li><a href="{{ url('/sales/search/')}}">Consultar ventas por fecha</a></li>
            </ul>
        </li>
        <li><a href="{{ url('/incidents/register/')}}">Módulo de Incidentes</a>
            <ul>
                <li><a href="{{ url('/incidents/index/')}}">Listado de incidentes</a></li>
                <li><a href="{{ url('/incidents/register/')}}">Registrar un incidentes</a></li>
            </ul>
        </li>     
        <li><a href="{{ url('/injectables/register/')}}">Módulo de Inyectables</a>
            <ul>
                <li><a href="{{ url('/injectables/index/')}}">Listado inyectables aplicados</a></li>
                <li><a href="{{ url('/injectables/register/')}}">Registrar aplicación de inyectable</a></li>  
            </ul>
        </li>
        <li><a href="{{ url('/notifications/index/')}}">Módulo de Notificaciones</a>
            <ul>
                <li><a href="{{ url('/notifications/index/notificaciones activas')}}">Listado de notificaciones activas</a></li>
                <li><a href="{{ url('/notifications/checked/notificaciones vistas')}}">Listado de notificaciones vistas</a></li>
                <li><a href="{{ url('/notifications/indexAll/todas las notificaciones')}}">Listado de todas las notificaciones</a></li>
            </ul>
        </li>
        <li id="acount"><a href="{{ url('/user/profile')}}">Cuenta</a>
            <ul>
                <li><a href="{{ url('/user/profile')}}">Cambio de contraseña</a></li>
                <li><a href="{{ url('/user/logout/')}}">Cerrar sesión</a></li>
            </ul>
        </li>  
    </ul>
</nav>