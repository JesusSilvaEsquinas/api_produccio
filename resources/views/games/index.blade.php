<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Games - CI/CD Laravel</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-neutral-950 text-neutral-100">

    <header class="fixed top-0 left-0 right-0 px-8 py-6 flex items-center justify-between bg-neutral-950/80 backdrop-blur-sm z-50">
        <div class="text-lg font-light tracking-wider">Jesús Silva Esquinas</div>
        <nav class="flex gap-6">
            <a href="{{ route('welcome') }}" class="hover:text-neutral-400 transition">Inici</a>
            <a href="{{ route('games.index') }}" class="hover:text-neutral-400 transition">Games</a>
        </nav>
    </header>

    <main class="min-h-screen pt-32 px-6 pb-20">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-5xl font-extralight tracking-tight mb-12">Games</h1>
            
            @if($games->isEmpty())
                <p class="text-neutral-400">No hi ha jocs disponibles.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($games as $game)
                        <div class="bg-neutral-900 p-6 rounded-lg hover:bg-neutral-800 transition">
                            <h2 class="text-2xl font-light mb-2">{{ $game->title }}</h2>
                            <p class="text-neutral-400 text-sm mb-4">{{ $game->developer }} · {{ $game->year }}</p>
                            <p class="text-neutral-300 mb-4">{{ Str::limit($game->description, 100) }}</p>
                            <a href="{{ route('games.edit', $game->id) }}" class="text-blue-400 hover:text-blue-300 transition">
                                Editar →
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </main>

    <footer class="fixed bottom-0 left-0 right-0 px-8 py-6 text-center text-xs text-neutral-600">
        {{ date('Y') }} · {{ config('app.name', 'Laravel') }}
    </footer>

</body>
</html>
