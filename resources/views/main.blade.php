<x-layouts.layout>
    <div class="relative h-80 w-full flex items-center justify-center overflow-hidden mb-10">
        <!-- Imagen en blanco y negro -->
        <img src="{{ asset('images/portada2.jpg') }}" class="absolute inset-0 w-full h-full object-cover filter grayscale" />


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

    <section class="bg-white p-4">
        <h1 class="mb-6 font-bold text-moradoprin text-5xl">Últimas noticias</h1>
        <div class="grid grid-cols-12 gap-4">
            <!-- Zona de noticias: ocupa 9 columnas -->
            <div class="col-span-9 flex flex-col space-y-4">
                <div class="flex space-x-4">
                    <div class="card card-side bg-white shadow-sm flex-1">
                        <figure>
                            <img
                                src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
                                alt="Movie" />
                        </figure>
                        <div class="card-body">
                            <h2 class="text-moradoprin text-xl font-bold">Titulo noticia uno</h2>
                            <p class="text-gray-700">14-05-2025</p>
                            <p class="text-moradoprin">Esto es un texto de prueba para la noticia tiriririr.</p>
                            <div class="card-actions justify-end">
                                <button class="btn-transparente">Leer más</button>
                            </div>
                        </div>
                    </div>
                    <div class="card card-side bg-white shadow-sm flex-1">
                        <figure>
                            <img
                                src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
                                alt="Movie" />
                        </figure>
                        <div class="card-body">
                            <h2 class="text-moradoprin text-xl font-bold">Titulo noticia dos</h2>
                            <p class="text-gray-700">14-05-2025</p>
                            <p class="text-moradoprin">Esto es otro texto de prueba para la noticia.</p>
                            <div class="card-actions justify-end">
                                <button class="btn-transparente">Leer más</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Zona de agenda: ocupa 3 columnas -->
            <div class="col-span-3 bg-gray-200 rounded p-4 flex flex-col items-center">
                <h2 class="text-moradoprin font-bold text-2xl mb-4">Agenda</h2>
                <div class="flex items-center space-x-4">
                    <div class="bg-moradoprin text-white rounded-lg flex flex-col items-center justify-center w-16 h-16 text-center mb-3">
                        <span class="text-lg font-bold">15</span>
                        <span class="text-sm">Sept</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Nombre del evento</p>
                        <p class="text-gray-500 text-sm">Lugar del evento</p>
                    </div>
                </div>

                <!-- Evento 2 -->
                <div class="flex items-center space-x-4">
                    <div class="bg-moradoprin text-white rounded-lg flex flex-col items-center justify-center w-16 h-16 text-center p-2 mb-3">
                        <span class="text-lg font-bold">15</span>
                        <span class="text-sm">Sept</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Nombre del evento</p>
                        <p class="text-gray-500 text-sm">Lugar del evento</p>
                    </div>
                </div>

                <!-- Evento 3 -->
                <div class="flex items-center space-x-4">
                    <div class="bg-moradoprin text-white rounded-lg flex flex-col items-center justify-center w-16 h-16 text-center p-2 ">
                        <span class="text-lg font-bold">15</span>
                        <span class="text-sm">Sept</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Nombre del evento</p>
                        <p class="text-gray-500 text-sm">Lugar del evento</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-200 p-4 mt-10">
        <h1 class="mb-6 font-bold text-moradoprin text-5xl">La cofradía</h1>
        <div class="grid grid-cols-4 gap-4">
            <!-- Tarjeta 1 -->
            <div class="card bg-base-100 shadow-sm">
                <figure>
                    <img
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                        alt="Shoes" />
                </figure>
                <div class=" card-body bg-white text-black">
                    <h2 class="card-title">Historia</h2>
                    <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                    <div class="card-actions justify-end">
                        <button class="btn-transparente">Leer más</button>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2 -->
            <div class="card bg-base-100 shadow-sm">
                <figure>
                    <img
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                        alt="Shoes" />
                </figure>
                <div class="card-body bg-white text-black">
                    <h2 class="card-title">Patrimonio</h2>
                    <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                    <div class="card-actions justify-end">
                        <button class="btn-transparente">Leer más</button>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3 -->
            <div class="card bg-base-100 shadow-sm">
                <figure>
                    <img
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                        alt="Shoes" />
                </figure>
                <div class="card-body bg-white text-black">
                    <h2 class="card-title">Seccion de instrumentos</h2>
                    <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                    <div class="card-actions justify-end">
                        <button class="btn-transparente">Leer más</button>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 4 -->
            <div class="card bg-base-100 shadow-sm">
                <figure>
                    <img
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                        alt="Shoes" />
                </figure>
                <div class="card-body bg-white text-black">
                    <h2 class="card-title">Virgen de la Asunción</h2>
                    <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                    <div class="card-actions justify-end">
                        <button class="btn-transparente">Leer más</button>
                    </div>
                </div>
            </div>
        </div>
    </section>



    </section>








</x-layouts.layout>
