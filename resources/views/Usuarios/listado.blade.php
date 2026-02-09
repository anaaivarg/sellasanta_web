<x-app-layout>

    <div class="min-h-screen bg-white p-8">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-moradoprin p-8 text-white">
                <h1 class="text-3xl font-bold mb-2">Gestión de Cofrades</h1>
                <p class="text-white text-base">Administra y filtra los usuarios de tu hermandad</p>
            </div>

            @if(session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: '¡Éxito!',
                            text: '{{ session('success') }}',
                            icon: 'success',
                            confirmButtonColor: '#7c3aed'
                        });
                    });
                </script>
            @endif

            <!-- Filtros -->
            <div class="bg-gray-100 p-6 border-b-2 border-gray-300">
                <div class="flex flex-wrap gap-4 items-end">
                    <div class="flex-1 min-w-[250px]">
                        <label for="buscador" class="block text-sm font-semibold text-gray-700 mb-2">Buscar</label>
                        <input type="text" placeholder=" Buscar por nombre o apellidos..."
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 text-base transition-all focus:outline-none focus:border-purple-600 focus:shadow-lg focus:-translate-y-0.5 bg-white text-black"
                               id="buscador">
                    </div>

                    <div class="min-w-[180px]">
                        <label for="filtroActivo" class="block text-sm font-semibold text-gray-700 mb-2">Estado</label>
                        <select
                            class="w-full cursor-pointer px-4 py-3 rounded-xl border-2 border-gray-300 text-base transition-all focus:outline-none focus:border-purple-600 focus:shadow-lg focus:-translate-y-0.5 bg-white text-black"
                            id="filtroActivo">
                            <option value="">Todos</option>
                            <option value="SI"> Activos</option>
                            <option value="NO"> Inactivos</option>
                        </select>
                    </div>

                    <div class="min-w-[180px]">
                        <label for="filtroSeccion"
                               class="block text-sm font-semibold text-gray-700 mb-2">Sección</label>
                        <select
                            class="w-full cursor-pointer px-4 py-3 rounded-xl border-2 border-gray-300 text-base transition-all focus:outline-none focus:border-purple-600 focus:shadow-lg focus:-translate-y-0.5 bg-white text-black"
                            id="filtroSeccion">
                            <option value="">Todas</option>
                            <option value="2">Tambor</option>
                            <option value="3">Bombos</option>
                            <option value="4">Cornetas</option>
                        </select>
                    </div>

                    <div class="min-w-[180px]">
                        <label for="filtroEdad" class="block text-sm font-semibold text-gray-700 mb-2">Edad</label>
                        <select
                            class="w-full cursor-pointer px-4 py-3 rounded-xl border-2 border-gray-300 text-base transition-all focus:outline-none focus:border-purple-600 focus:shadow-lg focus:-translate-y-0.5 bg-white text-black"
                            id="filtroEdad">
                            <option value="">Todas</option>
                            <option value="infantil">Infantil</option>
                            <option value="adulta">Adultos</option>
                        </select>
                    </div>

                    <div class="min-w-[180px] flex items-center gap-2 pt-7">
                        <input type="checkbox" id="filtroAtributo" class="w-5 h-5 cursor-pointer accent-purple-600">
                        <label for="filtroAtributo" class="text-sm font-semibold text-gray-700 cursor-pointer">
                            Mostrar Atributos
                        </label>
                    </div>

                    <div class="min-w-[180px] flex items-center gap-2 pt-7">
                        <input type="checkbox" id="filtroJunta" class="w-5 h-5 cursor-pointer accent-purple-600">
                        <label for="filtroJunta" class="text-sm font-semibold text-gray-700 cursor-pointer">
                            Mostrar Junta
                        </label>
                    </div>

                    <button
                        class="bg-gray-600 text-white border-none cursor-pointer font-semibold px-6 py-3 rounded-xl transition-all hover:-translate-y-0.5 hover:shadow-xl"
                        onclick="limpiarFiltros()">
                        Limpiar
                    </button>

                    <a href="{{ route('usuarios.create') }}">
                        <button
                            class="bg-orange-600 text-white border-none cursor-pointer font-semibold px-6 py-3 rounded-xl transition-all hover:-translate-y-0.5 hover:shadow-xl">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Añadir Cofrade
                        </button>
                    </a>
                </div>
            </div>

            <!-- Estadísticas -->
            <div class="p-4 px-8 bg-white flex gap-8 border-b border-gray-300">
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-600">Total:</span>
                    <span class="text-xl font-bold text-moradoprin" id="totalUsuarios">{{ count($usuarios) }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-600">Mostrando:</span>
                    <span class="text-xl font-bold text-moradoprin" id="usuariosMostrados">{{ count($usuarios) }}</span>
                </div>
            </div>

            <!-- Tabla -->
            <div class="p-8 overflow-x-auto bg-white">
                <table class="w-full border-separate border-spacing-0" id="tablaUsuarios">
                    <thead class="bg-moradoprin sticky top-0 z-10">
                    <tr>
                        <th class="p-4 text-center text-white font-semibold text-sm uppercase tracking-wider whitespace-nowrap cursor-pointer hover:bg-purple-800 transition-colors select-none"
                            onclick="ordenarPorColumna('nombre')">
                            Nombre
                            <i class="fa-solid fa-sort ml-1" id="icon-nombre"></i>
                        </th>
                        <th class="p-4 text-center text-white font-semibold text-sm uppercase tracking-wider whitespace-nowrap cursor-pointer hover:bg-purple-800 transition-colors select-none"
                            onclick="ordenarPorColumna('apellidos')">
                            Apellidos
                            <i class="fa-solid fa-sort ml-1" id="icon-apellidos"></i>
                        </th>
                        <th class="p-4 text-center text-white font-semibold text-sm uppercase tracking-wider whitespace-nowrap cursor-pointer hover:bg-purple-800 transition-colors select-none"
                            onclick="ordenarPorColumna('fechanac')">
                            F. Nacimiento
                            <i class="fa-solid fa-sort ml-1" id="icon-fechanac"></i>
                        </th>
                        <th class="p-4 text-center text-white font-semibold text-sm uppercase tracking-wider whitespace-nowrap cursor-pointer hover:bg-purple-800 transition-colors select-none"
                            onclick="ordenarPorColumna('fechaalta')">
                            F. Alta
                            <i class="fa-solid fa-sort ml-1" id="icon-fechaalta"></i>
                        </th>
                        <th class="p-4 text-center text-white font-semibold text-sm uppercase tracking-wider whitespace-nowrap cursor-pointer hover:bg-purple-800 transition-colors select-none"
                            onclick="ordenarPorColumna('activo')">
                            Estado
                            <i class="fa-solid fa-sort ml-1" id="icon-activo"></i>
                        </th>
                        <th class="p-4 text-center text-white font-semibold text-sm uppercase tracking-wider whitespace-nowrap cursor-pointer hover:bg-purple-800 transition-colors select-none"
                            onclick="ordenarPorColumna('participante')">
                            Participante
                            <i class="fa-solid fa-sort ml-1" id="icon-participante"></i>
                        </th>
                        <th class="p-4 text-center text-white font-semibold text-sm uppercase tracking-wider whitespace-nowrap">
                            Sección
                        </th>
                        <th class="p-4 text-center text-white font-semibold text-sm uppercase tracking-wider whitespace-nowrap">
                            Junta
                        </th>
                        <th class="p-4 text-center text-white font-semibold text-sm uppercase tracking-wider whitespace-nowrap">
                            Atributo
                        </th>
                        <th class="p-4 text-center text-white font-semibold text-sm uppercase tracking-wider whitespace-nowrap bg-orange-600 z-20">
                            Acciones
                        </th>
                    </tr>
                    </thead>
                    <tbody id="tablaBody">
                    @foreach($usuarios as $usuario)
                        <tr class="usuario-row transition-all border-b border-gray-300 hover:bg-gray-50 even:bg-gray-100"
                            data-nombre="{{ strtolower($usuario->name) }}"
                            data-apellidos="{{ strtolower($usuario->Apellidos) }}"
                            data-activo="{{ $usuario->Activo }}"
                            data-participante="{{ $usuario->Participante }}"
                            data-seccion="{{ $usuario->Seccion }}"
                            data-junta="{{ $usuario->junta && $usuario->junta->descripcion != 'Ninguno' ? '1' : '0' }}"
                            data-fechanacimiento="{{ $usuario->FechaNacimiento }}"
                            data-fechaalta="{{ $usuario->FechaAlta }}"
                            data-atributo="{{ $usuario->atributo && $usuario->atributo->descripcion != 'Ninguno' ? '1' : '0' }}">
                            <td class="p-4 text-center text-gray-700 text-sm">{{ $usuario->name }}</td>
                            <td class="p-4 text-center text-gray-700 text-sm">{{ $usuario->Apellidos }}</td>
                            <td class="p-4 text-center text-gray-700 text-sm">{{ $usuario->FechaNacimiento }}</td>
                            <td class="p-4 text-center text-gray-700 text-sm">{{ $usuario->FechaAlta }}</td>
                            <td class="p-4 text-center">
                                @if($usuario->Activo == "SI")
                                    <span class="inline-block border-none outline-none shadow-none" title="Activo">
                                            <i class="fa-solid fa-check text-green-600"></i>
                                        </span>
                                @else
                                    <span class="inline-block border-none outline-none shadow-none" title="Inactivo">
                                            <i class="fa-solid fa-xmark text-red-600"></i>
                                        </span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                @if($usuario->Participante == "SI")
                                    <span class="inline-block border-none outline-none shadow-none" title="Participa">
                                            <i class="fa-solid fa-check text-green-600"></i>
                                        </span>
                                @else
                                    <span class="inline-block border-none outline-none shadow-none" title="No participa">
                                            <i class="fa-solid fa-xmark text-red-600"></i>
                                        </span>
                                @endif
                            </td>
                            <td class="p-4 text-center text-gray-700 text-sm">
                                {!! $usuario->seccion && $usuario->seccion->descripcion != 'Ninguno' ? $usuario->seccion->descripcion : '<i class="fa-solid fa-xmark text-red-600"></i>' !!}
                            </td>
                            <td class="p-4 text-center text-gray-700 text-sm">
                                {!! $usuario->junta && $usuario->junta->descripcion != 'Ninguno' ? $usuario->junta->descripcion : '<i class="fa-solid fa-xmark text-red-600"></i>' !!}
                            </td>
                            <td class="p-4 text-center text-gray-700 text-sm">
                                {!! $usuario->atributo && $usuario->atributo->descripcion != 'Ninguno' ? $usuario->atributo->descripcion : '<i class="fa-solid fa-xmark text-red-600"></i>' !!}
                            </td>
                            <td class="p-4 whitespace-nowrap sticky right-0 bg-white z-10 shadow-[-4px_0_8px_rgba(0,0,0,0.05)] hover:bg-gray-50">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('usuarios.edit', $usuario) }}" title="Editar">
                                        <button class="border-none bg-transparent cursor-pointer">
                                            <i class="fa-solid fa-pen-to-square text-blue-600 text-xl hover:scale-110 transition-transform"></i>
                                        </button>
                                    </a>

                                    <!-- Desactivar -->
                                    <form action="{{ route('usuarios.destroy', $usuario->idUsuario) }}"
                                          method="POST"
                                          class="inline formEliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-orange-600 hover:text-orange-800 transition-colors border-none bg-transparent cursor-pointer"
                                                title="Desactivar cofrade">
                                            <i class="fa-solid fa-user-slash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div id="noResults" class="text-center py-12 text-gray-600 text-lg hidden">
                    <p>😔 No se encontraron resultados con los filtros aplicados</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ========================================
            // CONFIRMACIÓN DE DESACTIVACIÓN
            // ========================================
            const forms = document.querySelectorAll('.formEliminar');

            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: '¿Desactivar cofrade?',
                        text: "El cofrade será marcado como inactivo.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ea580c',
                        cancelButtonColor: '#64748b',
                        confirmButtonText: 'Sí, desactivar',
                        cancelButtonText: 'Cancelar'
                    }).then(result => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // ========================================
            // SISTEMA DE FILTRADO
            // ========================================
            const buscador = document.getElementById('buscador');
            const filtroActivo = document.getElementById('filtroActivo');
            const filtroSeccion = document.getElementById('filtroSeccion');
            const filtroJunta = document.getElementById('filtroJunta');
            const filtroEdad = document.getElementById('filtroEdad');
            const filtroAtributo = document.getElementById('filtroAtributo');

            function aplicarFiltros() {
                const textoBusqueda = buscador.value.toLowerCase();
                const valorActivo = filtroActivo.value;
                const valorSeccion = filtroSeccion.value;
                const valorEdad = filtroEdad.value;
                const checkJunta = filtroJunta.checked;
                const checkAtributo = filtroAtributo.checked;

                const filas = document.querySelectorAll('.usuario-row');
                let contador = 0;

                filas.forEach(fila => {
                    const nombre = fila.dataset.nombre || '';
                    const apellidos = fila.dataset.apellidos || '';
                    const activo = fila.dataset.activo;
                    const seccion = fila.dataset.seccion;
                    const junta = fila.dataset.junta;
                    const atributo = fila.dataset.atributo;

                    // Filtro de búsqueda de texto
                    const coincideTexto = nombre.includes(textoBusqueda) || apellidos.includes(textoBusqueda);

                    // Filtro de estado activo
                    const coincideActivo = valorActivo === '' || activo === valorActivo;

                    // Filtro de sección
                    const coincideSeccion = valorSeccion === '' || seccion === valorSeccion;

                    // Filtro de edad
                    let coincideEdad = true;
                    if (valorEdad === 'infantil' || valorEdad === 'adulta') {
                        const fechaNac = new Date(fila.dataset.fechanacimiento);
                        const hoy = new Date();
                        let edad = hoy.getFullYear() - fechaNac.getFullYear();
                        const m = hoy.getMonth() - fechaNac.getMonth();
                        if (m < 0 || (m === 0 && hoy.getDate() < fechaNac.getDate())) edad--;
                        coincideEdad = valorEdad === 'infantil' ? edad < 14 : edad >= 14;
                    }

                    // Filtro de junta
                    const coincideJunta = !checkJunta || junta === '1';

                    // Filtro de atributo
                    const coincideAtributo = !checkAtributo || atributo === '1';

                    // Mostrar u ocultar fila
                    if (coincideTexto && coincideActivo && coincideSeccion && coincideJunta && coincideEdad && coincideAtributo) {
                        fila.classList.remove('hidden');
                        contador++;
                    } else {
                        fila.classList.add('hidden');
                    }
                });

                // Actualizar contador
                document.getElementById('usuariosMostrados').textContent = contador;

                // Mostrar mensaje si no hay resultados
                const noResults = document.getElementById('noResults');
                noResults.classList.toggle('hidden', contador > 0);
            }

            // Event listeners para filtros
            buscador.addEventListener('input', aplicarFiltros);
            filtroActivo.addEventListener('change', aplicarFiltros);
            filtroSeccion.addEventListener('change', aplicarFiltros);
            filtroJunta.addEventListener('change', aplicarFiltros);
            filtroEdad.addEventListener('change', aplicarFiltros);
            filtroAtributo.addEventListener('change', aplicarFiltros);

            // ========================================
            // SISTEMA DE ORDENAMIENTO
            // ========================================
            let ordenActual = { campo: null, direccion: 'asc' };

            window.ordenarPorColumna = function(campo) {
                const tbody = document.getElementById('tablaBody');
                const filas = Array.from(tbody.querySelectorAll('.usuario-row'));

                // Cambiar dirección si es la misma columna
                if (ordenActual.campo === campo) {
                    ordenActual.direccion = ordenActual.direccion === 'asc' ? 'desc' : 'asc';
                } else {
                    ordenActual.campo = campo;
                    ordenActual.direccion = 'asc';
                }

                filas.sort((a, b) => {
                    let valorA, valorB;

                    switch(campo) {
                        case 'nombre':
                            valorA = a.dataset.nombre;
                            valorB = b.dataset.nombre;
                            break;
                        case 'apellidos':
                            valorA = a.dataset.apellidos;
                            valorB = b.dataset.apellidos;
                            break;
                        case 'fechaalta':
                            valorA = new Date(a.dataset.fechaalta);
                            valorB = new Date(b.dataset.fechaalta);
                            break;
                        case 'fechanac':
                            valorA = new Date(a.dataset.fechanacimiento);
                            valorB = new Date(b.dataset.fechanacimiento);
                            break;
                        case 'activo':
                            // SI primero, NO después
                            valorA = a.dataset.activo === 'SI' ? 0 : 1;
                            valorB = b.dataset.activo === 'SI' ? 0 : 1;
                            break;
                        case 'participante':
                            // SI primero, NO después
                            valorA = a.dataset.participante === 'SI' ? 0 : 1;
                            valorB = b.dataset.participante === 'SI' ? 0 : 1;
                            break;
                    }

                    let comparacion;
                    if (typeof valorA === 'string') {
                        comparacion = valorA.localeCompare(valorB);
                    } else {
                        comparacion = valorA - valorB;
                    }

                    return ordenActual.direccion === 'asc' ? comparacion : -comparacion;
                });

                // Reordenar el DOM
                filas.forEach(fila => tbody.appendChild(fila));

                // Actualizar iconos
                actualizarIconosOrden(campo);
            }

            function actualizarIconosOrden(campoActivo) {
                // Resetear todos los iconos
                const iconos = ['nombre', 'apellidos', 'fechanac', 'fechaalta', 'activo', 'participante'];
                iconos.forEach(icono => {
                    const elemento = document.getElementById(`icon-${icono}`);
                    if (elemento) {
                        elemento.className = 'fa-solid fa-sort ml-1';
                    }
                });

                // Marcar el activo
                const iconoActivo = document.getElementById(`icon-${campoActivo}`);
                if (iconoActivo) {
                    iconoActivo.className = ordenActual.direccion === 'asc'
                        ? 'fa-solid fa-sort-up ml-1'
                        : 'fa-solid fa-sort-down ml-1';
                }
            }
        });

        // ========================================
        // LIMPIAR FILTROS
        // ========================================
        function limpiarFiltros() {
            document.getElementById('buscador').value = '';
            document.getElementById('filtroActivo').value = '';
            document.getElementById('filtroSeccion').value = '';
            document.getElementById('filtroEdad').value = '';
            document.getElementById('filtroJunta').checked = false;
            document.getElementById('filtroAtributo').checked = false;

            const filas = document.querySelectorAll('.usuario-row');
            filas.forEach(fila => fila.classList.remove('hidden'));

            document.getElementById('usuariosMostrados').textContent = filas.length;
            document.getElementById('noResults').classList.add('hidden');
        }
    </script>

</x-app-layout>
