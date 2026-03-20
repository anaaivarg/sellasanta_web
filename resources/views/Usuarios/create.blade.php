<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-4 lg:p-8">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="bg-moradoprin p-4 lg:p-8 text-white rounded-t-2xl shadow-xl">
                <h1 class="text-xl lg:text-3xl font-bold mb-2">
                    
                    Añadir Nuevo Cofrade
                </h1>
                <p class="text-white/90 text-xs lg:text-base">Complete el formulario para dar de alta un nuevo miembro de la cofradía</p>
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

                <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-6 lg:space-y-8">
                    @csrf

                    <!-- Datos Personales -->
                    <div>
                        <h2 class="text-lg lg:text-xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-orange-600 flex items-center gap-2">
                            <i class="fa-solid fa-user text-orange-600"></i>
                            Datos Personales
                        </h2>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                            <!-- Nombre -->
                            <div>
                                <label for="name" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-id-card text-orange-600"></i> Nombre <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                       name="name"
                                       id="name"
                                       value="{{ old('name') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                                       required>
                            </div>

                            <!-- Apellidos -->
                            <div>
                                <label for="apellidos" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-id-card text-orange-600"></i> Apellidos <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                       name="apellidos"
                                       id="apellidos"
                                       value="{{ old('apellidos') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                                       required>
                            </div>

                            <!-- DNI -->
                            <div>
                                <label for="dni" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-address-card text-orange-600"></i> DNI <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                       name="dni"
                                       id="dni"
                                       value="{{ old('dni') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                                       required>
                            </div>

                            <!-- Fecha de Nacimiento -->
                            <div>
                                <label for="fechaNacimiento" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-calendar text-orange-600"></i> Fecha de Nacimiento
                                </label>
                                <input type="date"
                                       name="fechaNacimiento"
                                       id="fechaNacimiento"
                                       value="{{ old('fechaNacimiento') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>

                            <!-- Dirección -->
                            <div class="lg:col-span-2">
                                <label for="direccion" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-location-dot text-orange-600"></i> Dirección
                                </label>
                                <input type="text"
                                       name="direccion"
                                       id="direccion"
                                       value="{{ old('direccion') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
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
                                <input type="email"
                                       name="email"
                                       id="email"
                                       value="{{ old('email') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                                       required>
                            </div>

                            <!-- Teléfono -->
                            <div>
                                <label for="telefono" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-phone text-orange-600"></i> Teléfono
                                </label>
                                <input type="tel"
                                       name="telefono"
                                       id="telefono"
                                       value="{{ old('telefono') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
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
                                <input type="text"
                                       name="usuario"
                                       id="usuario"
                                       value="{{ old('usuario') }}"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                                       required>
                            </div>

                            <!-- Contraseña -->
                            <div>
                                <label for="password" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-lock text-orange-600"></i> Contraseña <span class="text-red-500">*</span>
                                </label>
                                <input type="password"
                                       name="password"
                                       id="password"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                                       required>
                            </div>
                        </div>
                    </div>

                    <!-- Estado de Participación -->
                    <div>
                        <h2 class="text-lg lg:text-xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-orange-600 flex items-center gap-2">
                            <i class="fa-solid fa-check-circle text-orange-600"></i>
                            Estado de Participación
                        </h2>

                        <label class="flex items-center cursor-pointer p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <input type="checkbox"
                                   name="participa"
                                   id="participa"
                                   value="1"
                                   {{ old('participa') ? 'checked' : '' }}
                                   class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500 focus:ring-2">
                            <span class="ml-3 text-gray-700 font-semibold text-sm">
                                 ¿El cofrade participa activamente en la hermandad?
                            </span>
                        </label>
                    </div>

                    <!-- Datos de la Cofradía -->
                    <div>
                        <h2 class="text-lg lg:text-xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-orange-600 flex items-center gap-2">
                            <i class="fa-solid fa-church text-orange-600"></i>
                            Datos de la Cofradía
                        </h2>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6">
                            <!-- Instrumento/Sección -->
                            <div>
                                <label for="seccion" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-music text-orange-600"></i> Instrumento/Sección
                                </label>
                                <select name="seccion"
                                        id="seccion"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                                    <option value="">Seleccione...</option>
                                    @isset($instrumentos)
                                        @foreach($instrumentos as $instrumento)
                                            <option value="{{ $instrumento->idInstrumento}}"
                                                {{ old('seccion') == $instrumento->idInstrumento ? 'selected' : '' }}>
                                                {{ $instrumento->descripcion }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>

                            <!-- Junta de Gobierno -->
                            <div>
                                <label for="junta" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-gavel text-orange-600"></i> Junta de Gobierno
                                </label>
                                <select name="junta"
                                        id="junta"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                                    <option value="">Seleccione...</option>
                                    @isset($gobiernos)
                                        @foreach($gobiernos as $gobierno)
                                            <option value="{{ $gobierno->idJunta}}"
                                                {{ old('junta') == $gobierno->idJunta ? 'selected' : '' }}>
                                                {{ $gobierno->descripcion }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>

                            <!-- Atributo -->
                            <div>
                                <label for="atributo" class="block text-gray-700 font-semibold mb-2 text-sm">
                                    <i class="fa-solid fa-cross text-orange-600"></i> Atributo
                                </label>
                                <select name="atributo"
                                        id="atributo"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                                    <option value="">Seleccione...</option>
                                    @isset($atributos)
                                        @foreach($atributos as $atributo)
                                            <option value="{{ $atributo->idAtributo}}"
                                                {{ old('atributo') == $atributo->idAtributo ? 'selected' : '' }}>
                                                {{ $atributo->descripcion }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
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
                            <i class="fa-solid fa-save"></i> Guardar Cofrade
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Botón Volver Flotante -->
    <a href="{{ route('dashboard') }}"
        class="fixed bottom-6 left-6 bg-moradoprin text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-purple-800 transition-all z-50">
        <i class="fa-solid fa-arrow-left text-xl"></i>
    </a>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const nombreInput = document.getElementById('name');
        const apellidosInput = document.getElementById('apellidos');
        const usuarioInput = document.getElementById('usuario');
        const passwordInput = document.getElementById('password');

        // Función para generar el usuario
        function generarUsuario() {
            const nombre = nombreInput.value.trim();
            const apellidos = apellidosInput.value.trim();

            if (nombre && apellidos) {
                // Tomar las 3 primeras letras del nombre
                const prefijo = nombre.substring(0, 3).toLowerCase();
                
                // Tomar el primer apellido completo
                const primerApellido = apellidos.split(' ')[0].toLowerCase();
                
                // Generar 2 números aleatorios
                const numeros = Math.floor(Math.random() * 90 + 10); // Número entre 10 y 99
                
                // Crear usuario y contraseña
                const usuarioGenerado = prefijo + primerApellido + numeros;
                
                // Asignar valores
                usuarioInput.value = usuarioGenerado;
                passwordInput.value = usuarioGenerado;
            }
        }

        // Escuchar cambios en nombre y apellidos
        nombreInput.addEventListener('blur', generarUsuario);
        apellidosInput.addEventListener('blur', generarUsuario);
    });
</script>
</x-app-layout>