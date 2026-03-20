@php $noticias = require base_path('resources/views/partials/noticias-data.php'); @endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach(array_slice($noticias, 0, 2) as $noticia)
    <div class="card bg-white shadow-sm overflow-hidden">
        <figure>
            <img src="{{ asset('images/' . $noticia['imagen']) }}" alt="{{ $noticia['titulo'] }}" class="w-full h-48 object-cover" loading="lazy">
        </figure>
        <div class="card-body p-4 !gap-0">
            <p class="text-xs text-gray-400 font-mono">{{ $noticia['fecha'] }}</p>
            <h2 class="card-title text-moradoprin text-xl font-bold mt-1">{{ $noticia['titulo'] }}</h2>
            <hr class="border-t border-orange-600 w-12 my-2">
            <p class="text-gray-700 text-sm line-clamp-3">{{ $noticia['texto'] }}</p>
            <div class="card-actions justify-end mt-3">
                <a href="{{ route('noticias') }}" class="btn-transparente text-xs">Leer más</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
