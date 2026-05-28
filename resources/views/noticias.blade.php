<x-app-layout>
    <div class="bg-gray-100 min-h-screen pb-12">

        <h1 class="text-moradoprin font-bold text-3xl md:text-4xl lg:text-5xl text-center mb-4 pt-8">Noticias</h1>
         <hr class="border-t-2 border-orange-600 w-24 mx-auto mb-8">

        <div class="max-w-4xl mx-auto px-4 space-y-8">
            @include('partials.noticias')
        </div>
    </div>

    <!-- Botón Volver Flotante -->
    <a href="{{ route('main') }}"
       class="fixed bottom-6 left-6 bg-moradoprin text-white w-12 h-12 lg:w-14 lg:h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-orange-600 transition-all z-40">
        <i class="fa-solid fa-arrow-left text-lg lg:text-xl"></i>
    </a>
</x-app-layout>
