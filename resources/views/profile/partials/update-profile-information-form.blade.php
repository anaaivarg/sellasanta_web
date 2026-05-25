<section>
    <header class="mb-4">
        <p class="text-sm text-gray-600">
            Actualiza tu información personal y de contacto.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('patch')

        <!-- Nombre -->
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nombre</label>
            <input type="text" 
                   id="name" 
                   name="name" 
                   value="{{ old('name', $user->name) }}" 
                   required 
                   autofocus 
                   autocomplete="name"
                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-moradoprin focus:ring-0 bg-white text-black">
            @if($errors->get('name'))
                <div class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <!-- Apellidos -->
        <div>
            <label for="apellidos" class="block text-sm font-semibold text-gray-700 mb-2">Apellidos</label>
            <input type="text" 
                   id="apellidos" 
                   name="apellidos" 
                   value="{{ old('apellidos', $user->Apellidos) }}"
                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-moradoprin focus:ring-0 bg-white text-black">
            @if($errors->get('apellidos'))
                <div class="text-red-500 text-sm mt-1">{{ $errors->first('apellidos') }}</div>
            @endif
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
            <input type="email" 
                   id="email" 
                   name="email" 
                   value="{{ old('email', $user->email) }}" 
                   required 
                   autocomplete="username"
                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-moradoprin focus:ring-0 bg-white text-black">
            @if($errors->get('email'))
                <div class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</div>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-800">
                        Tu dirección de email no está verificada.
                        <button form="send-verification" 
                                class="underline text-sm text-moradoprin hover:text-orange-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-moradoprin">
                            Haz clic aquí para reenviar el email de verificación.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            Se ha enviado un nuevo enlace de verificación a tu email.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Teléfono -->
        <div>
            <label for="telefono" class="block text-sm font-semibold text-gray-700 mb-2">Teléfono</label>
            <input type="tel" 
                   id="telefono" 
                   name="telefono" 
                   value="{{ old('telefono', $user->Telefono) }}"
                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-moradoprin focus:ring-0 bg-white text-black">
            @if($errors->get('telefono'))
                <div class="text-red-500 text-sm mt-1">{{ $errors->first('telefono') }}</div>
            @endif
        </div>

        <!-- Dirección -->
        <div>
            <label for="direccion" class="block text-sm font-semibold text-gray-700 mb-2">Dirección</label>
            <input type="text" 
                   id="direccion" 
                   name="direccion" 
                   value="{{ old('direccion', $user->Direccion) }}"
                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 focus:outline-none focus:border-moradoprin focus:ring-0 bg-white text-black">
            @if($errors->get('direccion'))
                <div class="text-red-500 text-sm mt-1">{{ $errors->first('direccion') }}</div>
            @endif
        </div>

        <!-- DNI (solo lectura - no editable) -->
        <div>
            <label for="dni" class="block text-sm font-semibold text-gray-700 mb-2">DNI</label>
            <input type="text" 
                   id="dni" 
                   value="{{ $user->Dni }}"
                   disabled
                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 bg-gray-100 text-gray-500 cursor-not-allowed">
            <p class="text-xs text-gray-500 mt-1">El DNI no puede ser modificado. Contacta con un administrador.</p>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" 
                    class="bg-orange-600 text-white font-semibold px-6 py-3 rounded-xl transition-all hover:-translate-y-0.5 hover:shadow-xl hover:bg-orange-700">
                Guardar Cambios
            </button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-green-600 font-medium">Información actualizada correctamente</p>
            @endif
        </div>
    </form>
</section>