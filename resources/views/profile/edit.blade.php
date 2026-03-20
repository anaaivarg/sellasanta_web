<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-4 lg:p-8">
        <div class="max-w-3xl mx-auto">
            <!-- Header -->
            <div class="bg-moradoprin p-4 lg:p-6 text-white rounded-t-2xl shadow-xl">
                <h1 class="text-xl lg:text-2xl font-bold">
                    <i class="fa-solid fa-user-circle"></i>
                    Mi Perfil
                </h1>
                <p class="text-white/90 text-xs lg:text-sm mt-1">Gestiona tu información personal</p>
            </div>

            <!-- Formulario -->
            <div class="bg-white p-4 lg:p-6 rounded-b-2xl shadow-xl">
                <h2 class="text-base lg:text-lg font-bold text-gray-900 mb-3 lg:mb-4">
                    Información del Perfil
                </h2>
                <p class="text-xs lg:text-sm text-gray-600 mb-4">
                    Actualiza tu información personal y de contacto
                </p>

                <form method="POST" action="{{ route('profile.update') }}" class="space-y-3 lg:space-y-4">
                    @csrf
                    @method('PATCH')

                    <!-- Nombre -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">
                            Nombre
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $user->name) }}"
                               class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-moradoprin focus:border-transparent"
                               required>
                        @error('name')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Apellidos -->
                    <div>
                        <label for="apellidos" class="block text-sm font-semibold text-gray-700 mb-1">
                            Apellidos
                        </label>
                        <input type="text" 
                               id="apellidos" 
                               name="Apellidos" 
                               value="{{ old('Apellidos', $user->Apellidos) }}"
                               class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-moradoprin focus:border-transparent">
                        @error('Apellidos')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">
                            Email
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email', $user->email) }}"
                               class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-moradoprin focus:border-transparent"
                               required>
                        @error('email')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Teléfono -->
                    <div>
                        <label for="telefono" class="block text-sm font-semibold text-gray-700 mb-1">
                            Teléfono
                        </label>
                        <input type="tel" 
                               id="telefono" 
                               name="Telefono" 
                               value="{{ old('Telefono', $user->Telefono) }}"
                               class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-moradoprin focus:border-transparent">
                        @error('Telefono')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Dirección -->
                    <div>
                        <label for="direccion" class="block text-sm font-semibold text-gray-700 mb-1">
                            Dirección
                        </label>
                        <input type="text" 
                               id="direccion" 
                               name="Direccion" 
                               value="{{ old('Direccion', $user->Direccion) }}"
                               class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-moradoprin focus:border-transparent">
                        @error('Direccion')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- DNI -->
                    <div>
                        <label for="dni" class="block text-sm font-semibold text-gray-700 mb-1">
                            DNI
                        </label>
                        <input type="text" 
                               id="dni" 
                               name="Dni" 
                               value="{{ old('Dni', $user->Dni) }}"
                               class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-moradoprin focus:border-transparent"
                               disabled>
                        <p class="mt-1 text-xs text-gray-500">El DNI no se puede modificar</p>
                    </div>

                    <!-- Botones -->
                    <div class="flex flex-col lg:flex-row gap-2 lg:gap-3 pt-2">
                        <button type="submit" 
                                class="flex-1 bg-moradoprin hover:bg-purple-800 text-white px-4 py-2.5 rounded-lg font-semibold transition-all text-sm">
                            <i class="fa-solid fa-save mr-2"></i>
                            Guardar Cambios
                        </button>
                        <a href="{{ route('dashboard') }}" 
                           class="flex-1 bg-gray-600 hover:bg-gray-700 text-white px-4 py-2.5 rounded-lg font-semibold transition-all text-center text-sm">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ✅ Botón Volver Flotante -->
    <a href="{{ route('dashboard') }}" 
       class="fixed bottom-6 left-6 bg-moradoprin text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-purple-800 transition-all z-40">
        <i class="fa-solid fa-arrow-left text-xl"></i>
    </a>
</x-app-layout>