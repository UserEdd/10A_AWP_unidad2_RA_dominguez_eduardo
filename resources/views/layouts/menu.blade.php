<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles-menu.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ url('/proyecto') }}"><strong>Inicio<strong></a></li>
            <li><a href="{{ url('/integrantes') }}"><strong>Equipo<strong></a></li>
            <li><a href="{{ url('/login') }}"><strong>Login<strong></a></li>
        </ul>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>

<footer class="footer">
    <div class="footer-container">
        <p>&copy; {{ date('Y') }} SOCIALERT. Todos los derechos reservados.</p>
        <p>
            Desarrollado por <strong>Equipo SOCIALERT</strong> | 
        </p>
    </div>
</footer>
</html>
