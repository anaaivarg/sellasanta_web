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
                        <a class="text-sm text-white hover:text-orange-600 underline transition-colors" 
                           href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif

                    <button type="submit"
                            class="w-full lg:w-auto bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 px-8 rounded-lg transition-all shadow-lg hover:shadow-xl">
                        {{ __('Iniciar Sesión') }}
                    </button>
                </div>

                <!-- Separador -->
                <div class="flex items-center my-6">
                    <div class="flex-1 border-t border-purple-300/40"></div>
                    <span class="mx-3 text-purple-200 text-xs uppercase tracking-widest">o continúa con</span>
                    <div class="flex-1 border-t border-purple-300/40"></div>
                </div>

                <!-- Botón Google -->
                <a href="{{ route('google.redirect') }}"
                   class="w-full flex items-center justify-center gap-3 bg-white/10 hover:bg-white/20 border border-purple-300/30 text-white font-semibold py-3 px-6 rounded-lg transition-all shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5 shrink-0" viewBox="0 0 488 512" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/>
                    </svg>
                    {{ __('Iniciar sesión con Google') }}
                </a>

            </form>

            <!-- Footer -->
            <p class="text-center text-gray-600 text-sm mt-6">
                © 2025 Cofradía La Llegada de Jesús al Calvario
            </p>
        </div>
    </div>
</x-app-layout>