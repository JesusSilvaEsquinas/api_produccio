{{-- resources/views/layouts/app.blade.php --}}
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Mi Proyecto</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Fuente y estilo base --}}
    <style>
        body {
            background-color: #f5f0e6;
            font-family: 'Segoe UI', sans-serif;
            color: #4b3b3b;
        }
        .navbar {
            background-color: #cbb69d !important;
        }
        .navbar-brand, .nav-link, .navbar-text {
            color: #4b3b3b !important;
            font-weight: 500;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #6b4f4f !important;
        }
    </style>

    @stack('styles')
</head>
<body>
    {{-- Navbar superior --}}
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="#">Mi Proyecto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Reportes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Configuración</a></li>
                </ul>
                <span class="navbar-text me-3">Hola, Usuario 👋</span>
                <a href="#" class="btn btn-sm" style="background-color: #b9a084; color: white;">Salir</a>
            </div>
        </div>
    </nav>

    {{-- Contenido principal --}}
    <main class="py-4">
        @yield('content')
    </main>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>