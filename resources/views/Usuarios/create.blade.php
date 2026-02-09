<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Encabezado -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                <i class="fa-solid fa-user-plus text-orange-600"></i>
                Añadir Nuevo Cofrade
            </h1>
            <p class="text-gray-600">Complete el formulario para dar de alta un nuevo miembro de la cofradía</p>
        </div>



        <!-- Mensajes de Error -->
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                <p class="font-bold mb-2">Por favor, corrija los siguientes errores:</p>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('usuarios.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-8">
            @csrf

            <!-- Datos Personales -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-orange-600 mb-4 pb-2 border-b-2 border-b-moradoprin">
                    Datos Personales
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nombre -->
                    <div>
                        <label for="name" class="block text-gray-700 font-semibold mb-2">
                            Nombre <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500"
                               required>
                    </div>

                    <!-- Apellidos -->
                    <div>
                        <label for="apellidos" class="block text-gray-700 font-semibold mb-2">
                            Apellidos <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="apellidos"
                               id="apellidos"
                               value="{{ old('apellidos') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500"
                               required>
                    </div>

                    <!-- DNI -->
                    <div>
                        <label for="dni" class="block text-gray-700 font-semibold mb-2">
                            DNI <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="dni"
                               id="dni"
                               value="{{ old('dni') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500"
                               required>
                    </div>

                    <!-- Fecha de Nacimiento -->
                    <div>
                        <label for="fechaNacimiento" class="block text-gray-700 font-semibold mb-2">
                            Fecha de Nacimiento
                        </label>
                        <input type="date"
                               name="fechaNacimiento"
                               id="fechaNacimiento"
                               value="{{ old('fechaNacimiento') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>

                    <!-- Dirección -->
                    <div class="md:col-span-2">
                        <label for="direccion" class="block text-gray-700 font-semibold mb-2">
                            Dirección
                        </label>
                        <input type="text"
                               name="direccion"
                               id="direccion"
                               value="{{ old('direccion') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                </div>
            </div>

            <!-- Datos de Contacto -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-orange-600 mb-4 pb-2 border-b-2 border-b-moradoprin">
                    Datos de Contacto
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-gray-700 font-semibold mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500"
                               required>
                    </div>

                    <!-- Teléfono -->
                    <div>
                        <label for="telefono" class="block text-gray-700 font-semibold mb-2">
                            Teléfono
                        </label>
                        <input type="tel"
                               name="telefono"
                               id="telefono"
                               value="{{ old('telefono') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                </div>
            </div>

            <!-- Datos de Acceso -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-orange-600 mb-4 pb-2 border-b-2 border-b-moradoprin">
                    Datos de Acceso
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Usuario -->
                    <div>
                        <label for="usuario" class="block text-gray-700 font-semibold mb-2">
                            Usuario <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="usuario"
                               id="usuario"
                               value="{{ old('usuario') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500"
                               required>
                    </div>

                    <!-- Contraseña -->
                    <div>
                        <label for="password" class="block text-gray-700 font-semibold mb-2">
                            Contraseña <span class="text-red-500">*</span>
                        </label>
                        <input type="password"
                               name="password"
                               id="password"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500"
                               required>
                    </div>
                </div>
            </div>

            <!-- Estado de Participación -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-orange-600 mb-4 pb-2 border-b-2 border-orange-200">
                    Estado de Participación
                </h2>

                <div class="flex items-center">
                    <input type="checkbox"
                           name="participa"
                           id="participa"
                           value="1"
                           {{ old('participa') ? 'checked' : '' }}
                           class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500 focus:ring-2">
                    <label for="participa" class="ml-3 text-gray-700 font-semibold">
                        ¿El cofrade participa activamente en la hermandad?
                    </label>
                </div>
            </div>

            <!-- Datos de la Cofradía -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-orange-600 mb-4 pb-2 border-b-2 border-b-moradoprin">
                    Datos de la Cofradía
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Instrumento/Sección -->
                    <div>
                        <label for="seccion" class="block text-gray-700 font-semibold mb-2">
                            Instrumento/Sección
                        </label>
                        <select name="seccion"
                                id="seccion"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            <option value="" class="text-gray-700">Seleccione...</option>
                            @isset($instrumentos)
                                @foreach($instrumentos as $instrumento)
                                    <option value="{{ $instrumento->idInstrumento}}"
                                            class="text-gray-700"
                                        {{ old('seccion') == $instrumento->idInstrumento ? 'selected' : '' }}>
                                        {{ $instrumento->descripcion }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                    </div>

                    <!-- Junta de Gobierno -->
                    <div>
                        <label for="junta" class="block text-gray-700 font-semibold mb-2">
                            Junta de Gobierno
                        </label>
                        <select name="junta"
                                id="junta"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            <option value="" class="text-gray-700">Seleccione...</option>
                            @isset($gobiernos)
                                @foreach($gobiernos as $gobierno)
                                    <option value="{{ $gobierno->idJunta}}"
                                            class="text-gray-700"
                                        {{ old('junta') == $gobierno->idJunta ? 'selected' : '' }}>
                                        {{ $gobierno->descripcion }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                    </div>

                    <!-- Atributo -->
                    <div>
                        <label for="atributo" class="block text-gray-700 font-semibold mb-2">
                            Atributo
                        </label>
                        <select name="atributo"
                                id="atributo"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            <option value="" class="text-gray-700">Seleccione...</option>
                            @isset($atributos)
                                @foreach($atributos as $atributo)
                                    <option value="{{ $atributo->idAtributo}}"
                                            class="text-gray-700"
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
            <div class="flex justify-end gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('usuarios.index') }}"
                   class="bg-gray-500 text-white px-6 py-3 rounded-xl font-semibold transition-all hover:-translate-y-0.5 hover:shadow-xl">
                    <i class="fa-solid fa-times"></i> Cancelar
                </a>
                <button type="submit"
                        class="bg-orange-600 text-white px-6 py-3 rounded-xl font-semibold transition-all hover:-translate-y-0.5 hover:shadow-xl">
                    <i class="fa-solid fa-save"></i> Guardar Cofrade
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
