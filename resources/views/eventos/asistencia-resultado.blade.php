<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-8">
        <div class="max-w-md w-full bg-white rounded-2xl shadow-2xl overflow-hidden">
            
            @if($success)
                <!-- Éxito -->
                <div class="bg-green-600 p-8 text-white text-center">
                    <div class="text-6xl mb-4">✓</div>
                    <h1 class="text-2xl font-bold">¡Asistencia Registrada!</h1>
                </div>
                
                <div class="p-8 text-center">
                    <p class="text-gray-600 mb-4">{{ $message }}</p>
                    
                    @if(isset($usuario) && isset($evento))
                        <div class="bg-gray-50 rounded-lg p-4 mb-6">
                            <p class="font-bold text-lg text-moradoprin">{{ $usuario->name }} {{ $usuario->Apellidos }}</p>
                            <p class="text-gray-700">{{ $evento->Nombre }}</p>
                            <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($evento->Fecha)->format('d/m/Y') }} - {{ $evento->hora }}</p>
                        </div>
                    @endif
                    
                    <a href="{{ route('dashboard') }}" 
                       class="inline-block bg-orange-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-orange-700 transition-all">
                        Volver 
                    </a>
                </div>
            @else
                <!-- Error -->
                <div class="bg-red-600 p-8 text-white text-center">
                    <div class="text-6xl mb-4">✗</div>
                    <h1 class="text-2xl font-bold">Error</h1>
                </div>
                
                <div class="p-8 text-center">
                    <p class="text-gray-600 mb-6">{{ $message }}</p>
                    
                    <a href="{{ route('eventos.usuario') }}" 
                       class="inline-block bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-gray-700 transition-all">
                        Volver
                    </a>
                </div>
            @endif
            
        </div>
    </div>
</x-app-layout>