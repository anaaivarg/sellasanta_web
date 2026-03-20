<x-app-layout>
    <div class="min-h-screen bg-white p-4 lg:p-8">
        <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-moradoprin p-4 lg:p-8 text-white">
                <h1 class="text-xl lg:text-3xl font-bold mb-1 lg:mb-2">Editar Cofrade</h1>
                <p class="text-white text-sm lg:text-base">Modifica los datos del miembro</p>
            </div>

            <form id="editarUsuario" action="{{ route('usuarios.update', $usuario->idUsuario) }}" method="POST"
                class="p-4 lg:p-8 flex flex-col gap-3 lg:gap-4">
                @csrf
                @method('PATCH')

                <!-- Datos personales -->
                <h2 class="text-base lg:text-lg font-semibold text-moradoprin border-b-2 border-moradoprin pb-2">Datos Personales</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 lg:gap-4">
                    <div>
                        <label for="nombre" class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $usuario->name) }}"
                            class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-xs lg:text-sm mt-1">{{ $errors->first("nombre") }}</div>
                    </div>

                    <div>
                        <label for="apellido" class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1">Apellidos</label>
                        <input type="text" name="apellido" id="apellido"
                            value="{{ old('apellido', $usuario->Apellidos) }}"
                            class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-xs lg:text-sm mt-1">{{ $errors->first("apellido") }}</div>
                    </div>
                </div>

                <div>
                    <label for="dni" class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1">DNI</label>
                    <input type="text" name="dni" id="dni" value="{{ old('dni', $usuario->Dni) }}"
                        class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base focus:outline-none focus:border-purple-600 bg-white text-black">
                    <div class="text-red-500 text-xs lg:text-sm mt-1">{{ $errors->first("dni") }}</div>
                </div>

                <div>
                    <label for="direccion" class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1">Dirección</label>
                    <input type="text" name="direccion" id="direccion"
                        value="{{ old('direccion', $usuario->Direccion) }}"
                        class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base focus:outline-none focus:border-purple-600 bg-white text-black">
                    <div class="text-red-500 text-xs lg:text-sm mt-1">{{ $errors->first("direccion") }}</div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 lg:gap-4">
                    <div>
                        <label for="fecha_nacimiento" class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                            value="{{ old('fecha_nacimiento', $usuario->FechaNacimiento) }}"
                            class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-xs lg:text-sm mt-1">{{ $errors->first("fecha_nacimiento") }}</div>
                    </div>

                    <div>
                        <label for="fecha_alta" class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1">Fecha de Alta</label>
                        <input type="date" name="fecha_alta" id="fecha_alta"
                            value="{{ old('fecha_alta', $usuario->FechaAlta) }}"
                            class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-xs lg:text-sm mt-1">{{ $errors->first("fecha_alta") }}</div>
                    </div>
                </div>

                <!-- Contacto -->
                <h2 class="text-base lg:text-lg font-semibold text-moradoprin border-b-2 border-moradoprin pb-2 mt-2 lg:mt-4">Contacto</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 lg:gap-4">
                    <div>
                        <label for="email" class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $usuario->email) }}"
                            class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-xs lg:text-sm mt-1">{{ $errors->first("email") }}</div>
                    </div>

                    <div>
                        <label for="telefono" class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1">Teléfono</label>
                        <input type="tel" name="telefono" id="telefono"
                            value="{{ old('telefono', $usuario->Telefono) }}"
                            class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-xs lg:text-sm mt-1">{{ $errors->first("telefono") }}</div>
                    </div>
                </div>

                <!-- Acceso -->
                <h2 class="text-base lg:text-lg font-semibold text-moradoprin border-b-2 border-moradoprin pb-2 mt-2 lg:mt-4">Datos de Acceso</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 lg:gap-4">
                    <div>
                        <label for="usuario" class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1">Usuario</label>
                        <input type="text" name="usuario" id="usuario" value="{{ old('usuario', $usuario->Usuario) }}"
                            class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-xs lg:text-sm mt-1">{{ $errors->first("usuario") }}</div>
                    </div>

                    <div>
                        <label for="password" class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="Dejar vacío para no cambiar"
                            class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-xs lg:text-sm mt-1">{{ $errors->first("password") }}</div>
                    </div>
                </div>

                <!-- Estado en la cofradía -->
                <h2 class="text-base lg:text-lg font-semibold text-moradoprin border-b-2 border-moradoprin pb-2 mt-2 lg:mt-4">Estado en la Cofradía</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 lg:gap-4">
                    <div>
                        <label for="activo" class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1">Activo</label>
                        <select name="activo" id="activo"
                            class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base focus:outline-none focus:border-purple-600 bg-white text-black">
                            <option value="SI" {{ (old('activo', $usuario->Activo) ?? 'NO') == 'SI' ? 'selected' : '' }}>Sí</option>
                            <option value="NO" {{ (old('activo', $usuario->Activo) ?? 'NO') == 'NO' ? 'selected' : '' }}>No</option>
                        </select>
                        <div class="text-red-500 text-xs lg:text-sm mt-1">{{ $errors->first("activo") }}</div>
                    </div>



                    <div>
    <label for="participante" class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1">Participante</label>
    <select name="participante" id="participante"
        class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base focus:outline-none focus:border-purple-600 bg-white text-black">
        <option value="SI" {{ old('participante', $usuario->Participante) == 'SI' ? 'selected' : '' }}>Sí</option>
        <option value="NO" {{ old('participante', $usuario->Participante) == 'NO' ? 'selected' : '' }}>No</option>
    </select>
    <div class="text-red-500 text-xs lg:text-sm mt-1">{{ $errors->first("participante") }}</div>
