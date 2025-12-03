<x-layouts.layout>
    <div class="relative h-80 w-full flex items-center justify-center overflow-hidden">
        <!-- Imagen en blanco y negro -->
        <img src="{{ asset('images/portada2.jpg') }}" class="absolute inset-0 w-full h-full object-cover filter grayscale" />

        <!-- Overlay más intenso -->
        <div class="absolute inset-0 bg-black/70"></div>

        <!-- Contenido centrado -->
        <div class="relative text-center text-neutral-content px-4">
            <h1 class="mb-10 text-5xl font-bold">
                Cofradía de Nuestra Señora de la Asunción<br> y Llegada de Jesús al Calvario
            </h1>
            <button class="btn text-xl bg-moradoprin text-white hover:text-orange-600 border-0 cursor-pointer p-4 focus:outline-none focus:ring-0">
                Hazte hermano
            </button>

        </div>
    </div>





</x-layouts.layout>
