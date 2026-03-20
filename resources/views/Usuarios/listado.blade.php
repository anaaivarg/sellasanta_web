<x-app-layout>
    <div class="min-h-screen bg-white p-4 lg:p-8">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-moradoprin p-4 lg:p-8 text-white">
                <h1 class="text-xl lg:text-3xl font-bold mb-1 lg:mb-2">Gestión de Cofrades</h1>
                <p class="text-white text-sm lg:text-base">Administra y filtra los usuarios de tu hermandad</p>
            </div>

            @if(session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
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
            <div class="bg-gray-100 p-3 lg:p-6 border-b-2 border-gray-300">
                <div class="flex flex-wrap gap-2 lg:gap-4 items-end">
                    <div class="flex-1 min-w-full lg:min-w-[250px]">
                        <label for="buscador"
                            class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1 lg:mb-2">Buscar</label>
                        <input type="text" placeholder="Buscar por nombre o apellidos..."
                            class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base transition-all focus:outline-none focus:border-purple-600 focus:shadow-lg bg-white text-black"
                            id="buscador">
                    </div>

                    <div class="w-full sm:w-auto sm:min-w-[150px]">
                        <label for="filtroActivo"
                            class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1 lg:mb-2">Estado</label>
                        <select
                            class="w-full cursor-pointer px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base transition-all focus:outline-none focus:border-purple-600 bg-white text-black"
                            id="filtroActivo">
                            <option value="">Todos</option>
                            <option value="SI">Activos</option>
                            <option value="NO">Inactivos</option>
                        </select>
                    </div>

                    <div class="w-full sm:w-auto sm:min-w-[150px]">
                        <label for="filtroSeccion"
                            class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1 lg:mb-2">Sección</label>
                        <select
                            class="w-full cursor-pointer px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base transition-all focus:outline-none focus:border-purple-600 bg-white text-black"
                            id="filtroSeccion">
                            <option value="">Todas</option>
                            <option value="2">Tambor</option>
                            <option value="3">Bombos</option>
                            <option value="4">Cornetas</option>
                        </select>
                    </div>

                    <div class="w-full sm:w-auto sm:min-w-[150px]">
                        <label for="filtroEdad"
                            class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1 lg:mb-2">Edad</label>
                        <select
                            class="w-full cursor-pointer px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base transition-all focus:outline-none focus:border-purple-600 bg-white text-black"
                            id="filtroEdad">
                            <option value="">Todas</option>
                            <option value="infantil">Infantil</option>
                            <option value="adulta">Adultos</option>
                        </select>
                    </div>

                    <div class="w-full sm:w-auto flex items-center gap-2 pt-0 sm:pt-7">
                        <input type="checkbox" id="filtroSoloSeccion"
                            class="w-4 h-4 lg:w-5 lg:h-5 cursor-pointer accent-purple-600">
                        <label for="filtroSoloSeccion"
                            class="text-xs lg:text-sm font-semibold text-gray-700 cursor-pointer">
                            Sección de instrumentos
                        </label>
                    </div>

                    <div class="w-full sm:w-auto flex items-center gap-2 pt-0 sm:pt-7">
                        <input type="checkbox" id="filtroAtributo"
                            class="w-4 h-4 lg:w-5 lg:h-5 cursor-pointer accent-purple-600">
                        <label for="filtroAtributo"
                            class="text-xs lg:text-sm font-semibold text-gray-700 cursor-pointer">
                            Mostrar Atributos
                        </label>
                    </div>

                    <div class="w-full sm:w-auto flex items-center gap-2 pt-0 sm:pt-7">
                        <input type="checkbox" id="filtroJunta"
                            class="w-4 h-4 lg:w-5 lg:h-5 cursor-pointer accent-purple-600">
                        <label for="filtroJunta" class="text-xs lg:text-sm font-semibold text-gray-700 cursor-pointer">
                            Mostrar Junta
                        </label>
                    </div>

                    <div class="w-full sm:w-auto flex gap-2">
                        <button
                            class="flex-1 sm:flex-none bg-gray-600 text-white border-none cursor-pointer font-semibold px-4 py-2 lg:px-6 lg:py-3 rounded-xl transition-all hover:-translate-y-0.5 hover:shadow-xl text-sm lg:text-base"
                            onclick="limpiarFiltros()">
                            Limpiar
                        </button>

                        <a href="{{ route('usuarios.create') }}" class="flex-1 sm:flex-none">
                            <button
                                class="w-full bg-orange-600 text-white border-none cursor-pointer font-semibold px-4 py-2 lg:px-6 lg:py-3 rounded-xl transition-all hover:-translate-y-0.5 hover:shadow-xl text-sm lg:text-base">
                                <i class="fa-solid fa-plus"></i>
                                <span class="hidden sm:inline">Añadir Cofrade</span>
                                <span class="sm:hidden">Añadir</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Estadísticas -->
            <div class="p-3 lg:p-4 lg:px-8 bg-white flex gap-4 lg:gap-8 border-b border-gray-300">
                <div class="flex items-center gap-2">
                    <span class="text-xs lg:text-sm text-gray-600">Total:</span>
                    <span class="text-lg lg:text-xl font-bold text-moradoprin"
                        id="totalUsuarios">{{ count($usuarios) }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs lg:text-sm text-gray-600">Mostrando:</span>
                    <span class="text-lg lg:text-xl font-bold text-moradoprin"
                        id="usuariosMostrados">{{ count($usuarios) }}</span>
                </div>
            </div>

            <!-- VISTA MÓVIL: Cards -->
            <div class="lg:hidden p-4 bg-white">
                <div id="usuariosCards" class="space-y-3">
                    @foreach($usuarios as $usuario)
                        <div class="usuario-card bg-white border-2 border-gray-200 rounded-xl p-3 shadow-sm"
                            data-nombre="{{ strtolower($usuario->name) }}"
                            data-apellidos="{{ strtolower($usuario->Apellidos) }}" data-activo="{{ $usuario->Activo }}"
                            data-participante="{{ $usuario->Participante }}" data-seccion="{{ $usuario->Seccion ?? '' }}"
                            data-junta="{{ $usuario->junta && $usuario->junta->descripcion != 'Ninguno' ? '1' : '0' }}"
                            data-fechanacimiento="{{ $usuario->FechaNacimiento }}"
                            data-fechaalta="{{ $usuario->FechaAlta }}"
                            data-atributo="{{ $usuario->atributo && $usuario->atributo->descripcion != 'Ninguno' ? '1' : '0' }}">

                            <div class="flex justify-between items-start mb-2">
                                <div class="flex-1">
                                    <h3 class="font-bold text-gray-900 text-sm">{{ $usuario->name }}
                                        {{ $usuario->Apellidos }}
                                    </h3>
                                    <p class="text-xs text-gray-500">Alta: {{ $usuario->FechaAlta }}</p>
                                </div>
                                <div class="flex gap-2">
                                    @if($usuario->Activo == "SI")
                                        <i class="fa-solid fa-check text-green-600"></i>
                                    @else
                                        <i class="fa-solid fa-xmark text-red-600"></i>
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-2 text-xs mb-3">
                                @if($usuario->seccion && $usuario->seccion->descripcion != 'Ninguno')
                                    <div>
                                        <span class="text-gray-500">Sección:</span>
                                        <span class="font-semibold">{{ $usuario->seccion->descripcion }}</span>
                                    </div>
                                @endif
                                @if($usuario->junta && $usuario->junta->descripcion != 'Ninguno')
                                    <div>
                                        <span class="text-gray-500">Junta:</span>
                                        <span class="font-semibold">{{ $usuario->junta->descripcion }}</span>
                                    </div>
                                @endif
                                @if($usuario->atributo && $usuario->atributo->descripcion != 'Ninguno')
                                    <div class="col-span-2">
                                        <span class="text-gray-500">Atributo:</span>
                                        <span class="font-semibold">{{ $usuario->atributo->descripcion }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="flex gap-2">
                                <a href="{{ route('usuarios.edit', $usuario) }}" class="flex-1">
                                    <button
                                        class="w-full bg-blue-600 text-white px-3 py-2 rounded-lg text-xs font-semibold">
                                        <i class="fa-solid fa-pen-to-square"></i> Editar
                                    </button>
                                </a>

                                @if($usuario->Activo == "SI")
                                    <form action="{{ route('usuarios.destroy', $usuario->idUsuario) }}" method="POST"
                                        class="flex-1 formEliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-full bg-orange-600 text-white px-3 py-2 rounded-lg text-xs font-semibold">
                                            <i class="fa-solid fa-user-slash"></i> Desactivar
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('usuarios.activar', $usuario->idUsuario) }}" method="POST"
                                        class="flex-1 formActivar">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="w-full bg-green-600 text-white px-3 py-2 rounded-lg text-xs font-semibold">
                                            <i class="fa-solid fa-user-check"></i> Activar
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="noResultsMobile" class="text-center py-12 text-gray-600 text-sm hidden">
                    <p>😔 No se encontraron resultados</p>
                </div>
            </div>

            <!-- VISTA PC: Tabla -->
            <div class="hidden lg:block p-8 overflow-x-auto bg-white">
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
                            <th
                                class="p-4 text-center text-white font-semibold text-sm uppercase tracking-wider whitespace-nowrap">
                                Sección
                            </th>
                            <th
                                class="p-4 text-center text-white font-semibold text-sm uppercase tracking-wider whitespace-nowrap">
                                Junta
                            </th>
                            <th
                                class="p-4 text-center text-white font-semibold text-sm uppercase tracking-wider whitespace-nowrap">
                                Atributo
                            </th>
                            <th
                                class="p-4 text-center text-white font-semibold text-sm uppercase tracking-wider whitespace-nowrap bg-orange-600 z-20">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tablaBody">
                        @foreach($usuarios as $usuario)
                            <tr class="usuario-row transition-all border-b border-gray-300 hover:bg-gray-50 even:bg-gray-100"
                                data-nombre="{{ strtolower($usuario->name) }}"
                                data-apellidos="{{ strtolower($usuario->Apellidos) }}" data-activo="{{ $usuario->Activo }}"
                                data-participante="{{ $usuario->Participante }}"
                                data-seccion="{{ $usuario->Seccion ?? '' }}"
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
                                        <i class="fa-solid fa-check text-green-600"></i>
                                    @else
                                        <i class="fa-solid fa-xmark text-red-600"></i>
                                    @endif
                                </td>
                                <td class="p-4 text-center">
                                    @if($usuario->Participante == "SI")
                                        <i class="fa-solid fa-check text-green-600"></i>
                                    @else
                                        <i class="fa-solid fa-xmark text-red-600"></i>
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
                                <td
                                    class="p-4 whitespace-nowrap sticky right-0 bg-white z-10 shadow-[-4px_0_8px_rgba(0,0,0,0.05)] hover:bg-gray-50">
                                    <div class="flex items-center justify-center gap-3">
                                        <a href="{{ route('usuarios.edit', $usuario) }}">
                                            <i
                                                class="fa-solid fa-pen-to-square text-blue-600 text-xl hover:scale-110 transition-transform"></i>
                                        </a>
                                        <form action="{{ route('usuarios.destroy', $usuario->idUsuario) }}" method="POST"
                                            class="inline formEliminar">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-orange-600 hover:text-orange-800 transition-colors border-none bg-transparent cursor-pointer">
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

    <!-- Botón Volver Flotante -->
    <a href="{{ route('dashboard') }}"
        class="fixed bottom-6 left-6 bg-moradoprin text-white w-12 h-12 lg:w-14 lg:h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-purple-800 transition-all z-40">
        <i class="fa-solid fa-arrow-left text-lg lg:text-xl"></i>
    </a>

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

            // Confirmación de ACTIVACIÓN
            const formsActivar = document.querySelectorAll('.formActivar');

            formsActivar.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: '¿Activar cofrade?',
                        text: "El cofrade será marcado como activo.",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#16a34a',
                        cancelButtonColor: '#64748b',
                        confirmButtonText: 'Sí, activar',
                        cancelButtonText: 'Cancelar'
                    }).then(result => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // ========================================
            // SISTEMA DE FILTRADO (MÓVIL Y PC)
            // ========================================
            const buscador = document.getElementById('buscador');
            const filtroActivo = document.getElementById('filtroActivo');
            const filtroSeccion = document.getElementById('filtroSeccion');
            const filtroJunta = document.getElementById('filtroJunta');
            const filtroEdad = document.getElementById('filtroEdad');
            const filtroAtributo = document.getElementById('filtroAtributo');
            const filtroSoloSeccion = document.getElementById('filtroSoloSeccion');

            function aplicarFiltros() {
                const textoBusqueda = buscador.value.toLowerCase();
                const valorActivo = filtroActivo.value;
                const valorSeccion = filtroSeccion.value;
                const valorEdad = filtroEdad.value;
                const checkJunta = filtroJunta.checked;
                const checkAtributo = filtroAtributo.checked;
                const checkSoloSeccion = filtroSoloSeccion.checked;

                // Filtrar tabla (PC)
                const filas = document.querySelectorAll('.usuario-row');
                // Filtrar cards (móvil)
                const cards = document.querySelectorAll('.usuario-card');

                let contadorPC = 0;
                let contadorMovil = 0;

                // Función de filtrado común
                function filtrarElemento(elemento) {
                    const nombre = elemento.dataset.nombre || '';
                    const apellidos = elemento.dataset.apellidos || '';
                    const activo = elemento.dataset.activo;
                    const seccion = elemento.dataset.seccion;
                    const junta = elemento.dataset.junta;
                    const atributo = elemento.dataset.atributo;

                    const coincideTexto = nombre.includes(textoBusqueda) || apellidos.includes(textoBusqueda);
                    const coincideActivo = valorActivo === '' || activo === valorActivo;
                    const coincideSeccionSelect = valorSeccion === '' || seccion === valorSeccion;
                    const coincideSoloSeccion = !checkSoloSeccion || (seccion !== '' && seccion !== 'undefined' && seccion !== 'null');

                    let coincideEdad = true;
                    if (valorEdad === 'infantil' || valorEdad === 'adulta') {
                        const fechaNac = new Date(elemento.dataset.fechanacimiento);
                        const hoy = new Date();
                        let edad = hoy.getFullYear() - fechaNac.getFullYear();
                        const m = hoy.getMonth() - fechaNac.getMonth();
                        if (m < 0 || (m === 0 && hoy.getDate() < fechaNac.getDate())) edad--;
                        coincideEdad = valorEdad === 'infantil' ? edad < 14 : edad >= 14;
                    }

                    const coincideJunta = !checkJunta || junta === '1';
                    const coincideAtributo = !checkAtributo || atributo === '1';

                    return coincideTexto && coincideActivo && coincideSeccionSelect && coincideSoloSeccion && coincideJunta && coincideEdad && coincideAtributo;
                }

                // Aplicar a tabla (PC)
                filas.forEach(fila => {
                    if (filtrarElemento(fila)) {
                        fila.classList.remove('hidden');
                        contadorPC++;
                    } else {
                        fila.classList.add('hidden');
                    }
                });

                // Aplicar a cards (móvil)
                cards.forEach(card => {
                    if (filtrarElemento(card)) {
                        card.classList.remove('hidden');
                        contadorMovil++;
                    } else {
                        card.classList.add('hidden');
                    }
                });

                // Actualizar contador (usar el que corresponda según la vista)
                const contador = window.innerWidth >= 1024 ? contadorPC : contadorMovil;
                document.getElementById('usuariosMostrados').textContent = contador;

                // Mostrar mensaje si no hay resultados
                const noResults = document.getElementById('noResults');
                const noResultsMobile = document.getElementById('noResultsMobile');

                if (noResults) noResults.classList.toggle('hidden', contadorPC > 0);
                if (noResultsMobile) noResultsMobile.classList.toggle('hidden', contadorMovil > 0);
            }

            // Event listeners para filtros
            buscador.addEventListener('input', aplicarFiltros);
            filtroActivo.addEventListener('change', aplicarFiltros);
            filtroSeccion.addEventListener('change', aplicarFiltros);
            filtroJunta.addEventListener('change', aplicarFiltros);
            filtroEdad.addEventListener('change', aplicarFiltros);
            filtroAtributo.addEventListener('change', aplicarFiltros);
            filtroSoloSeccion.addEventListener('change', aplicarFiltros);

            // ========================================
            // SISTEMA DE ORDENAMIENTO (SOLO PC)
            // ========================================
            let ordenActual = { campo: null, direccion: 'asc' };

            window.ordenarPorColumna = function (campo) {
                const tbody = document.getElementById('tablaBody');
                const filas = Array.from(tbody.querySelectorAll('.usuario-row'));

                if (ordenActual.campo === campo) {
                    ordenActual.direccion = ordenActual.direccion === 'asc' ? 'desc' : 'asc';
                } else {
                    ordenActual.campo = campo;
                    ordenActual.direccion = 'asc';
                }

                filas.sort((a, b) => {
                    let valorA, valorB;

                    switch (campo) {
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
                            valorA = a.dataset.activo === 'SI' ? 0 : 1;
                            valorB = b.dataset.activo === 'SI' ? 0 : 1;
                            break;
                        case 'participante':
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

                filas.forEach(fila => tbody.appendChild(fila));
                actualizarIconosOrden(campo);
            }

            function actualizarIconosOrden(campoActivo) {
                const iconos = ['nombre', 'apellidos', 'fechanac', 'fechaalta', 'activo', 'participante'];
                iconos.forEach(icono => {
                    const elemento = document.getElementById(`icon-${icono}`);
                    if (elemento) {
                        elemento.className = 'fa-solid fa-sort ml-1';
                    }
                });

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
            document.getElementById('filtroSoloSeccion').checked = false;

            const filas = document.querySelectorAll('.usuario-row');
            const cards = document.querySelectorAll('.usuario-card');

            filas.forEach(fila => fila.classList.remove('hidden'));
            cards.forEach(card => card.classList.remove('hidden'));

            document.getElementById('usuariosMostrados').textContent = filas.length || cards.length;

            const noResults = document.getElementById('noResults');
            const noResultsMobile = document.getElementById('noResultsMobile');

            if (noResults) noResults.classList.add('hidden');
            if (noResultsMobile) noResultsMobile.classList.add('hidden');
        }
    </script>

</x-app-layout>