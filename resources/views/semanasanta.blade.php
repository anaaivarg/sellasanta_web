<x-app-layout>
    <div class="bg-gray-100 min-h-screen pb-12">

        <h1 class="text-moradoprin font-bold text-3xl md:text-4xl lg:text-5xl text-center mb-4 pt-8">Semana Santa</h1>
         <hr class="border-t-2 border-orange-600 w-24 mx-auto mb-8">

        <div class="max-w-5xl mx-auto px-4 space-y-16">

            <!-- Procesión 1 - Foto izquierda -->
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('images/cristo.jpg') }}" alt="Procesión 1"
                        class="w-full h-120 object-cover rounded-xl shadow-md" loading="lazy">
                </div>
                <div class="w-full md:w-1/2">
                    <h2 class="text-moradoprin font-bold text-3xl ">Domingo de Ramos</h2>
                    <h3 class="text-moradoprin  text-lg mb-3">Procesión de Palmas</h3>
                    <hr class="border-t-2 border-orange-600 w-16 mb-4">
                    <p class="text-gray-700 text-justify">
                        Tradicional procesión por las calles del barrio Oliver adyacentes a la parroquia de la
                        Coronación, se celebra desde el año 1988 y marca para la Cofradía su particular comienzo de la
                        Semana Santa.
                        <br>
                        Los cofrades participan en ella con hábito pero sin el tercerol y la Sección de Instrumentos no
                        cesa de tocar durante todo el recorrido, siendo acompañados por una gran cantidad de vecinos y
                        amigos del barrio.
                    </p>
                    <p class="text-sm italic text-gray-500 mt-3">Hora: 11:30</p>
                    <p class="text-sm italic text-gray-500 mt-1">Recorrido: Parroquia de la Coronación de la Virgen,
                        Plaza Teodora Lamadrid, Cetina, Mosén José Bosqued, Laguna Azorín, Teodora Lamadrid, Pilar
                        Aranda, Corredor Verde, Antonio de Leyva, Nobel, Pilar Aranda, Mosén José Bosqued, Cetina,
                        finalizando en la Parroquia de la Coronación de la Virgen.</p>
                </div>
            </div>

            <!-- Procesión 2 - Foto derecha -->
            <div class="flex flex-col md:flex-row-reverse items-center gap-8">
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('images/asuncion.jpg') }}" alt="Procesión 2"
                        class="w-full h-120 object-cover rounded-xl shadow-md" loading="lazy">
                </div>
                <div class="w-full md:w-1/2">
                    <h2 class="text-moradoprin font-bold text-3xl">Lunes Santo</h2>
                    <h3 class="text-moradoprin  text-lg mb-3">Via Crucis en Valdefierro</h3>
                    <hr class="border-t-2 border-orange-600 w-16 mb-4">
                    <p class="text-gray-700 text-justify">

                        En el año 2016 realizamos por primera vez un Vía Crucis por las calles del vecino barrio de
                        Valdefierro. Gracias a la inestimable ayuda del párroco de Nuestra Señora de Lourdes D. Jose
                        Luis, se hizo realidad una nueva procesión en nuestra Semana Santa.<br>
                        Como primer recorrido se hizo por las calles adyacentes a la parroquia, pero para posteriores
                        años y gracias a la gran acogida que ha tenido entre los vecinos del barrio, ha ido ampliando
                        este recorrido haciendolo más largo. </p>
                    <p class="text-sm italic text-gray-500 mt-3">Hora: 19:00h</p>
                    <p class="text-sm italic text-gray-500 mt-1">Recorrido: Parroquia de Nuestra Señora de Lourdes, Federico Ozanam, Orión, Aldebarán, Francisco Millán, Federico Ozanam, Plaza Inmaculada, finalizando en la Parroquia de Nuestra Señora de Lourdes.</p>
                </div>
            </div>

            <!-- Procesión 3 - Foto izquierda -->
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('images/14_llegada_paz.jpg') }}" alt="Procesión 3"
                        class="w-full h-120 object-cover rounded-xl shadow-md" loading="lazy">
                </div>
                <div class="w-full md:w-1/2">
                    <h2 class="text-moradoprin font-bold text-3xl">Miercoles Santo</h2>
                    <h3 class="text-moradoprin  text-lg mb-3">Via Crucis en Oliver</h3>
                    <hr class="border-t-2 border-orange-600 w-16 mb-4">
                    <p class="text-gray-700 text-justify">
                        Procesión establecida en el año 1994, supone un cambio sustanción en la Cofradía. Tradicionalmente y desde su fundación, la Cofradía realizaba el Vía Crucis y la bajada de pasos a San Cayetano en la noche del Jueves Santo. La Asamblea General tomó la decisión de dividir estas procesiones, estableciendo la realización de un Vía Crucis por las calles del barrio Oliver en la noche del Miércoles Santo.
                    </p>
                    <p class="text-sm italic text-gray-500 mt-3">Hora: 21:30h</p>
                    <p class="text-sm italic text-gray-500 mt-1">Recorrido: Parroquia de la Coronación de la Virgen, Plaza Teodora Lamadrid, Cetina, Mosén José Bosqued, Emilio Laguna Azorín, Teodora Lamadrid, Pilar Aranda, Lope de Vega, Séneca, Anillo Verde Zaragoza, Antonio Leyva, Artigas, P. Poter, J. Cancer, Villalpando, Antonio Leyva, Alfredo Nobel, Séneca, Lope de Vega, Pilar Aranda, Mosén José Bosqued, Cetina, a finalizar en la Parroquia de la Coronación de la Virgen.</p>
                </div>
            </div>

             <!-- Procesión 4 - Foto derecha -->
            <div class="flex flex-col md:flex-row-reverse items-center gap-8">
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('images/asuncion.jpg') }}" alt="Procesión 2"
                        class="w-full h-120 object-cover rounded-xl shadow-md" loading="lazy">
                </div>
                <div class="w-full md:w-1/2">
                    <h2 class="text-moradoprin font-bold text-3xl">Jueves Santo</h2>
                    <h3 class="text-moradoprin  text-lg mb-3">Procesión titular</h3>
                    <hr class="border-t-2 border-orange-600 w-16 mb-4">
                    <p class="text-gray-700 text-justify">

                       La procesión desde la parroquia de La Coronación hasta la Iglesia de Santa Isabel de Portugal (San Cayetano) en la noche del Jueves Santo, es una de las de mayor recorrido de toda la Semana Santa de Zaragoza.<br>
                       Destacar en esta procesión que, además de todos los cofrades vestidos con sus hábitos, la Cofradía es acompañada por las calles de Zaragoza por innumerables vecinos del barrio Oliver, amigos y familiares de estos cofrades. </p>
                    <p class="text-sm italic text-gray-500 mt-3">Hora: 21:00h</p>
                    <p class="text-sm italic text-gray-500 mt-1">Recorrido: Parroquia de la Coronación de la Virgen, Plaza Teodora Lamadrid, Cetina, Mosén José Bosqued, Pilar Aranda, Nobel, Vía Hispanidad, Avda. Madrid (2 carriles), Portillo, Conde Aranda (2 carriles), César Augusto (lado sin vías tranvía), Manifestación, Plaza del Justicia, finalizando en la Iglesia de Santa Isabel de Portugal. (Hora aproximada de llegada: 00:40 horas).<br>
                        <br>En caso de no poder celebrar la procesión el Jueves Santo por inclemencias del tiempo según lo previsto, se pospondría su salida al Viernes Santo a las 11:00 horas.</p>
                </div>
            </div>

             <!-- Procesión 3 - Foto izquierda -->
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('images/14_llegada_paz.jpg') }}" alt="Procesión 3"
                        class="w-full h-150 object-cover rounded-xl shadow-md" loading="lazy">
                </div>
                <div class="w-full md:w-1/2">
                    <h2 class="text-moradoprin font-bold text-3xl">Viernes Santo</h2>
                    <h3 class="text-moradoprin  text-lg mb-3">Santo Entierro</h3>
                    <hr class="border-t-2 border-orange-600 w-16 mb-4">
                    <p class="text-gray-700 text-justify">
                        Organizada por la Hermandad de la Sangre de Cristo, es la procesión más completa y larga de toda España. No hay ningún lugar en nuestra geografía que cuente con tantos cofrades unidos y tantos pasos representando la Pasión de Cristo prácticamente en su totalidad.
                        <br>Abnegación y seriedad son sus mayores atributos. En el desfile de la tarde del Viernes Santo participarán veintitrés cofradías con un total de cuarenta y cuatro pasos y peanas. Indudablemente asistimos al momento cumbre de la Semana Santa de Zaragoza.                    </p>
                    <p class="text-sm italic text-gray-500 mt-3">Hora: 18:00h</p>
                    <p class="text-sm italic text-gray-500 mt-1">Plaza del Justicia, Manifestación, Murallas Romanas, cruzar Salduba, Pza. del Pilar (lado antiguos juzgados) a bajar a la fachada de la Basílica a la altura de Jardiel, Plaza del Pilar (lado Ayuntamiento), Plaza de la Seo, Plaza San Bruno, Sepulcro, San Vicente de Paúl, Mayor, Refugio, San Jorge, San Vicente de Paúl, Coso, Santa Catalina, Pza. los Sitios, Costa, Pza. Santa Engracia (por el centro), Paseo Independencia (por la acera en dirección a Pza. Aragón), cruzar Pº Independencia a la altura de calle Bruil por el paso de peatones, Albareda, Bilbao, Casa Jiménez, Pº Independencia (por la acera en dirección a Pza. España), Pza. España (dejando el monumento a los Innumerables Mártires a la izquierda), Coso, Don Jaime I, Espoz y Mina, Manifestación, Plaza del Justicia, finalizando en la Iglesia de Santa Isabel de Portugal.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- Botón Volver Flotante -->
    <a href="{{ route('main') }}"
       class="fixed bottom-6 left-6 bg-moradoprin text-white w-12 h-12 lg:w-14 lg:h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-orange-600 transition-all z-40">
        <i class="fa-solid fa-arrow-left text-lg lg:text-xl"></i>
    </a>
</x-app-layout>