<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="bg-moradoprin p-8 text-white rounded-t-2xl shadow-xl">
                <h1 class="text-3xl font-bold mb-2">
                    <i class="fa-solid fa-calendar-days"></i>
                    Calendario de Eventos
                </h1>
                <p class="text-white/90">Gestiona ensayos, misas y eventos de la cofradía</p>
            </div>

            <!-- Leyenda de colores -->
            <div class="bg-white p-4 border-b-2 border-gray-200">
                <div class="flex flex-wrap gap-4 items-center">
                    <span class="text-sm font-semibold text-gray-700">Tipos de eventos:</span>
                    <div class="flex items-center gap-2">
                        <span class="w-4 h-4 rounded bg-orange-600"></span>
                        <span class="text-sm">Ensayo</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-4 h-4 rounded bg-purple-700"></span>
                        <span class="text-sm">Misa</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-4 h-4 rounded bg-red-600"></span>
                        <span class="text-sm">Procesión</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-4 h-4 rounded bg-blue-600"></span>
                        <span class="text-sm">Reunión</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-4 h-4 rounded bg-green-600"></span>
                        <span class="text-sm">Acto</span>
                    </div>
                </div>
            </div>

            <!-- Calendario -->
            <div class="bg-white p-6 rounded-b-2xl shadow-xl">
                <div id="calendar"></div>
            </div>
        </div>
    </div>

    <!-- Modal para crear/editar evento -->
    <div id="eventoModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-8 border w-full max-w-md shadow-2xl rounded-2xl bg-white">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-900" id="modalTitle">Crear Evento</h3>
                <button onclick="cerrarModal()" class="text-gray-400 hover:text-gray-600 text-2xl">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>

            <form id="eventoForm">
                @csrf
                <input type="hidden" id="eventoId">

                <!-- Fecha -->
                <div class="mb-6">
                    <label for="fecha" class="block text-gray-700 font-semibold mb-2">
                        <i class="fa-solid fa-calendar"></i> Fecha
                    </label>
                    <input type="date"
                           id="fecha"
                           name="fecha"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"
                           required>
                </div>

                <!-- Tipo de evento -->
                <div class="mb-6">
                    <label for="tipo" class="block text-gray-700 font-semibold mb-2">
                        <i class="fa-solid fa-tag"></i> Tipo de Evento
                    </label>
                    <select id="tipo"
                            name="tipo"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"
                            required>
                        <option value="">Seleccione un tipo...</option>
                        <option value="Ensayo">🥁 Ensayo</option>
                        <option value="Misa">⛪ Misa</option>
                        <option value="Procesión">✝️ Procesión</option>
                        <option value="Reunión">📋 Reunión</option>
                        <option value="Acto">🙏 Acto</option>
                        <option value="General">📅 General</option>
                    </select>
                </div>

                <!-- Evento general -->
                <div class="mb-6">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox"
                               id="general"
                               name="general"
                               class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                        <span class="ml-3 text-gray-700 font-semibold">
                            <i class="fa-solid fa-users"></i> Evento general (para todos)
                        </span>
                    </label>
                </div>

                <!-- Botones -->
                <div class="flex gap-4">
                    <button type="button"
                            onclick="cerrarModal()"
                            class="flex-1 bg-gray-500 text-white px-6 py-3 rounded-xl font-semibold hover:bg-gray-600 transition-all">
                        Cancelar
                    </button>
                    <button type="submit"
                            class="flex-1 bg-orange-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-orange-700 transition-all">
                        <i class="fa-solid fa-save"></i> Guardar
                    </button>
                </div>
            </form>

            <!-- Botón eliminar (solo en modo edición) -->
            <button id="btnEliminar"
                    onclick="eliminarEvento()"
                    class="hidden w-full mt-4 bg-red-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-red-700 transition-all">
                <i class="fa-solid fa-trash"></i> Eliminar Evento
            </button>
        </div>
    </div>

    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css' rel='stylesheet' />

    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let calendar;
        let eventoSeleccionado = null;

        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');

            calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,listWeek'
                },
                buttonText: {
                    today: 'Hoy',
                    month: 'Mes',
                    week: 'Semana',
                    list: 'Lista'
                },
                height: 'auto',
                events: '/eventos/data',

                // Click en un día vacío para crear evento
                dateClick: function(info) {
                    abrirModalCrear(info.dateStr);
                },

                // Click en un evento existente para editar
                eventClick: function(info) {
                    abrirModalEditar(info.event);
                },

                // Drag & drop de eventos
                editable: true,
                eventDrop: function(info) {
                    actualizarFechaEvento(info.event);
                }
            });

            calendar.render();

            // Formulario submit
            document.getElementById('eventoForm').addEventListener('submit', function(e) {
                e.preventDefault();
                guardarEvento();
            });
        });

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
            document.getElementById('tipo').value = evento.extendedProps.tipo;
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
                general: document.getElementById('general').checked ? 'SI' : 'NO'
            };

            const url = eventoSeleccionado
                ? `/eventos/${eventoSeleccionado.id}`
                : '/eventos';

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

                    calendar.refetchEvents();
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

                        calendar.refetchEvents();
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
                        general: evento.extendedProps.general
                    })
                });

                const data = await response.json();

                if (!data.success) {
                    evento.revert();
                }
            } catch (error) {
                evento.revert();
            }
        }
    </script>
</x-app-layout>
