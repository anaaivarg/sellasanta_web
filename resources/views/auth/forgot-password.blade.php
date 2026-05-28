<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-orange-50 flex items-center justify-center p-4 lg:p-8">

        <div class="w-full max-w-lg">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Formulario -->
            <form class="bg-moradoprin p-6 lg:p-8 rounded-2xl shadow-2xl"
                  method="POST"
                  action="{{ route('password.email') }}">
                @csrf

                <h2 class="text-white text-xl font-bold mb-2">{{ __('¿Olvidaste tu contraseña?') }}</h2>
                <p class="text-purple-200 text-sm mb-6">
                    {{ __('No hay problema. Indícanos tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.') }}
                </p>

                <!-- Email Address -->
                <div>
                    <x-input-label class="text-white font-semibold" for="email" :value="__('Email')" />
                    <x-text-input id="email"
                                  class="block mt-2 w-full rounded-lg"
                                  type="email"
                                  name="email"
                                  :value="old('email')"
                                  required
                                  autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex flex-col lg:flex-row items-center justify-between mt-6 gap-4">
                    <a href="{{ route('login') }}"
                       class="text-sm text-white hover:text-orange-400 underline transition-colors">
                        {{ __('Volver al inicio de sesión') }}
                    </a>

                    <button type="submit"
                            class="w-full lg:w-auto bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 px-8 rounded-lg transition-all shadow-lg hover:shadow-xl">
                        {{ __('Enviar enlace') }}
                    </button>
                </div>
            </form>

            <!-- Footer -->
            <p class="text-center text-gray-600 text-sm mt-6">
                © 2026 Cofradía La Llegada de Jesús al Calvario
            </p>
        </div>
    </div>
</x-app-layout>
