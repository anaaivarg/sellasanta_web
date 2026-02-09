<x-app-layout>
    <div class="min-h-screen bg-white p-8">
        <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-moradoprin p-8 text-white">
                <h1 class="text-3xl font-bold mb-2">Editar Cofrade</h1>
                <p class="text-white text-base">Modifica los datos del miembro</p>
            </div>

            <form id="editarUsuario" action="{{ route('usuarios.update', $usuario->idUsuario) }}" method="POST"
                class="p-8 flex flex-col gap-4">
                @csrf
                @method('PATCH')

                <!-- Datos personales -->
                <h2 class="text-lg font-semibold text-moradoprin border-b-2 border-moradoprin pb-2">Datos Personales
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-1">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $usuario->name) }}"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-sm mt-1">{{ $errors->first("nombre") }}</div>
                    </div>

                    <div>
                        <label for="apellido" class="block text-sm font-semibold text-gray-700 mb-1">Apellidos</label>
                        <input type="text" name="apellido" id="apellido"
                            value="{{ old('apellido', $usuario->Apellidos) }}"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-sm mt-1">{{ $errors->first("apellido") }}</div>
                    </div>
                </div>

                <div>
                    <label for="dni" class="block text-sm font-semibold text-gray-700 mb-1">DNI</label>
                    <input type="text" name="dni" id="dni" value="{{ old('dni', $usuario->Dni) }}"
                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-purple-600 bg-white text-black">
                    <div class="text-red-500 text-sm mt-1">{{ $errors->first("dni") }}</div>
                </div>

                <div>
                    <label for="direccion" class="block text-sm font-semibold text-gray-700 mb-1">Dirección</label>
                    <input type="text" name="direccion" id="direccion"
                        value="{{ old('direccion', $usuario->Direccion) }}"
                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-purple-600 bg-white text-black">
                    <div class="text-red-500 text-sm mt-1">{{ $errors->first("direccion") }}</div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="fecha_nacimiento" class="block text-sm font-semibold text-gray-700 mb-1">Fecha de
                            Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                            value="{{ old('fecha_nacimiento', $usuario->FechaNacimiento) }}"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-sm mt-1">{{ $errors->first("fecha_nacimiento") }}</div>
                    </div>

                    <div>
                        <label for="fecha_alta" class="block text-sm font-semibold text-gray-700 mb-1">Fecha de
                            Alta</label>
                        <input type="date" name="fecha_alta" id="fecha_alta"
                            value="{{ old('fecha_alta', $usuario->FechaAlta) }}"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-sm mt-1">{{ $errors->first("fecha_alta") }}</div>
                    </div>
                </div>

                <!-- Contacto -->
                <h2 class="text-lg font-semibold text-moradoprin border-b-2 border-moradoprin pb-2 mt-4">Contacto</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $usuario->email) }}"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-sm mt-1">{{ $errors->first("email") }}</div>
                    </div>

                    <div>
                        <label for="telefono" class="block text-sm font-semibold text-gray-700 mb-1">Teléfono</label>
                        <input type="tel" name="telefono" id="telefono"
                            value="{{ old('telefono', $usuario->Telefono) }}"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-sm mt-1">{{ $errors->first("telefono") }}</div>
                    </div>
                </div>

                <!-- Acceso -->
                <h2 class="text-lg font-semibold text-moradoprin border-b-2 border-moradoprin pb-2 mt-4">Datos de Acceso
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="usuario" class="block text-sm font-semibold text-gray-700 mb-1">Usuario</label>
                        <input type="text" name="usuario" id="usuario" value="{{ old('usuario', $usuario->Usuario) }}"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-sm mt-1">{{ $errors->first("usuario") }}</div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="Dejar vacío para no cambiar"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-purple-600 bg-white text-black">
                        <div class="text-red-500 text-sm mt-1">{{ $errors->first("password") }}</div>
                    </div>
                </div>

                <!-- Estado en la cofradía -->
                <h2 class="text-lg font-semibold text-moradoprin border-b-2 border-moradoprin pb-2 mt-4">Estado en la
                    Cofradía</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="activo" class="block text-sm font-semibold text-gray-700 mb-1">Activo</label>
                        <select name="activo" id="activo"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-purple-600 bg-white text-black">
                            <option value="SI" {{ old('activo', $usuario->Activo) == 'SI' ? 'selected' : '' }}>Sí</option>
                            <option value="NO" {{ old('activo', $usuario->Activo) == 'NO' ? 'selected' : '' }}>No</option>
                        </select>
                        <div class="text-red-500 text-sm mt-1">{{ $errors->first("activo") }}</div>
                    </div>

                    <div>
                        <label for="participante"
                            class="block text-sm font-semibold text-gray-700 mb-1">Participante</label>
                        <select name="participante" id="participante"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-purple-600 bg-white text-black">
                            <option value="SI" {{ old('participante', $usuario->Participante) == 'SI' ? 'selected' : '' }}>Sí</option>
                            <option value="NO" {{ old('participante', $usuario->Participante) == 'NO' ? 'selected' : '' }}>No</option>
                        </select>
                        <div class="text-red-500 text-sm mt-1">{{ $errors->first("participante") }}</div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="Seccion"
                        class="block text-sm font-semibold text-gray-700 mb-2">Instrumento/Sección</label>
                    <select name="Seccion" id="Seccion"
                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 text-base transition-all focus:outline-none focus:border-purple-600 bg-white text-black">
                        <option value="">Ninguno</option>
                        @foreach($instrumentos as $instrumento)
                            <option value="{{ $instrumento->idInstrumento }}" {{ $usuario->Seccion == $instrumento->idInstrumento ? 'selected' : '' }}>
                                {{ $instrumento->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="junta" class="block text-sm font-semibold text-gray-700 mb-1">Cargo en Junta</label>
                    <select name="junta" id="junta"
                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-purple-600 bg-white text-black">
                        <option value="">Ninguno</option>
                        @foreach($juntas as $junta)
                            <option value="{{ $junta->idJunta }}" {{ old('junta', $usuario->Junta) == $junta->idJunta ? 'selected' : '' }}>
                                {{ $junta->descripcion }}
                            </option>
                        @endforeach
                    </select>
                    <div class="text-red-500 text-sm mt-1">{{ $errors->first("junta") }}</div>
                </div>

                <div>
                    <label for="atributo" class="block text-sm font-semibold text-gray-700 mb-1">Atributo</label>
                    <select name="atributo" id="atributo"
                        class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-purple-600 bg-white text-black">
                        <option value="">Ninguno</option>
                        @foreach($atributos as $atributo)
                            <option value="{{ $atributo->idAtributo }}" {{ old('atributo', $usuario->Atributo) == $atributo->idAtributo ? 'selected' : '' }}>
                                {{ $atributo->descripcion }}
                            </option>
                        @endforeach
                    </select>
                    <div class="text-red-500 text-sm mt-1">{{ $errors->first("atributo") }}</div>
                </div>


        <!-- Botones -->
        <div class="flex gap-4 mt-6">
            <a href="{{ route('usuarios.index') }}"
                class="flex-1 bg-gray-600 text-white text-center font-semibold px-6 py-3 rounded-xl transition-all hover:-translate-y-0.5 hover:shadow-xl">
                Cancelar
            </a>
            <button type="submit"
                class="flex-1 bg-orange-600 text-white font-semibold px-6 py-3 rounded-xl transition-all hover:-translate-y-0.5 hover:shadow-xl">
                Guardar Cambios
            </button>
        </div>
        </form>
    </div>
    </div>

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
                        form.submit();
                    }
                });
            });
        });
         document.addEventListener('DOMContentLoaded', function() {
        const selectActivo = document.getElementById('activo');
        const selectParticipante = document.getElementById('participante');
        const selectSeccion = document.getElementById('Seccion');
        const selectJunta = document.getElementById('junta');
        const selectAtributo = document.getElementById('atributo');

        function actualizarEstadoCampos() {
            const activo = selectActivo.value === 'SI';
            const participante = selectParticipante.value === 'SI';

            // Si está inactivo, deshabilitar todo
            if (!activo) {
                selectParticipante.disabled = true;
                selectSeccion.disabled = true;
                selectJunta.disabled = true;
                selectAtributo.disabled = true;

                // Resetear valores
                selectParticipante.value = 'NO';
                selectSeccion.value = '';
                selectJunta.value = '';
                selectAtributo.value = '';
            } else {
                selectParticipante.disabled = false;

                // Si no participa, deshabilitar sección y atributo pero permitir junta
                if (!participante) {
                    selectSeccion.disabled = true;
                    selectAtributo.disabled = true;
                    selectSeccion.value = '';
                    selectAtributo.value = '';
                } else {
                    selectSeccion.disabled = false;
                    selectAtributo.disabled = false;
                }

                // Junta solo depende de estar activo
                selectJunta.disabled = false;
            }

            // Estilo visual para campos deshabilitados
            [selectParticipante, selectSeccion, selectJunta, selectAtributo].forEach(select => {
                if (select.disabled) {
                    select.classList.add('bg-gray-200', 'cursor-not-allowed');
                    select.classList.remove('bg-white');
                } else {
                    select.classList.remove('bg-gray-200', 'cursor-not-allowed');
                    select.classList.add('bg-white');
                }
            });
        }

        // Ejecutar al cargar
        actualizarEstadoCampos();

        // Ejecutar al cambiar
        selectActivo.addEventListener('change', actualizarEstadoCampos);
        selectParticipante.addEventListener('change', actualizarEstadoCampos);
    });
    </script>
</x-app-layout>
