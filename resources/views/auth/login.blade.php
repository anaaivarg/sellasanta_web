<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-orange-50 flex items-center justify-center p-4 lg:p-8">
        
        <!-- ✅ ESTE DIV debe tener max-w-md -->
        <div class="w-full max-w-lg">
            <!-- Botón Volver -->
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Formulario -->
            <form class="bg-moradoprin p-6 lg:p-8 rounded-2xl shadow-2xl" 
                  method="POST" 
                  action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label class="text-white font-semibold" for="email" :value="__('Email')" />
                    <x-text-input id="email" 
                                  class="block mt-2 w-full rounded-lg" 
                                  type="email" 
                                  name="email" 
                                  :value="old('email')" 
                                  required 
                                  autofocus 
                                  autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-6">
                    <x-input-label class="text-white font-semibold" for="password" :value="__('Contraseña')" />
                    <x-text-input id="password" 
                                  class="block mt-2 w-full rounded-lg"
                                  type="password"
                                  name="password"
                                  required 
                                  autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-6">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer">
                        <input id="remember_me" 
                               type="checkbox" 
                               class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-500" 
                               name="remember">
                        <span class="ms-2 text-sm text-white">{{ __('Recuérdame') }}</span>
                    </label>
                </div>

                <!-- Botones -->
                <div class="flex flex-col lg:flex-row items-center justify-between mt-6 gap-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-white hover:text-orange-300 underline transition-colors" 
                           href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif

                    <button type="submit" 
                            class="w-full lg:w-auto bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-8 rounded-lg transition-all shadow-lg hover:shadow-xl">
                        {{ __('Iniciar Sesión') }}
                    </button>
                </div>
            </form>

            <!-- Footer -->
            <p class="text-center text-gray-600 text-sm mt-6">
                © 2025 Cofradía La Llegada de Jesús al Calvario
            </p>
        </div>
    </div>
</x-app-layout>