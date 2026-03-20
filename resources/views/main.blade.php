<x-app-layout>
    <!-- Portada -->
    <div class="relative h-64 md:h-80 w-full flex items-center justify-center overflow-hidden mb-10">
        <img src="{{ asset('images/portada2.jpg') }}"
            class="absolute inset-0 w-full h-full object-cover filter grayscale" />
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="relative text-center text-neutral-content px-4">
            <h1 class="mb-6 md:mb-2 text-2xl sm:text-3xl pt-6 md:text-5xl font-bold">
                Cofradía de Nuestra Señora de la Asunción<br class="hidden sm:block"> y Llegada de Jesús al Calvario
            </h1>
            
        </div>
    </div>

    <!-- Sección de noticias -->
    <section class="max-w-7xl mx-auto px-4 py-8 md:py-12">
        <h1 class=" font-bold text-moradoprin mb-2 text-3xl md:text-4xl lg:text-5xl text-center">Últimas noticias</h1>
        <hr class="border-t-2 border-orange-600 w-24 mx-auto mb-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-8">

            <!-- Zona de noticias -->
            <div class="md:col-span-8 lg:col-span-9 flex flex-col space-y-4 md:space-y-6">
                @include('partials.noticias-main')
            </div>
            

            <!-- Zona de agenda -->
            <div class="md:col-span-4 lg:col-span-3 bg-gray-100 rounded-xl p-4 md:p-6 shadow-inner border border-gray-200">
                <h2 class="text-moradoprin font-bold text-xl md:text-2xl mb-4 md:mb-6 text-center">Agenda</h2>
                <div class="space-y-2">
                    <!-- Evento 1 -->
                    <div class="flex items-center space-x-4">
                        <div class="bg-moradoprin text-white rounded-lg flex flex-col items-center justify-center min-w-14 h-14 p-1 shadow-md shrink-0">
                            <span class="text-lg font-bold leading-none">6</span>
                            <span class="text-xs uppercase">Mar</span>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 leading-tight">Bendición de hábitos</p>
                            <p class="text-gray-500 text-xs">P. Ntra Sra de la Asunción</p>
                            <p class="text-gray-500 text-xs">20:00h</p>
                        </div>
                    </div>
                     <!-- Evento 2 -->
                    
                         <div class="flex items-center space-x-4">
                        <div class="bg-moradoprin text-white rounded-lg flex flex-col items-center justify-center min-w-14 h-14 p-1 shadow-md shrink-0">
                            <span class="text-lg font-bold leading-none">7</span>
                            <span class="text-xs uppercase">Mar</span>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 leading-tight">Exaltación Infantil</p>
                            <p class="text-gray-500 text-xs">Pabellón Principe Felipe</p>
                            <p class="text-gray-500 text-xs">17:00h</p>
                        </div>
                    </div>
                     <!-- Evento 3 -->
                    <div class="flex items-center space-x-4">
                        <div class="bg-moradoprin text-white rounded-lg flex flex-col items-center justify-center min-w-14 h-14 p-1 shadow-md shrink-0">
                            <span class="text-lg font-bold leading-none">8</span>
                            <span class="text-xs uppercase">Mar</span>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 leading-tight">Exaltación Adultos</p>
                            <p class="text-gray-500 text-xs">Pabellón Principe Felipe</p>
                            <p class="text-gray-500 text-xs">10:00h</p>
                        </div>
                    </div>
                     <!-- Evento 4 -->
                    <div class="flex items-center space-x-4">
                        <div class="bg-moradoprin text-white rounded-lg flex flex-col items-center justify-center min-w-14 h-14 p-1 shadow-md shrink-0">
                            <span class="text-lg font-bold leading-none">28</span>
                            <span class="text-xs uppercase">Mar</span>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 leading-tight">Pregón SS</p>
                            <p class="text-gray-500 text-xs">Santa Isabel de Portugal</p>
                            <p class="text-gray-500 text-xs">18:00h</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
      
    </section>

      <hr class="border-t-2 border-moradoprin mx-8 ">
    <!-- Sección La cofradía -->
    <section class="bg-gray-100 py-10 md:py-16 ">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class=" font-bold text-moradoprin text-center mb-2 text-3xl md:text-4xl lg:text-5xl">La cofradía</h1>
        <hr class="border-t-2 border-orange-600 w-24 mx-auto mb-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">

                <!-- Orígenes -->
                <div class="card bg-white shadow-md hover:shadow-lg transition-all duration-300 rounded-xl overflow-hidden group">
                    <figure class="overflow-hidden">
                        <img src="{{ asset('images/14_llegada_paz.jpg') }}" alt="Orígenes" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
                    </figure>
                    <div class="card-body p-4 md:p-6">
                        <h2 class="card-title text-xl text-moradoprin justify-center">Orígenes</h2>
                        <hr class="border-t border-orange-600 w-60 my-1 mx-auto">
                        <p class="text-gray-600 text-sm text-center">Conoce la historia y los inicios de nuestra cofradía desde 1953.</p>
                        <div class="card-actions justify-end mt-2 md:mt-4">
                            <a href="{{ route('cofradia') }}#origen" class="btn-transparente font-bold">Leer más</a>
                        </div>
                    </div>
                </div>

                <!-- Estandartes -->
                <div class="card bg-white shadow-md hover:shadow-lg transition-all duration-300 rounded-xl overflow-hidden group">
                    <figure class="overflow-hidden">
                        <img src="{{ asset('images/estandarte.jpg') }}" alt="Estandartes" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
                    </figure>
                    <div class="card-body p-4 md:p-6">
                        <h2 class="card-title text-xl text-moradoprin justify-center">Estandartes</h2>
                        <hr class="border-t border-orange-600 w-60 my-1 mx-auto">
                        <p class="text-gray-600 text-sm text-center">Descubre los estandartes y banderines que nos representan.</p>
                        <div class="card-actions justify-end mt-2 md:mt-4">
                            <a href="{{ route('cofradia') }}#estandartes" class="btn-transparente font-bold">Leer más</a>
                        </div>
                    </div>
                </div>

                <!-- Identidad -->
                <div class="card bg-white shadow-md hover:shadow-lg transition-all duration-300 rounded-xl overflow-hidden group">
                    <figure class="overflow-hidden">
                        <img src="{{ asset('images/escudo_.jpg') }}" alt="Identidad" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
                    </figure>
                    <div class="card-body p-4 md:p-6">
                        <h2 class="card-title text-xl text-moradoprin justify-center">Identidad</h2>
                        <hr class="border-t border-orange-600 w-60 my-1 mx-auto">
                        <p class="text-gray-600 text-sm text-center">Nuestro escudo, hábito y los símbolos que nos identifican.</p>
                        <div class="card-actions justify-end mt-2 md:mt-4">
                            <a href="{{ route('cofradia') }}#identidad" class="btn-transparente font-bold">Leer más</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Sección Únete -->
    <section class="bg-moradoprin py-16 text-white text-center">
        <div class="max-w-2xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">¿Quieres formar parte de nuestra cofradía?</h2>
            <hr class="border-t border-orange-600 mb-6 w-60 my-1 mx-auto">
            <p class="text-white/80 text-lg mb-8">Únete a nuestra familia y vive la Semana Santa desde dentro. Juntos mantenemos viva la tradición del barrio Oliver desde 1953.</p>
            <a href="{{ route('contacto') }}">
                <button class="bg-white text-moradoprin font-bold px-8 py-3 rounded-lg hover:bg-orange-600 hover:text-white transition-all duration-300">
                    Hazte hermano
                </button>
            </a>
        </div>
    </section>

</x-app-layout>