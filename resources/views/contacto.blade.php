<x-app-layout>
    <div class="bg-gray-100 min-h-screen pb-12">

        <h1 class="text-moradoprin font-bold text-3xl md:text-4xl lg:text-5xl text-center mb-4 pt-8">Contacto</h1>
          <hr class="border-t-2 border-orange-600 w-24 mx-auto mb-8">

        <div class="max-w-2xl mx-auto px-4">
            <form class="bg-white shadow-sm rounded-xl p-8 space-y-6">

                <div>
                    <label class="block text-moradoprin font-semibold mb-1">Nombre</label>
                    <input type="text" placeholder="Tu nombre" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-moradoprin">
                </div>

                <div>
                    <label class="block text-moradoprin font-semibold mb-1">Email</label>
                    <input type="email" placeholder="Tu email" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-moradoprin">
                </div>

                <div>
                    <label class="block text-moradoprin font-semibold mb-1">Asunto</label>
                    <input type="text" placeholder="Asunto" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-moradoprin">
                </div>

                <div>
                    <label class="block text-moradoprin font-semibold mb-1">Mensaje</label>
                    <textarea rows="5" placeholder="Escribe tu mensaje..." class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-moradoprin resize-none"></textarea>
                </div>

                <div class="text-right">
                    <button type="submit" class="bg-moradoprin text-white font-bold px-8 py-2 rounded-lg hover:bg-orange-600 transition-all duration-300">
                        Enviar
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- Botón Volver Flotante -->
    <a href="{{ route('main') }}"
       class="fixed bottom-6 left-6 bg-moradoprin text-white w-12 h-12 lg:w-14 lg:h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-orange-600 transition-all z-40">
        <i class="fa-solid fa-arrow-left text-lg lg:text-xl"></i>
    </a>
</x-app-layout>
