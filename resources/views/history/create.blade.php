<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Digiti Cruenti - Adicionar História</title>
</head>
<body class="bg-black min-h-screen flex items-center justify-center p-4">

    @if(session('success'))
        <div style="color: #00ff00;" class="text-center mb-4">{{ session('success') }}</div>
    @endif

    <form class="bg-[#fdfbfb] w-full max-w-4xl mx-auto p-6 md:p-10 rounded-lg flex flex-col items-center" action="{{ route('history.store') }}" method="POST">
        @csrf
        
        <p class="text-2xl text-center mt-4 font-mono font-bold">Título da sua História</p>
        <div class="w-full max-w-md mt-5">
            <input class="w-full outline rounded-md p-2" type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <span style="color: black;" class="text-sm block mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full max-w-xl mt-10">
            <p class="text-2xl font-mono font-bold mb-4">Conteúdo:</p>
            <textarea class="w-full h-48 outline rounded-md p-2" name="content" id="content">{{ old('content') }}</textarea>
            @error('content')
                <span style="color: black;" class="text-sm block mt-1">{{ $message }}</span>
            @enderror
        </div>

        <button class="bg-black text-[#00bf63] text-2xl rounded-sm w-40 h-12 mt-10 font-mono font-bold hover:opacity-90 transition-opacity cursor-pointer" type="submit">
            Enviar
        </button>
    </form>

</body>
</html>
