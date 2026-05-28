<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-orange-50 flex items-center justify-center p-4 lg:p-8">

        <div class="w-full max-w-lg">

            <!-- Formulario -->
            <form class="bg-moradoprin p-6 lg:p-8 rounded-2xl shadow-2xl"
                  method="POST"
                  action="{{ route('password.store') }}">
                @csrf

                <h2 class="text-white text-xl font-bold mb-6">{{ __('Restablecer contraseña') }}</h2>

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div>
                    <x-input-label class="text-white font-semibold" for="email" :value="__('Email')" />
                    <x-text-input id="email"
                                  class="block mt-2 w-full rounded-lg"
                                  type="email"
                                  name="email"
                                  :value="old('email', $request->email)"
                                  required
                                  autofocus
                                  autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-6">
                    <x-input-label class="text-white font-semibold" for="password" :value="__('Nueva contraseña')" />
                    <x-text-input id="password"
                                  class="block mt-2 w-full rounded-lg"
                                  type="password"
                                  name="password"
                                  required
                                  autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-6">
                    <x-input-label class="text-white font-semibold" for="password_confirmation" :value="__('Confirmar contraseña')" />
                    <x-text-input id="password_confirmation"
                                  class="block mt-2 w-full rounded-lg"
                                  type="password"
                                  name="password_confirmation"
                                  required
                                  autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="submit"
                            class="w-full lg:w-auto bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 px-8 rounded-lg transition-all shadow-lg hover:shadow-xl">
                        {{ __('Restablecer contraseña') }}
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
