<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://googleapis.com');
        
        dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(4px);
        }

        dialog#modal-historia {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin: 0 auto;
        }
    </style>
    <title>Digiti Cruenti - Listagem de Histórias</title>
</head>
<body class="min-h-screen bg-black text-white p-6 font-mono selection:bg-emerald-500 selection:text-black">

    <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-6 mb-8">
        
        <div class="flex flex-col gap-6">
            <div class="border-4 border-emerald-500 p-4 w-48 text-center bg-black shadow-[0_0_15px_rgba(16,185,129,0.3)]">
                <h1 class="text-xl font-[Railey-PersonalUse] font-bold tracking-widest text-amber-50 uppercase">
                    Digiti Cruenti
                </h1>
            </div>

            <div class="flex items-center gap-5">
                <span class="border-2 border-emerald-500 px-4 py-2 text-sm font-semibold tracking-wide uppercase text-amber-50 ">
                    Adicione uma história
                </span>
                <a href="{{ route('history.create') }}" class="w-10 h-10 rounded-full bg-emerald-500 text-black flex items-center justify-center font-bold text-3xl transition-colors shadow-lg shrink-0">
                    +
                </a>
            </div>
            
            @if(session('success'))
                <div class="text-xs text-emerald-400 bg-emerald-950/50 px-3 py-2 border border-emerald-500/30 rounded self-start">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="flex gap-7 justify-end items-center">
            <a href="https://instagram.com" target="_blank" rel="noopener noreferret" class="w-12 h-12 rounded-full border-2 border-emerald-400 flex items-center justify-center text-emerald-400 hover:bg-emerald-500 hover:text-black transition-all duration-300 shadow-md">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 448 512">
                    <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                </svg>
            </a>
            <a href="https://github.com" target="_blank" rel="noopener noreferret" class="w-12 h-12 rounded-full border-2 border-emerald-400 flex items-center justify-center text-emerald-400 hover:bg-emerald-500 hover:text-black transition-all">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 496 512">
                    <path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 .7 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-.7zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/>
                </svg>
            </a>
            <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="w-12 h-12 rounded-full border-2 border-emerald-400 flex items-center justify-center text-emerald-400 hover:bg-emerald-500 hover:text-black transition-all">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 448 512">
                    <path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 1 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM448 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"/>
                </svg>
            </a>

        </div>

    </div>

    <div class="border-4 border-emerald-500 mt-30 p-13 rounded-sm bg-neutral-900/50 backdrop-blur-sm max-w-5xl ml-4 mr-auto">

        
        @forelse($historias as $historia)
            <div onclick="abrirPopUp(this)"
                 data-id="{{ $historia->id }}" 
                 data-titulo="{{ $historia->title }}" 
                 data-content="{{ $historia->content }}"
                 data-data="{{ $historia->created_at->format('d/m/Y H:i') }}"
                 class="w-full h-12 bg-neutral-100 rounded-md opacity-90 hover:opacity-100 transition-opacity flex items-center px-4 text-black font-semibold justify-between shadow-sm cursor-pointer">

                <span class="truncate pr-4">{{ $historia->title }}</span>
                <span class="text-xs text-gray-400 font-mono shrink-0">
                    {{ $historia->created_at->format('d/m/Y H:i') }}
                </span>
            </div>
        @empty
            <div class="text-center py-12 text-gray-500 font-mono">
                Nenhuma história encontrada no banco de dados. Clique no "+" acima para adicionar!
            </div>
        @endforelse

    </div>
</div>

    <dialog id="modal-historia" class="border-4 border-emerald-500 bg-neutral-900 text-white p-6 font-mono rounded-md w-full max-w-2xl shadow-[0_0_30px_rgba(16,185,129,0.4)]">
        <div class="flex items-center justify-between border-b border-emerald-500/30 pb-3 mb-4">
            <h2 id="modal-titulo" class="text-xl font-bold text-emerald-400 truncate pr-4"></h2>
            <span id="modal-data" class="text-xs text-gray-400 font-mono shrink-0"></span>
        </div>
        
        <p id="modal-conteudo" class="text-sm text-gray-200 font-normal leading-relaxed whitespace-pre-line max-h-96 overflow-y-auto mb-6 pr-2"></p>
        
        <div class="flex justify-between items-center border-t border-emerald-500/30 pt-4">
            <div class="flex gap-3">
                <a id="btn-editar" href="#" class="border-2 border-amber-500 px-4 py-1.5 text-xs font-semibold tracking-wide uppercase text-amber-500 hover:bg-amber-500 hover:text-black transition-colors">
                    Editar
                </a>

                <form id="form-deletar" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar esta história?')">
                    @csrf
                    <button type="submit" class="border-2 border-red-500 px-4 py-1.5 text-xs font-semibold tracking-wide uppercase text-red-500 hover:bg-red-500 hover:text-white transition-colors">
                        Deletar
                    </button>
                </form>
            </div>

            <button onclick="fecharPopUp()" class="border-2 border-emerald-500 px-4 py-1.5 text-xs font-semibold tracking-wide uppercase text-white hover:bg-emerald-500 hover:text-black transition-colors">
                Fechar
            </button>
        </div>
    </dialog>

    <script>
    const modal = document.getElementById('modal-historia');
    const titulo = document.getElementById('modal-titulo');
    const conteudo = document.getElementById('modal-conteudo');
    const dataCriacao = document.getElementById('modal-data');
    const btnEditar = document.getElementById('btn-editar');
    const formDeletar = document.getElementById('form-deletar');

    window.abrirPopUp = function(elemento) {
        const id = elemento.dataset.id;
        titulo.innerText = elemento.dataset.titulo;
        conteudo.innerText = elemento.dataset.content;
        dataCriacao.innerText = elemento.dataset.data;
        
        btnEditar.href = `/historia/${id}/edit`;
        formDeletar.action = `/historia/deletar/${id}`;
        
        modal.showModal();
    }

    window.fecharPopUp = function() {
        modal.close();
    }

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            fecharPopUp();
        }
    });
    </script>
</body>
</html>