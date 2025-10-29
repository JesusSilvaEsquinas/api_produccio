<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Joc</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-neutral-950 text-neutral-100">

    <header class="fixed top-0 left-0 right-0 px-8 py-6 bg-neutral-950/80 backdrop-blur-sm z-50">
        <div class="text-lg font-light tracking-wider">Editar Joc</div>
    </header>

    <main class="min-h-screen flex items-center justify-center px-6 pt-20">
        <div class="w-full max-w-md">
            <form id="edit-form" class="space-y-4">
                <div>
                    <label class="block text-sm mb-1">Títol</label>
                    <input type="text" id="title" 
                        class="w-full px-3 py-2 bg-neutral-900 border border-neutral-700 rounded text-sm focus:outline-none focus:border-neutral-500">
                </div>

                <div>
                    <label class="block text-sm mb-1">Developer</label>
                    <input type="text" id="developer" 
                        class="w-full px-3 py-2 bg-neutral-900 border border-neutral-700 rounded text-sm focus:outline-none focus:border-neutral-500">
                </div>

                <div>
                    <label class="block text-sm mb-1">Any</label>
                    <input type="number" id="year" 
                        class="w-full px-3 py-2 bg-neutral-900 border border-neutral-700 rounded text-sm focus:outline-none focus:border-neutral-500">
                </div>

                <div>
                    <label class="block text-sm mb-1">Descripció</label>
                    <textarea id="description" rows="3"
                        class="w-full px-3 py-2 bg-neutral-900 border border-neutral-700 rounded text-sm focus:outline-none focus:border-neutral-500"></textarea>
                </div>

                <div id="message" class="hidden px-3 py-2 rounded text-sm"></div>

                <div class="flex gap-3">
                    <button type="submit" class="px-6 py-2 bg-neutral-100 text-neutral-900 rounded text-sm hover:bg-neutral-300">
                        Guardar
                    </button>
                    <a href="/" class="px-6 py-2 border border-neutral-700 rounded text-sm hover:bg-neutral-900">
                        Cancel·lar
                    </a>
                </div>
            </form>
        </div>
    </main>

    <script>
        const gameId = window.location.pathname.split('/')[2];

        // Cargar game
        fetch(`/api/games/${gameId}`, {
            headers: { 'X-Access-Key': '{{ env('API_ACCESS_KEY') }}' }
        })
        .then(r => r.json())
        .then(game => {
            document.getElementById('title').value = game.title;
            document.getElementById('developer').value = game.developer;
            document.getElementById('year').value = game.year;
            document.getElementById('description').value = game.description;
        });

        // Actualizar
        document.getElementById('edit-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const data = {
                title: document.getElementById('title').value,
                developer: document.getElementById('developer').value,
                year: document.getElementById('year').value,
                description: document.getElementById('description').value
            };

            const msg = document.getElementById('message');
            
            try {
                const res = await fetch(`/api/games/${gameId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Access-Key': '{{ env('API_ACCESS_KEY') }}'
                    },
                    body: JSON.stringify(data)
                });

                const result = await res.json();

                if (result.updated) {
                    msg.className = 'px-3 py-2 rounded text-sm bg-green-900 text-green-200';
                    msg.textContent = '✓ Actualitzat!';
                    msg.classList.remove('hidden');
                    setTimeout(() => window.location.href = '/', 1000);
                } else {
                    msg.className = 'px-3 py-2 rounded text-sm bg-red-900 text-red-200';
                    msg.textContent = '✗ Error';
                    msg.classList.remove('hidden');
                }
            } catch (error) {
                msg.className = 'px-3 py-2 rounded text-sm bg-red-900 text-red-200';
                msg.textContent = '✗ Error';
                msg.classList.remove('hidden');
            }
        });
    </script>

</body>
</html>
