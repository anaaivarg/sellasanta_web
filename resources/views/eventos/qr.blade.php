<x-app-layout>
<div class="text-center">
    <div class="bg-gradient-to-br from-purple-50 to-orange-50 p-4 rounded-lg inline-block">
        {!! $qr !!}
    </div>
    
    <div class="mt-3 text-sm text-gray-600">
        <p class="font-semibold">{{ $usuario->name }} {{ $usuario->Apellidos }}</p>
        <p>{{ $evento->Nombre }}</p>
        <p>{{ \Carbon\Carbon::parse($evento->Fecha)->format('d/m/Y') }}</p>
    </div>
    
    <!-- ✅ BOTÓN DE PRUEBA -->
    @php
        $data = [
            'usuario_id' => $usuario->idUsuario,
            'evento_id' => $evento->idEvento,
            'timestamp' => now()->timestamp,
        ];
        $token = Crypt::encryptString(json_encode($data));
        $url = route('eventos.registrar', ['token' => $token]);
    @endphp
    
    <div class="mt-4 p-3 bg-blue-50 rounded-lg border border-blue-200">
        <p class="text-xs text-gray-700 font-semibold mb-2">
            🧪 MODO PRUEBA - Simula el escaneo del QR:
        </p>
        <a href="{{ $url }}" 
           target="_blank"
           class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-orange-600 transition-all">
            ✓ Registrar Asistencia
        </a>
        <p class="text-xs text-gray-500 mt-2">
            (Esto simula que el admin escaneó tu QR)
        </p>
    </div>
</div>
</x-app-layout>