</div>

                <div>
                    <label for="Seccion" class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1">Instrumento/Sección</label>
                    <select name="Seccion" id="Seccion"
                        class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base focus:outline-none focus:border-purple-600 bg-white text-black">
                        <option value="" {{ empty($usuario->Seccion) || $usuario->Seccion == 1 ? 'selected' : '' }}>Ninguno</option>
                        @foreach($instrumentos as $instrumento)
                            @if($instrumento->idInstrumento != 1)
                                <option value="{{ $instrumento->idInstrumento }}" 
                                    {{ (old('Seccion', $usuario->Seccion) == $instrumento->idInstrumento) ? 'selected' : '' }}>
                                    {{ $instrumento->descripcion }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="junta" class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1">Cargo en Junta</label>
                    <select name="junta" id="junta"
                        class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base focus:outline-none focus:border-purple-600 bg-white text-black">
                        <option value="" {{ empty($usuario->Junta) || $usuario->Junta == 1 ? 'selected' : '' }}>Ninguno</option>
                        @foreach($juntas as $junta)
                            @if($junta->idJunta != 1)
                                <option value="{{ $junta->idJunta }}" 
                                    {{ (old('junta', $usuario->Junta) == $junta->idJunta) ? 'selected' : '' }}>
                                    {{ $junta->descripcion }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    <div class="text-red-500 text-xs lg:text-sm mt-1">{{ $errors->first("junta") }}</div>
                </div>

                <div>
                    <label for="atributo" class="block text-xs lg:text-sm font-semibold text-gray-700 mb-1">Atributo</label>
                    <select name="atributo" id="atributo"
                        class="w-full px-3 py-2 lg:px-4 lg:py-3 rounded-xl border-2 border-gray-300 text-sm lg:text-base focus:outline-none focus:border-purple-600 bg-white text-black">
                        <option value="" {{ empty($usuario->Atributo) || $usuario->Atributo == 1 ? 'selected' : '' }}>Ninguno</option>
                        @foreach($atributos as $atributo)
                            @if($atributo->idAtributo != 1)
                                <option value="{{ $atributo->idAtributo }}" 
                                    {{ (old('atributo', $usuario->Atributo) == $atributo->idAtributo) ? 'selected' : '' }}>
                                    {{ $atributo->descripcion }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    <div class="text-red-500 text-xs lg:text-sm mt-1">{{ $errors->first("atributo") }}</div>
                </div>

                <!-- Botones -->
                <div class="flex gap-3 lg:gap-4 mt-4 lg:mt-6">
                    <a href="{{ route('usuarios.index') }}"
                        class="flex-1 bg-gray-600 text-white text-center font-semibold px-4 py-2 lg:px-6 lg:py-3 rounded-xl transition-all hover:-translate-y-0.5 hover:shadow-xl text-sm lg:text-base">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="flex-1 bg-orange-600 text-white font-semibold px-4 py-2 lg:px-6 lg:py-3 rounded-xl transition-all hover:-translate-y-0.5 hover:shadow-xl text-sm lg:text-base">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Botón Volver Flotante -->
    <a href="{{ route('usuarios.index') }}" 
       class="fixed bottom-6 left-6 bg-moradoprin text-white w-12 h-12 lg:w-14 lg:h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-purple-800 transition-all z-40">
        <i class="fa-solid fa-arrow-left text-lg lg:text-xl"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('editarUsuario');

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: '¿Guardar cambios?',
                    text: "Se actualizarán los datos del cofrade",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#ea580c',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Sí, guardar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
        if (result.isConfirmed) {
            // ✅ HABILITAR TODOS LOS CAMPOS ANTES DE ENVIAR
            selectParticipante.disabled = false;
            selectSeccion.disabled = false;
            selectJunta.disabled = false;
            selectAtributo.disabled = false;
            
            form.submit();
        }
                });
            });

            const selectActivo = document.getElementById('activo');
            const selectParticipante = document.getElementById('participante');
            const selectSeccion = document.getElementById('Seccion');
            const selectJunta = document.getElementById('junta');
            const selectAtributo = document.getElementById('atributo');

            // Variable para saber si es la primera vez que se ejecuta
            let esCargarInicial = true;

            function actualizarEstadoCampos() {
    const activo = selectActivo.value === 'SI';
    const participante = selectParticipante.value === 'SI';

    // Si está INACTIVO, deshabilitar TODO y resetear
    if (!activo) {
        selectParticipante.disabled = true;
        selectSeccion.disabled = true;
        selectJunta.disabled = true;
        selectAtributo.disabled = true;

        // Resetear valores SOLO si no es la carga inicial
        if (!esCargarInicial) {
            selectParticipante.value = 'NO';
            selectSeccion.value = '';
            selectJunta.value = '';
            selectAtributo.value = '';
        }
    } else {
        // Si está ACTIVO
        selectParticipante.disabled = false;
        selectJunta.disabled = false; // Junta siempre habilitado si está activo

        // Si NO participa, deshabilitar sección y atributo
        if (!participante) {
            selectSeccion.disabled = true;
            selectAtributo.disabled = true;
            
            // Resetear valores SOLO si no es la carga inicial
            if (!esCargarInicial) {
                selectSeccion.value = '';
                selectAtributo.value = '';
            }
        } else {
            // Si SÍ participa, habilitar sección y atributo
            selectSeccion.disabled = false;
            selectAtributo.disabled = false;
        }
    }

    // Estilo visual para campos deshabilitados Y hacer readonly
    [selectParticipante, selectSeccion, selectJunta, selectAtributo].forEach(select => {
        if (select.disabled) {
            select.classList.add('bg-gray-200', 'cursor-not-allowed');
            select.classList.remove('bg-white');
            
        } else {
            select.classList.remove('bg-gray-200', 'cursor-not-allowed');
            select.classList.add('bg-white');
           
        }
    });
    
    // Después de la primera ejecución, ya no es carga inicial
    esCargarInicial = false;
}

            // Ejecutar al cargar
            actualizarEstadoCampos();

            // Ejecutar al cambiar
            selectActivo.addEventListener('change', actualizarEstadoCampos);
            selectParticipante.addEventListener('change', actualizarEstadoCampos);
        });
    </script>
</x-app-layout>