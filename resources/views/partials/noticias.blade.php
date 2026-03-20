@php $noticias = require base_path('resources/views/partials/noticias-data.php'); @endphp

@foreach($noticias as $noticia)
<div class="w-full bg-white shadow-sm rounded-xl overflow-hidden">
    <img src="{{ asset('images/' . $noticia['imagen']) }}" alt="{{ $noticia['titulo'] }}" class="w-full h-56 object-cover" loading="lazy">
    <div class="p-4 flex flex-col gap-1">
        <p class="text-sm text-gray-400 font-mono">{{ $noticia['fecha'] }}</p>
        <h2 class="text-moradoprin text-xl font-bold">{{ $noticia['titulo'] }}</h2>
        <hr class="border-t border-orange-600 w-16 my-1">
        <p class="text-gray-700 text-justify">{{ $noticia['texto'] }}</p>
    </div>
</div>
@endforeach
