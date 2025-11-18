<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CI/CD Laravel</title>
</head>

<body class="antialiased bg-neutral-950 text-neutral-100">

    {{-- Navbar minimalista --}}
    <header class="fixed top-0 left-0 right-0 px-8 py-6 flex items-center justify-between bg-neutral-950/80 backdrop-blur-sm z-50">
        <div class="text-lg font-light tracking-wider">Jesús Silva Esquinas</div>
        <nav>
            <a href="{{ route('games.index') }}">Games</a>
        </nav>
    </header>

    <!--Hola-->
    {{-- Contenido principal centrado --}}
    <main class="min-h-screen flex items-center justify-center px-6">
        <div class="text-center max-w-2xl">
            <h1 class="text-6xl md:text-7xl font-extralight tracking-tight mb-6">
                Benvinguts
            </h1>
            <p class="text-lg md:text-xl text-neutral-400 font-light mb-12">
                Todo ready para comenzar
            </p>
        </div>
    </main>

    {{-- Footer minimalista --}}
    <footer class="fixed bottom-0 left-0 right-0 px-8 py-6 text-center text-xs text-neutral-600">
        {{ date('Y') }} · {{ config('app.name', 'Laravel') }}
    </footer>

</body>

</html>
