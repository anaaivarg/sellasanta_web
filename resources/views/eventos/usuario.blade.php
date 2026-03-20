<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-4 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="bg-moradoprin p-4 lg:p-8 text-white rounded-t-2xl shadow-xl">
                <h1 class="text-xl lg:text-3xl font-bold mb-2">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span class="hidden lg:inline">Calendario de Eventos</span>
                    <span class="lg:hidden">Eventos</span>
                </h1>
                <p class="text-white/90 text-xs lg:text-base">Consulta ensayos, misas y eventos de la cofradía</p>
            </div>

            <!-- Leyenda de colores -->
            <div class="bg-white p-3 lg:p-4 border-b-2 border-gray-200">
                <div class="flex flex-wrap gap-2 lg:gap-4 items-center text-xs lg:text-sm">
                    <span class="font-semibold text-gray-700 hidden lg:inline">Tipos de eventos:</span>
                    <div class="flex items-center gap-1 lg:gap-2">
                        <span class="w-2 h-2 lg:w-3 lg:h-3 rounded bg-orange-600"></span>
                        <span class="text-black">Ensayo</span>
                    </div>
                    <div class="flex items-center gap-1 lg:gap-2">
                        <span class="w-2 h-2 lg:w-3 lg:h-3 rounded bg-purple-700"></span>
                        <span class="text-black">Misa</span>
                    </div>
                    <div class="flex items-center gap-1 lg:gap-2">
                        <span class="w-2 h-2 lg:w-3 lg:h-3 rounded bg-red-600"></span>
                        <span class="text-black">Procesión</span>
                    </div>
                    <div class="flex items-center gap-1 lg:gap-2">
                        <span class="w-2 h-2 lg:w-3 lg:h-3 rounded bg-blue-600"></span>
                        <span class="text-black">Reunión</span>
                    </div>
                    <div class="flex items-center gap-1 lg:gap-2">
                        <span class="w-2 h-2 lg:w-3 lg:h-3 rounded bg-green-600"></span>
                        <span class="text-black">Acto</span>
                    </div>
                </div>
            </div>

            <!-- VISTA MÓVIL: Lista de eventos -->
            <div class="lg:hidden bg-white rounded-b-2xl shadow-xl overflow-hidden">
                <div class="p-4">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">
                        <i class="fa-solid fa-list"></i> Próximos Eventos
                    </h2>
                    <div id="eventos-lista" class="space-y-3">
                        <p class="text-center text-gray-500 py-8">Cargando eventos...</p>
                    </div>
                </div>
            </div>

            <!-- VISTA PC: Calendario -->
            <div class="hidden lg:block bg-white p-6 rounded-b-2xl shadow-xl text-black">
                <div id="calendar"></div>
            </div>
        </div>
    </div>

    <!-- ✅ Botón Volver Flotante -->
    <a href="{{ route('dashboard') }}" 
       class="fixed bottom-6 left-6 bg-moradoprin text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-purple-800 transition-all z-40">
        <i class="fa-solid fa-arrow-left text-xl"></i>
    </a>

    <!-- Modal detalle evento -->
    <div id="eventoModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-4 lg:p-8 border w-11/12 max-w-sm lg:max-w-md shadow-2xl rounded-2xl bg-white">
            <div class="flex justify-between items-center mb-4 lg:mb-6">
                <h3 class="text-lg lg:text-2xl font-bold text-gray-900" id="modalTitulo">Detalle del Evento</h3>
                <button onclick="cerrarModal()" class="text-gray-400 hover:text-gray-600 text-xl lg:text-2xl">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>

            <div class="space-y-3 lg:space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        <i class="fa-solid fa-tag"></i> Tipo
                    </label>
                    <p id="modalTipo" class="px-3 py-2 bg-gray-50 rounded-lg text-sm text-gray-800"></p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        <i class="fa-solid fa-calendar"></i> Fecha
                    </label>
                    <p id="modalFecha" class="px-3 py-2 bg-gray-50 rounded-lg text-sm text-gray-800"></p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        <i class="fa-solid fa-clock"></i> Hora
                    </label>
                    <p id="modalHora" class="px-3 py-2 bg-gray-50 rounded-lg text-sm text-gray-800"></p>
                </div>

                <div id="modalDescripcionContainer" class="hidden">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        <i class="fa-solid fa-info-circle"></i> Descripción
                    </label>
                    <p id="modalDescripcion" class="px-3 py-2 bg-gray-50 rounded-lg text-sm"></p>
                </div>
            </div>

            <div class="mt-6 flex flex-col gap-2">
                <button id="btnGenerarQR" onclick="irAGenerarQR()" 
                    class="hidden w-full bg-moradoprin text-white px-4 py-3 rounded-xl font-semibold hover:bg-purple-800 transition-all text-sm">
                    <i class="fa-solid fa-qrcode mr-2"></i> Generar QR
                </button>
                
                <button onclick="cerrarModal()" 
                    class="w-full bg-gray-500 text-white px-4 py-3 rounded-xl font-semibold hover:bg-gray-600 transition-all text-sm">
                    Cerrar
                </button>
            </div>
        </div>
    </div>

    <!-- Modal QR -->
    <div id="qrModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-4 lg:p-8 border w-11/12 max-w-sm lg:max-w-md shadow-2xl rounded-2xl bg-white">
            <div class="flex justify-between items-center mb-4 lg:mb-6">
                <h3 class="text-lg lg:text-2xl font-bold text-gray-900">Tu Código QR</h3>
                <button onclick="cerrarQRModal()" class="text-gray-400 hover:text-gray-600 text-xl lg:text-2xl">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>

            <div class="flex flex-col items-center">
                <div id="qr-container" class="bg-white p-4 rounded-lg shadow-inner mb-4 min-h-[250px] flex items-center justify-center">
                    <p class="text-gray-500">Generando QR...</p>
                </div>

                <div class="bg-orange-50 border-l-4 border-orange-500 p-3 mb-4 w-full">
                    <p class="text-xs text-orange-800">
                        <i class="fa-solid fa-info-circle"></i>
                        Muestra este código al responsable para registrar tu asistencia
                    </p>
                </div>

                <button onclick="cerrarQRModal()" 
                    class="w-full bg-gray-500 text-white px-4 py-3 rounded-xl font-semibold hover:bg-gray-600 transition-all text-sm">
                    Cerrar
                </button>
            </div>
        </div>
    </div>

    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css' rel='stylesheet' />

    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/locales/es.global.min.js'></script>

    <script>
        let calendar;
        let eventoActual = null;

        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');

            // Solo inicializar calendario en vista desktop
            if (window.innerWidth >= 1024) {
                calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'es',
                    firstDay: 1,
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: ''
                    },
                    buttonText: {
                        today: 'Hoy'
                    },
                    height: 'auto',
                    events: '/eventos/data',
                    eventClick: function(info) {
                        mostrarDetalleEvento(info.event);
                    }
                });

                calendar.render();
            }

            // Cargar lista de eventos para móvil
            if (window.innerWidth < 1024) {
                cargarListaEventos();
            }
        });

        function cargarListaEventos() {
            fetch('/eventos/data')
                .then(response => response.json())
                .then(eventos => {
                    mostrarListaEventos(eventos);
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('eventos-lista').innerHTML = 
                        '<p class="text-center text-red-500 py-8">Error al cargar eventos</p>';
                });
        }

        function mostrarListaEventos(eventos) {
            const lista = document.getElementById('eventos-lista');
            const hoy = new Date();
            hoy.setHours(0, 0, 0, 0);
            
            // Filtrar solo eventos futuros y ordenar
            const eventosFuturos = eventos
                .filter(e => new Date(e.start) >= hoy)
                .sort((a, b) => new Date(a.start) - new Date(b.start))
                .slice(0, 10); // Mostrar solo los próximos 10

            if (eventosFuturos.length === 0) {
                lista.innerHTML = '<p class="text-center text-gray-500 py-8">No hay eventos próximos</p>';
                return;
            }

            const colores = {
                'Ensayo': 'border-orange-500',
                'Misa': 'border-purple-700',
                'Procesión': 'border-red-600',
                'Reunión': 'border-blue-600',
                'Acto': 'border-green-600'
            };

            lista.innerHTML = eventosFuturos.map(evento => `
                <div onclick='mostrarDetalleEventoMovil(${JSON.stringify(evento).replace(/'/g, "&apos;")})' 
                     class="bg-white border-l-4 ${colores[evento.extendedProps.tipo] || 'border-gray-400'} p-3 rounded-lg shadow hover:shadow-md transition-shadow cursor-pointer">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 text-sm">${evento.title}</h3>
                            <p class="text-xs text-gray-600 mt-1">
                                <i class="fa-solid fa-calendar"></i> 
                                ${new Date(evento.start).toLocaleDateString('es-ES', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}
                            </p>
                            ${evento.extendedProps.hora ? `
                                <p class="text-xs text-gray-600">
                                    <i class="fa-solid fa-clock"></i> ${evento.extendedProps.hora.substring(0, 5)}
                                </p>
                            ` : ''}
                            ${evento.extendedProps.descripcion ? `
                                <p class="text-xs text-gray-500 mt-1">${evento.extendedProps.descripcion}</p>
                            ` : ''}
                        </div>
                        <i class="fa-solid fa-chevron-right text-gray-400"></i>
                    </div>
                </div>
            `).join('');
        }

        function mostrarDetalleEventoMovil(evento) {
            eventoActual = {
                id: evento.id,
                title: evento.title,
                startStr: evento.start,
                extendedProps: evento.extendedProps
            };
            mostrarDetalleEvento(eventoActual);
        }

        function mostrarDetalleEvento(evento) {
            eventoActual = evento;
            
            document.getElementById('modalTipo').textContent = evento.extendedProps.tipo;
            document.getElementById('modalFecha').textContent = new Date(evento.startStr).toLocaleDateString('es-ES', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            
            const hora = evento.extendedProps.hora;
            document.getElementById('modalHora').textContent = hora ? hora.substring(0, 5) : 'No especificada';
            
            // Mostrar/ocultar descripción
            const descripcionContainer = document.getElementById('modalDescripcionContainer');
            if (evento.extendedProps.descripcion) {
                document.getElementById('modalDescripcion').textContent = evento.extendedProps.descripcion;
                descripcionContainer.classList.remove('hidden');
            } else {
                descripcionContainer.classList.add('hidden');
            }

            // Mostrar botón QR solo si es Ensayo y el usuario tiene sección
            const btnQR = document.getElementById('btnGenerarQR');
            @if(auth()->user()->Seccion && auth()->user()->Participante === 'SI')
                if (evento.extendedProps.tipo === 'Ensayo') {
                    btnQR.classList.remove('hidden');
                } else {
                    btnQR.classList.add('hidden');
                }
            @else
                btnQR.classList.add('hidden');
            @endif

            document.getElementById('eventoModal').classList.remove('hidden');
        }

        function cerrarModal() {
            document.getElementById('eventoModal').classList.add('hidden');
        }

        function irAGenerarQR() {
            if (eventoActual) {
                window.location.href = `/eventos/${eventoActual.id}/qr`;
            }
        }

        function cerrarQRModal() {
            document.getElementById('qrModal').classList.add('hidden');
        }
    </script>
</x-app-layout>