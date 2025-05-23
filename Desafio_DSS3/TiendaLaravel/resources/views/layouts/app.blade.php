<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MixSabores</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body class="p-relative d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 top-0">
        <div class="container">
            <a class="navbar-brand" href="{{ route('shop.index') }}">MixSabores</a>
            <div id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            Carrito <span id="cart_count" class="bg-danger rounded-5 p-2">
                                {{ count(session('cart', [])) }}
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <footer class="flex mt-auto">
        <p>© {{ date('Y') }} Mi Tienda. Todos los derechos reservados.</p>
    </footer>
</body>
</html>