<x-app-layout>
    <!-- Solo contenido público -->
    <div class="relative h-80 w-full flex items-center justify-center overflow-hidden mb-10">
        <!-- Imagen en blanco y negro -->
        <img src="{{ asset('images/portada2.jpg') }}"
            class="absolute inset-0 w-full h-full object-cover filter grayscale" />

        <div class="absolute inset-0 bg-black/70"></div>

        <div class="relative text-center text-neutral-content px-4">
            <h1 class="mb-10 text-5xl font-bold">
                Cofradía de Nuestra Señora de la Asunción<br> y Llegada de Jesús al Calvario
            </h1>
            <a href="{{ route('register') }}">
                <button class="btn-morado">
                    Hazte hermano
                </button>
            </a>
        </div>
    </div>

    <!-- Sección de noticias -->
    <section class="max-w-7xl mx-auto px-4 py-12">
        <h1 class="mb-8 font-bold text-moradoprin text-4xl lg:text-5xl">Últimas noticias</h1>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <!-- Zona de noticias: ocupa 9 columnas -->
            <div class="md:col-span-8 lg:col-span-9 flex flex-col space-y-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Noticia 1 -->
                    <div class="card card-side bg-white shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-100 rounded-xl overflow-hidden">
                        <figure class="w-1/3">
                            <img src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
                                alt="Noticia" class="h-full object-cover" />
                        </figure>
                        <div class="card-body p-5">
                            <h2 class="text-moradoprin text-xl font-bold line-clamp-2">Título noticia uno</h2>
                            <p class="text-gray-500 text-sm mb-2">14-05-2025</p>
                            <p class="text-gray-700 text-sm line-clamp-3">Esto es un texto de prueba para la noticia.</p>
                            <div class="card-actions justify-end mt-4">
                                <button class="btn-transparente text-sm">Leer más</button>
                            </div>
                        </div>
                    </div>
                    <!-- Noticia 2 -->
                    <div class="card card-side bg-white shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-100 rounded-xl overflow-hidden">
                        <figure class="w-1/3">
                            <img src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
                                alt="Noticia" class="h-full object-cover" />
                        </figure>
                        <div class="card-body p-5">
                            <h2 class="text-moradoprin text-xl font-bold line-clamp-2">Título noticia dos</h2>
                            <p class="text-gray-500 text-sm mb-2">14-05-2025</p>
                            <p class="text-gray-700 text-sm line-clamp-3">Esto es otro texto de prueba para la noticia.</p>
                            <div class="card-actions justify-end mt-4">
                                <button class="btn-transparente text-sm">Leer más</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Zona de agenda: ocupa 3 columnas -->
            <div class="md:col-span-4 lg:col-span-3 bg-gray-100 rounded-xl p-6 shadow-inner border border-gray-200">
                <h2 class="text-moradoprin font-bold text-2xl mb-6 text-center">Agenda</h2>
                <div class="space-y-6">
                    <!-- Evento 1 -->
                    <div class="flex items-center space-x-4">
                        <div class="bg-moradoprin text-white rounded-lg flex flex-col items-center justify-center min-w-14 h-14 p-1 shadow-md">
                            <span class="text-lg font-bold leading-none">15</span>
                            <span class="text-xs uppercase">Sept</span>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 leading-tight">Nombre del evento</p>
                            <p class="text-gray-500 text-xs">Lugar del evento</p>
                        </div>
                    </div>
                    <!-- Más eventos... -->
                </div>
            </div>
        </div>
    </section>

    <!-- Sección La cofradía -->
    <section class="bg-gray-100 py-16 border-y border-gray-200">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="mb-10 font-bold text-moradoprin text-4xl lg:text-5xl">La cofradía</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Tarjeta 1 -->
                <div class="card bg-white shadow-md hover:shadow-lg transition-all duration-300 rounded-xl overflow-hidden group">
                    <figure>
                        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                            alt="Historia" class="group-hover:scale-105 transition-transform duration-500" />
                    </figure>
                    <div class="card-body p-6">
                        <h2 class="card-title text-moradoprin">Historia</h2>
                        <p class="text-gray-600 text-sm">Explora los orígenes y la trayectoria de nuestra cofradía.</p>
                        <div class="card-actions justify-end mt-4">
                            <button class="btn-transparente font-bold">Leer más</button>
                        </div>
                    </div>
                </div>
                <!-- Más tarjetas... (Patrimonio, Instrumentos, Virgen) -->
            </div>
        </div>
    </section>
</x-app-layout>