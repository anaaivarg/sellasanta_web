<x-app-layout>
    @auth
        <!-- Sección de Gestión -->
        <div class="container mx-auto px-5 pt-10">
            <h2 class="text-3xl font-bold text-moradoprin mb-6 text-center">Administración</h2>
            <div class="flex gap-5 flex-wrap justify-center mb-10">
                <!-- Tarjeta Gestionar Cofrades -->
                <div
                    class="card bg-white w-80 shadow-md hover:shadow-xl transition-all duration-300 hover:scale-105 border border-gray-200">
                    <div class="card-body">
                        <h2 class="card-title text-moradoprin">Gestión cofrade</h2>
                        <p class="text-gray-600">Gestiona a los miembros de la cofradía</p>
                        <div class="card-actions justify-end">
                            <a href="{{route("usuarios.index")}}"><button class="btn btn-primary">Gestionar
                                    cofrades</button></a>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta Gestionar Calendarios -->
                <div
                    class="card bg-white w-80 shadow-md hover:shadow-xl transition-all duration-300 hover:scale-105 border border-gray-200">
                    <div class="card-body">
                        <h2 class="card-title text-moradoprin">Gestión de calendarios</h2>
                        <p class="text-gray-600">Gestiona los eventos y calendarios de la cofradía</p>
                        <div class="card-actions justify-end">
                            <a href="#"><button class="btn btn-primary">Gestionar calendarios</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Accesos Directos -->
        <div class="py-8">
            <div class="container mx-auto px-5">
                <div class="flex gap-5 justify-center flex-wrap items-center">
                    <!-- Enlace a Gmail -->
                    <a href="https://mail.google.com" target="_blank"
                        class="group flex flex-col items-center gap-2 transition-transform duration-300 hover:scale-110">
                        <div
                            class="bg-gradient-to-br from-red-400 to-red-600 rounded-full p-3 shadow-lg group-hover:shadow-2xl transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </a>

                    <!-- Enlace a WhatsApp -->
                    <a href="https://web.whatsapp.com" target="_blank"
                        class="group flex flex-col items-center gap-2 transition-transform duration-300 hover:scale-110">
                        <div
                            class="bg-gradient-to-br from-green-400 to-green-600 rounded-full p-3 shadow-lg group-hover:shadow-2xl transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                            </svg>
                        </div>
                    </a>

                    <!-- Enlace a Facebook -->
                    <a href="https://www.facebook.com" target="_blank"
                        class="group flex flex-col items-center gap-2 transition-transform duration-300 hover:scale-110">
                        <div
                            class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-full p-3 shadow-lg group-hover:shadow-2xl transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </div>
                    </a>

                    <!-- Enlace a Instagram -->
                    <a href="https://www.instagram.com" target="_blank"
                        class="group flex flex-col items-center gap-2 transition-transform duration-300 hover:scale-110">
                        <div
                            class="bg-gradient-to-br from-pink-500 to-purple-600 rounded-full p-3 shadow-lg group-hover:shadow-2xl transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </div>
                    </a>

                    <!-- Enlace a YouTube -->
                    <a href="https://www.youtube.com" target="_blank"
                        class="group flex flex-col items-center gap-2 transition-transform duration-300 hover:scale-110">
                        <div
                            class="bg-gradient-to-br from-red-500 to-red-700 rounded-full p-3 shadow-lg group-hover:shadow-2xl transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endauth
    @guest
        <div class="relative h-80 w-full flex items-center justify-center overflow-hidden mb-10">
            <!-- Imagen en blanco y negro -->
            <img src="{{ asset('images/portada2.jpg') }}"
                class="absolute inset-0 w-full h-full object-cover filter grayscale" />


            <div class="absolute inset-0 bg-black/70"></div>


            <div class="relative text-center text-neutral-content px-4">
                <h1 class="mb-10 text-5xl font-bold">
                    Cofradía de Nuestra Señora de la Asunción<br> y Llegada de Jesús al Calvario
                </h1>
                <button class="btn-morado">
                    Hazte hermano
                </button>

            </div>
        </div>

        <section class="max-w-7xl mx-auto px-4 py-12">
            <h1 class="mb-8 font-bold text-moradoprin text-4xl lg:text-5xl">Últimas noticias</h1>
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                <!-- Zona de noticias: ocupa 9 columnas -->
                <div class="md:col-span-8 lg:col-span-9 flex flex-col space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Noticia 1 -->
                        <div
                            class="card card-side bg-white shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-100 rounded-xl overflow-hidden">
                            <figure class="w-1/3">
                                <img src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
                                    alt="Noticia" class="h-full object-cover" />
                            </figure>
                            <div class="card-body p-5">
                                <h2 class="text-moradoprin text-xl font-bold line-clamp-2">Título noticia uno</h2>
                                <p class="text-gray-500 text-sm mb-2">14-05-2025</p>
                                <p class="text-gray-700 text-sm line-clamp-3">Esto es un texto de prueba para la noticia
                                    tiriririr.</p>
                                <div class="card-actions justify-end mt-4">
                                    <button class="btn-transparente text-sm">Leer más</button>
                                </div>
                            </div>
                        </div>
                        <!-- Noticia 2 -->
                        <div
                            class="card card-side bg-white shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-100 rounded-xl overflow-hidden">
                            <figure class="w-1/3">
                                <img src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
                                    alt="Noticia" class="h-full object-cover" />
                            </figure>
                            <div class="card-body p-5">
                                <h2 class="text-moradoprin text-xl font-bold line-clamp-2">Título noticia dos</h2>
                                <p class="text-gray-500 text-sm mb-2">14-05-2025</p>
                                <p class="text-gray-700 text-sm line-clamp-3">Esto es otro texto de prueba para la noticia.
                                </p>
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
                            <div
                                class="bg-moradoprin text-white rounded-lg flex flex-col items-center justify-center min-w-14 h-14 p-1 shadow-md">
                                <span class="text-lg font-bold leading-none">15</span>
                                <span class="text-xs uppercase">Sept</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 leading-tight">Nombre del evento</p>
                                <p class="text-gray-500 text-xs">Lugar del evento</p>
                            </div>
                        </div>

                        <!-- Evento 2 -->
                        <div class="flex items-center space-x-4">
                            <div
                                class="bg-moradoprin text-white rounded-lg flex flex-col items-center justify-center min-w-14 h-14 p-1 shadow-md">
                                <span class="text-lg font-bold leading-none">15</span>
                                <span class="text-xs uppercase">Sept</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 leading-tight">Nombre del evento</p>
                                <p class="text-gray-500 text-xs">Lugar del evento</p>
                            </div>
                        </div>

                        <!-- Evento 3 -->
                        <div class="flex items-center space-x-4">
                            <div
                                class="bg-moradoprin text-white rounded-lg flex flex-col items-center justify-center min-w-14 h-14 p-1 shadow-md">
                                <span class="text-lg font-bold leading-none">15</span>
                                <span class="text-xs uppercase">Sept</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 leading-tight">Nombre del evento</p>
                                <p class="text-gray-500 text-xs">Lugar del evento</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gray-100 py-16 border-y border-gray-200">
            <div class="max-w-7xl mx-auto px-4">
                <h1 class="mb-10 font-bold text-moradoprin text-4xl lg:text-5xl">La cofradía</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Tarjeta 1 -->
                    <div
                        class="card bg-white shadow-md hover:shadow-lg transition-all duration-300 rounded-xl overflow-hidden group">
                        <figure>
                            <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                                alt="Historia" class="group-hover:scale-105 transition-transform duration-500" />
                        </figure>
                        <div class="card-body p-6">
                            <h2 class="card-title text-moradoprin">Historia</h2>
                            <p class="text-gray-600 text-sm">Explora los orígenes y la trayectoria de nuestra cofradía a lo
                                largo de los años.</p>
                            <div class="card-actions justify-end mt-4">
                                <button class="btn-transparente font-bold">Leer más</button>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta 2 -->
                    <div
                        class="card bg-white shadow-md hover:shadow-lg transition-all duration-300 rounded-xl overflow-hidden group">
                        <figure>
                            <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                                alt="Patrimonio" class="group-hover:scale-105 transition-transform duration-500" />
                        </figure>
                        <div class="card-body p-6">
                            <h2 class="card-title text-moradoprin">Patrimonio</h2>
                            <p class="text-gray-600 text-sm">Conoce el valor artístico y devocional de nuestros pasos y
                                enseres procesionales.</p>
                            <div class="card-actions justify-end mt-4">
                                <button class="btn-transparente font-bold">Leer más</button>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta 3 -->
                    <div
                        class="card bg-white shadow-md hover:shadow-lg transition-all duration-300 rounded-xl overflow-hidden group">
                        <figure>
                            <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                                alt="Instrumentos" class="group-hover:scale-105 transition-transform duration-500" />
                        </figure>
                        <div class="card-body p-6">
                            <h2 class="card-title text-moradoprin">Instrumentos</h2>
                            <p class="text-gray-600 text-sm">Nuestra sección de instrumentos que pone alma y ritmo a cada
                                procesión.</p>
                            <div class="card-actions justify-end mt-4">
                                <button class="btn-transparente font-bold">Leer más</button>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta 4 -->
                    <div
                        class="card bg-white shadow-md hover:shadow-lg transition-all duration-300 rounded-xl overflow-hidden group">
                        <figure>
                            <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                                alt="Virgen" class="group-hover:scale-105 transition-transform duration-500" />
                        </figure>
                        <div class="card-body p-6">
                            <h2 class="card-title text-moradoprin text-lg">Virgen de la Asunción</h2>
                            <p class="text-gray-600 text-sm">Dedicación y culto a nuestra titular, centro de nuestra fe y
                                tradición.</p>
                            <div class="card-actions justify-end mt-4">
                                <button class="btn-transparente font-bold">Leer más</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




    @endguest



</x-app-layout>
