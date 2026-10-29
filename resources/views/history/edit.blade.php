<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Digiti Cruenti - Editar História</title>
</head>
<body class="min-h-screen bg-black text-white p-6 font-mono selection:bg-amber-500 selection:text-black flex flex-col items-center justify-center">

    <div class="w-full max-w-2xl flex flex-col gap-6">
        
        <div class="flex flex-col gap-6 md:flex-row md:justify-between md:items-center">
            <div class="border-4 border-emerald-500 p-4 w-48 text-center bg-black shadow-[0_0_15px_rgba(245,158,11,0.3)]">
                <h1 class="text-xl font-[Railey-PersonalUse] font-bold tracking-widest text-amber-50 uppercase">
                    Digiti Cruenti
                </h1>
            </div>

            <div class="flex items-center gap-5">
                <span class="border-2 border-amber-500 px-4 py-2 text-sm font-semibold tracking-wide uppercase text-amber-50">
                    Editar história
                </span>
            </div>
        </div>

        <div class="border-4 border-amber-500 p-6 rounded-sm bg-neutral-900/50 backdrop-blur-sm shadow-[0_0_30px_rgba(245,158,11,0.2)]">
            <form action="/historia/{{ $historia->id }}" method="POST" class="flex flex-col gap-6">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-2">
                    <label for="title" class="text-xs uppercase font-semibold text-amber-50 font-mono">Título da História</label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $historia->title) }}" 
                           required
                           class="w-full bg-black border-2 border-amber-500/50 p-3 text-white font-mono focus:border-amber-500 focus:outline-none transition-colors">
                </div>

                <div class="flex flex-col gap-2">
                    <label for="content" class="text-xs uppercase font-semibold text-amber-50 font-mono">Conteúdo</label>
                    <textarea id="content" 
                              name="content" 
                              rows="12" 
                              required
                              class="w-full bg-black border-2 border-amber-500/50 p-3 text-white font-mono focus:border-amber-500 focus:outline-none transition-colors leading-relaxed">{{ old('content', $historia->content) }}</textarea>
                </div>

                <div class="flex gap-4 pt-2">
                    <button type="submit" 
                            class="border-2 border-amber-500 px-6 py-2 text-sm font-semibold tracking-wide uppercase text-amber-500 hover:bg-amber-500 hover:text-black transition-colors cursor-pointer">
                        Salvar Alterações
                    </button>

                    <a href="/history" 
                       class="border-2 border-neutral-500 px-6 py-2 text-sm font-semibold tracking-wide uppercase text-neutral-400 hover:bg-neutral-500 hover:text-black transition-colors flex items-center justify-center">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>

    </div>

</body>
</html>
