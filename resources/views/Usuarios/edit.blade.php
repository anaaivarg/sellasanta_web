<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-4 lg:p-8">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="bg-moradoprin p-4 lg:p-8 text-white rounded-t-2xl shadow-xl">
                <h1 class="text-xl lg:text-3xl font-bold mb-2">
                    Editar Cofrade
                </h1>
                <p class="text-white/90 text-xs lg:text-base">Modifica los datos del miembro de la cofradía</p>
            </div>

            <!-- Formulario -->
            <div class="bg-white rounded-b-2xl shadow-xl p-4 lg:p-8">
                <!-- Mensajes de Error -->
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg">
                        <p class="font-bold mb-2">Por favor, corrija los siguientes errores:</p>
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="editarUsuario" action="{{ route('usuarios.update', $usuario->idUsuario) }}" method="POST" class="space-y-6 lg:space-y-8">
                    @csrf
                    @method('PATCH')

                    <!-- Datos Personales -->
                    <div>
                        <h2 class="text-lg lg:text-xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-orange-600 flex items-center gap-2">
                            <i class="fa-solid fa-user text-orange-600"></i>
                            Datos Personales
                        </h2>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                            <!-- Nombre -->
                            <div>
                                <label for="nombre" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-id-card text-orange-600"></i> Nombre <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="nombre" id="nombre"
                                    value="{{ old('nombre', $usuario->name) }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                                    required>
                                <div class="text-red-500 text-xs mt-1">{{ $errors->first("nombre") }}</div>
                            </div>

                            <!-- Apellidos -->
                            <div>
                                <label for="apellido" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-id-card text-orange-600"></i> Apellidos <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="apellido" id="apellido"
                                    value="{{ old('apellido', $usuario->Apellidos) }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                                    required>
                                <div class="text-red-500 text-xs mt-1">{{ $errors->first("apellido") }}</div>
                            </div>

                            <!-- DNI -->
                            <div>
                                <label for="dni" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-address-card text-orange-600"></i> DNI <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="dni" id="dni"
                                    value="{{ old('dni', $usuario->Dni) }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                                    required>
                                <div class="text-red-500 text-xs mt-1">{{ $errors->first("dni") }}</div>
                            </div>

                            <!-- Fecha de Nacimiento -->
                            <div>
                                <label for="fecha_nacimiento" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-calendar text-orange-600"></i> Fecha de Nacimiento
                                </label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                                    value="{{ old('fecha_nacimiento', $usuario->FechaNacimiento) }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <div class="text-red-500 text-xs mt-1">{{ $errors->first("fecha_nacimiento") }}</div>
                            </div>

                            <!-- Fecha de Alta -->
                            <div>
                                <label for="fecha_alta" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-calendar-check text-orange-600"></i> Fecha de Alta
                                </label>
                                <input type="date" name="fecha_alta" id="fecha_alta"
                                    value="{{ old('fecha_alta', $usuario->FechaAlta) }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <div class="text-red-500 text-xs mt-1">{{ $errors->first("fecha_alta") }}</div>
                            </div>

                            <!-- Dirección -->
                            <div>
                                <label for="direccion" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-location-dot text-orange-600"></i> Dirección
                                </label>
                                <input type="text" name="direccion" id="direccion"
                                    value="{{ old('direccion', $usuario->Direccion) }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <div class="text-red-500 text-xs mt-1">{{ $errors->first("direccion") }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Datos de Contacto -->
                    <div>
                        <h2 class="text-lg lg:text-xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-orange-600 flex items-center gap-2">
                            <i class="fa-solid fa-address-book text-orange-600"></i>
                            Datos de Contacto
                        </h2>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-envelope text-orange-600"></i> Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', $usuario->email) }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                                    required>
                                <div class="text-red-500 text-xs mt-1">{{ $errors->first("email") }}</div>
                            </div>

                            <!-- Teléfono -->
                            <div>
                                <label for="telefono" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-phone text-orange-600"></i> Teléfono
                                </label>
                                <input type="tel" name="telefono" id="telefono"
                                    value="{{ old('telefono', $usuario->Telefono) }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <div class="text-red-500 text-xs mt-1">{{ $errors->first("telefono") }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Datos de Acceso -->
                    <div>
                        <h2 class="text-lg lg:text-xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-orange-600 flex items-center gap-2">
                            <i class="fa-solid fa-key text-orange-600"></i>
                            Datos de Acceso
                        </h2>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                            <!-- Usuario -->
                            <div>
                                <label for="usuario" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-user-circle text-orange-600"></i> Usuario <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="usuario" id="usuario"
                                    value="{{ old('usuario', $usuario->Usuario) }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                                    required>
                                <div class="text-red-500 text-xs mt-1">{{ $errors->first("usuario") }}</div>
                            </div>

                            <!-- Contraseña -->
                            <div>
                                <label for="password" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-lock text-orange-600"></i> Contraseña
                                </label>
                                <input type="password" name="password" id="password"
                                    placeholder="Dejar vacío para no cambiar"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                                <div class="text-red-500 text-xs mt-1">{{ $errors->first("password") }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Estado en la Cofradía -->
                    <div>
                        <h2 class="text-lg lg:text-xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-orange-600 flex items-center gap-2">
                            <i class="fa-solid fa-church text-orange-600"></i>
                            Estado en la Cofradía
                        </h2>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                            <!-- Activo -->
                            <div>
                                <label for="activo" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-toggle-on text-orange-600"></i> Activo
                                </label>
                                <select name="activo" id="activo"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 bg-white">
                                    <option value="SI" {{ (old('activo', $usuario->Activo) ?? 'NO') == 'SI' ? 'selected' : '' }}>Sí</option>
                                    <option value="NO" {{ (old('activo', $usuario->Activo) ?? 'NO') == 'NO' ? 'selected' : '' }}>No</option>
                                </select>
                                <div class="text-red-500 text-xs mt-1">{{ $errors->first("activo") }}</div>
                            </div>

                            <!-- Participante -->
                            <div>
                                <label for="participante" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-check-circle text-orange-600"></i> Participante
                                </label>
                                <select name="participante" id="participante"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 bg-white">
                                    <option value="SI" {{ old('participante', $usuario->Participante) == 'SI' ? 'selected' : '' }}>Sí</option>
                                    <option value="NO" {{ old('participante', $usuario->Participante) == 'NO' ? 'selected' : '' }}>No</option>
                                </select>
                                <div class="text-red-500 text-xs mt-1">{{ $errors->first("participante") }}</div>
                            </div>

                            <!-- Instrumento/Sección -->
                            <div>
                                <label for="Seccion" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-music text-orange-600"></i> Instrumento/Sección
                                </label>
                                <select name="Seccion" id="Seccion"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 bg-white">
                                    <option value="" {{ empty($usuario->Seccion) || $usuario->Seccion == 1 ? 'selected' : '' }}>Ninguno</option>
                                    @foreach($instrumentos as $instrumento)
                                        @if($instrumento->idInstrumento != 1)
                                            <option value="{{ $instrumento->idInstrumento }}"
                                                {{ old('Seccion', $usuario->Seccion) == $instrumento->idInstrumento ? 'selected' : '' }}>
                                                {{ $instrumento->descripcion }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <!-- Cargo en Junta -->
                            <div>
                                <label for="junta" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-gavel text-orange-600"></i> Cargo en Junta
                                </label>
                                <select name="junta" id="junta"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 bg-white">
                                    <option value="" {{ empty($usuario->Junta) || $usuario->Junta == 1 ? 'selected' : '' }}>Ninguno</option>
                                    @foreach($juntas as $junta)
                                        @if($junta->idJunta != 1)
                                            <option value="{{ $junta->idJunta }}"
                                                {{ old('junta', $usuario->Junta) == $junta->idJunta ? 'selected' : '' }}>
                                                {{ $junta->descripcion }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="text-red-500 text-xs mt-1">{{ $errors->first("junta") }}</div>
                            </div>

                            <!-- Atributo -->
                            <div>
                                <label for="atributo" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-cross text-orange-600"></i> Atributo
                                </label>
                                <select name="atributo" id="atributo"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 bg-white">
                                    <option value="" {{ empty($usuario->Atributo) || $usuario->Atributo == 1 ? 'selected' : '' }}>Ninguno</option>
                                    @foreach($atributos as $atributo)
                                        @if($atributo->idAtributo != 1)
                                            <option value="{{ $atributo->idAtributo }}"
                                                {{ old('atributo', $usuario->Atributo) == $atributo->idAtributo ? 'selected' : '' }}>
                                                {{ $atributo->descripcion }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="text-red-500 text-xs mt-1">{{ $errors->first("atributo") }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex flex-col lg:flex-row justify-end gap-3 pt-6 border-t-2 border-gray-200">
                        <a href="{{ route('usuarios.index') }}"
                            class="bg-gray-500 text-white px-6 py-2.5 rounded-xl font-semibold hover:bg-gray-600 transition-all text-sm text-center">
                            <i class="fa-solid fa-times"></i> Cancelar
                        </a>
                        <button type="submit"
                            class="bg-orange-600 text-white px-6 py-2.5 rounded-xl font-semibold hover:bg-orange-700 transition-all text-sm">
                            <i class="fa-solid fa-save"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Botón Volver Flotante -->
    <a href="{{ route('usuarios.index') }}"
        class="fixed bottom-6 left-6 bg-moradoprin text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-orange-600 transition-all z-40">
        <i class="fa-solid fa-arrow-left text-xl"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('editarUsuario');
            const selectActivo = document.getElementById('activo');
            const selectParticipante = document.getElementById('participante');
            const selectSeccion = document.getElementById('Seccion');
            const selectJunta = document.getElementById('junta');
            const selectAtributo = document.getElementById('atributo');

            let esCargarInicial = true;

            function actualizarEstadoCampos() {
                const activo = selectActivo.value === 'SI';
                const participante = selectParticipante.value === 'SI';

                if (!activo) {
                    selectParticipante.disabled = true;
                    selectSeccion.disabled = true;
                    selectJunta.disabled = true;
                    selectAtributo.disabled = true;

                    if (!esCargarInicial) {
                        selectParticipante.value = 'NO';
                        selectSeccion.value = '';
                        selectJunta.value = '';
                        selectAtributo.value = '';
                    }
                } else {
                    selectParticipante.disabled = false;
                    selectJunta.disabled = false;

                    if (!participante) {
                        selectSeccion.disabled = true;
                        selectAtributo.disabled = true;

                        if (!esCargarInicial) {
                            selectSeccion.value = '';
                            selectAtributo.value = '';
                        }
                    } else {
                        selectSeccion.disabled = false;
                        selectAtributo.disabled = false;
                    }
                }

                [selectParticipante, selectSeccion, selectJunta, selectAtributo].forEach(select => {
                    if (select.disabled) {
                        select.classList.add('bg-gray-100', 'cursor-not-allowed');
                        select.classList.remove('bg-white');
                    } else {
                        select.classList.remove('bg-gray-100', 'cursor-not-allowed');
                        select.classList.add('bg-white');
                    }
                });

                esCargarInicial = false;
            }

            actualizarEstadoCampos();
            selectActivo.addEventListener('change', actualizarEstadoCampos);
            selectParticipante.addEventListener('change', actualizarEstadoCampos);

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
                        selectParticipante.disabled = false;
                        selectSeccion.disabled = false;
                        selectJunta.disabled = false;
                        selectAtributo.disabled = false;
                        form.submit();
                    }
                });
            });
        });
    </script>
</x-app-layout>
