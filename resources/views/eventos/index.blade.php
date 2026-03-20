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
                <p class="text-white/90 text-xs lg:text-base">Gestiona ensayos, misas y eventos de la cofradía</p>
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

  <!-- Botón Volver Flotante -->
<a href="{{ route('dashboard') }}"
    class="fixed bottom-6 left-6 bg-moradoprin text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-purple-800 transition-all z-[60]">
    <i class="fa-solid fa-arrow-left text-xl"></i>
</a>

<!-- Botón Crear Evento Flotante (solo móvil) -->
<button onclick="abrirModalCrear(new Date().toISOString().split('T')[0])"
    class="lg:hidden fixed bottom-6 right-6 bg-orange-600 text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-orange-700 transition-all z-[60]">
    <i class="fa-solid fa-plus text-2xl"></i>
</button>

    <!-- Modal para crear/editar evento -->
    <div id="eventoModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-4 lg:p-8 border w-11/12 max-w-sm lg:max-w-md shadow-2xl rounded-2xl bg-white">
            <div class="flex justify-between items-center mb-4 lg:mb-6">
                <h3 class="text-lg lg:text-2xl font-bold text-gray-900" id="modalTitle">Crear Evento</h3>
                <button onclick="cerrarModal()" class="text-gray-400 hover:text-gray-600 text-xl lg:text-2xl">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>

            <form id="eventoForm" class="space-y-3 lg:space-y-4">
                @csrf
                <input type="hidden" id="eventoId">

                <div>
                    <label for="fecha" class="block text-gray-700 font-semibold mb-1 text-sm">
                        <i class="fa-solid fa-calendar"></i> Fecha
                    </label>
                    <input type="date" id="fecha" name="fecha"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                        required>
                </div>

                <div>
                    <label for="hora" class="block text-gray-700 font-semibold mb-1 text-sm">
                        <i class="fa-solid fa-clock"></i> Hora
                    </label>
                    <input type="time" id="hora" name="hora"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                        required>
                </div>

                <div>
                    <label for="tipo" class="block text-gray-700 font-semibold mb-1 text-sm">
                        <i class="fa-solid fa-tag"></i> Tipo de Evento
                    </label>
                    <select id="tipo" name="tipo"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                        required>
                        <option value="">Seleccione un tipo...</option>
                        <option value="Ensayo">Ensayo</option>
                        <option value="Misa">Misa</option>
                        <option value="Procesión">Procesión</option>
                        <option value="Reunión">Reunión</option>
                        <option value="Acto">Acto</option>
                        <option value="General">General</option>
                    </select>
                </div>

                <div>
                    <label for="descripcion" class="block text-gray-700 font-semibold mb-1 text-sm">
                        <i class="fa-solid fa-pen"></i> Descripción
                    </label>
                    <textarea id="descripcion" name="descripcion" rows="2"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                        placeholder="Descripción del evento (opcional)"></textarea>
                </div>

                <div>
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" id="general" name="general"
                            class="w-4 h-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                        <span class="ml-2 text-gray-700 font-semibold text-sm">
                            <i class="fa-solid fa-users"></i> Evento general
                        </span>
                    </label>
                </div>

                <div class="flex flex-col lg:flex-row gap-2 lg:gap-3">
                    <button type="button" onclick="cerrarModal()"
                        class="flex-1 bg-gray-500 text-white px-4 py-2.5 rounded-xl font-semibold hover:bg-gray-600 transition-all text-sm">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="flex-1 bg-orange-600 text-white px-4 py-2.5 rounded-xl font-semibold hover:bg-orange-700 transition-all text-sm">
                        <i class="fa-solid fa-save"></i> Guardar
                    </button>
                </div>
            </form>

            <button id="btnEliminar" onclick="eliminarEvento()"
                class="hidden w-full mt-3 bg-red-600 text-white px-4 py-2.5 rounded-xl font-semibold hover:bg-red-700 transition-all text-sm">
                <i class="fa-solid fa-trash"></i> Eliminar Evento
            </button>
        </div>
    </div>

    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/locales/es.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let calendar;
        let eventoSeleccionado = null;

        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');

            // Solo inicializar calendario en desktop
            if (window.innerWidth >= 1024) {
                calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'es',
                    firstDay: 1,
                    headerToolbar: {
                        left: 'prev,next',
                        center: 'title',
                        right: 'today'
                    },
                    buttonText: {
                        today: 'Hoy'
                    },
                    height: 'auto',
                    events: '/eventos/data',
                    eventContent: function (arg) {
                        let hora = arg.event.extendedProps.hora;
                        let title = arg.event.title;
                        if (hora) {
                            return {
                                html: `<div class="fc-content"><b>${hora.substring(0, 5)}</b> - ${title}</div>`
                            };
                        }
                    },
                    dateClick: function (info) {
                        abrirModalCrear(info.dateStr);
                    },
                    eventClick: function (info) {
                        abrirModalEditar(info.event);
                    },
                    editable: true,
                    eventDrop: function (info) {
                        actualizarFechaEvento(info.event);
                    }
                });
                calendar.render();
            }

            // Cargar lista de eventos para móvil
            if (window.innerWidth < 1024) {
                cargarListaEventos();
            }

            document.getElementById('eventoForm').addEventListener('submit', function (e) {
                e.preventDefault();
                guardarEvento();
            });
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
            
            const eventosFuturos = eventos
                .filter(e => new Date(e.start) >= hoy)
                .sort((a, b) => new Date(a.start) - new Date(b.start))
                .slice(0, 20);

            if (eventosFuturos.length === 0) {
                lista.innerHTML = '<p class="text-center text-gray-500 py-8">No hay eventos próximos</p>';
                return;
            }

            const colores = {
                'Ensayo': 'border-orange-600',
                'Misa': 'border-purple-700',
                'Procesión': 'border-red-600',
                'Reunión': 'border-blue-600',
                'Acto': 'border-green-600',
                'General': 'border-gray-600'
            };

            lista.innerHTML = eventosFuturos.map(evento => `
                <div onclick='abrirModalEditarMovil(${JSON.stringify(evento).replace(/'/g, "&apos;")})' 
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

        function abrirModalEditarMovil(evento) {
            eventoSeleccionado = {
                id: evento.id,
                title: evento.title,
                startStr: evento.start,
                extendedProps: evento.extendedProps
            };
            abrirModalEditar(eventoSeleccionado);
        }

        function abrirModalCrear(fecha) {
            eventoSeleccionado = null;
            document.getElementById('modalTitle').textContent = 'Crear Evento';
            document.getElementById('eventoForm').reset();
            document.getElementById('fecha').value = fecha;
            document.getElementById('btnEliminar').classList.add('hidden');
            document.getElementById('eventoModal').classList.remove('hidden');
        }

        function abrirModalEditar(evento) {
            eventoSeleccionado = evento;
            document.getElementById('modalTitle').textContent = 'Editar Evento';
            document.getElementById('eventoId').value = evento.id;
            document.getElementById('fecha').value = evento.startStr;
            document.getElementById('hora').value = evento.extendedProps.hora || '';
            document.getElementById('tipo').value = evento.extendedProps.tipo;
            document.getElementById('descripcion').value = evento.extendedProps.descripcion || '';
            document.getElementById('general').checked = evento.extendedProps.general === 'SI';
            document.getElementById('btnEliminar').classList.remove('hidden');
            document.getElementById('eventoModal').classList.remove('hidden');
        }

        function cerrarModal() {
            document.getElementById('eventoModal').classList.add('hidden');
            document.getElementById('eventoForm').reset();
            eventoSeleccionado = null;
        }

        async function guardarEvento() {
            const formData = {
                fecha: document.getElementById('fecha').value,
                tipo: document.getElementById('tipo').value,
                hora: document.getElementById('hora').value,
                descripcion: document.getElementById('descripcion').value,
                general: document.getElementById('general').checked ? 'SI' : 'NO'
            };

            const url = eventoSeleccionado ? `/eventos/${eventoSeleccionado.id}` : '/eventos';
            const method = eventoSeleccionado ? 'PUT' : 'POST';

            try {
                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content ||
                            document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify(formData)
                });

                const data = await response.json();

                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: data.message,
                        confirmButtonColor: '#ea580c'
                    });

                    if (calendar) calendar.refetchEvents();
                    if (window.innerWidth < 1024) cargarListaEventos();
                    cerrarModal();
                } else {
                    throw new Error(data.message || 'Error al guardar');
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: error.message,
                    confirmButtonColor: '#ea580c'
                });
            }
        }

        async function eliminarEvento() {
            const result = await Swal.fire({
                title: '¿Eliminar evento?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            });

            if (result.isConfirmed) {
                try {
                    const response = await fetch(`/eventos/${eventoSeleccionado.id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content ||
                                document.querySelector('input[name="_token"]').value
                        }
                    });

                    const data = await response.json();

                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            text: data.message,
                            confirmButtonColor: '#ea580c'
                        });

                        if (calendar) calendar.refetchEvents();
                        if (window.innerWidth < 1024) cargarListaEventos();
                        cerrarModal();
                    }
                } catch (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al eliminar el evento',
                        confirmButtonColor: '#ea580c'
                    });
                }
            }
        }

        async function actualizarFechaEvento(evento) {
            try {
                const response = await fetch(`/eventos/${evento.id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content ||
                            document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({
                        fecha: evento.startStr,
                        tipo: evento.extendedProps.tipo,
                        hora: evento.extendedProps.hora,
                        descripcion: evento.extendedProps.descripcion,
                        general: evento.extendedProps.general
                    })
                });

                const data = await response.json();
                if (!data.success) evento.revert();
            } catch (error) {
                evento.revert();
            }
        }
    </script>
</x-app-layout>