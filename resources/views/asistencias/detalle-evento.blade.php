<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-4 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header - MÁS COMPACTO EN MÓVIL -->
            <div class="bg-moradoprin p-4 lg:p-8 text-white rounded-t-2xl shadow-xl">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h1 class="text-xl lg:text-3xl font-bold mb-1 lg:mb-2">
                            <i class="fa-solid fa-users"></i>
                            {{ $evento->Nombre }}
                        </h1>
                        <p class="text-white/90 text-sm lg:text-base">
                            {{ \Carbon\Carbon::parse($evento->Fecha)->format('d/m/Y') }} - {{ $evento->hora ?? 'Sin hora' }}
                        </p>
                        @if($evento->descripcion)
                            <p class="text-white/80 text-xs lg:text-sm mt-1">{{ $evento->descripcion }}</p>
                        @endif
                    </div>
                    <a href="{{ route('asistencias.index') }}" 
                       class="bg-white/20 hover:bg-white/30 text-white px-3 py-2 lg:px-4 lg:py-2 rounded-lg transition-all text-sm lg:text-base">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span class="hidden lg:inline"> Volver</span>
                    </a>
                </div>
            </div>

            <!-- Estadísticas rápidas - 2x2 EN MÓVIL -->
            <div class="bg-white p-3 lg:p-6 border-b-2 border-gray-200">
                @php
                    $asistieron = $usuarios->where('asistio', true)->count();
                    $faltaron = $usuarios->where('asistio', false)->count();
                    $total = $usuarios->count();
                    $porcentajeEvento = $total > 0 ? round(($asistieron / $total) * 100, 1) : 0;
                @endphp
                
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 lg:gap-4">
                    <div class="bg-green-50 p-2 lg:p-4 rounded-lg text-center">
                        <p class="text-xs lg:text-sm text-gray-600">Asistieron</p>
                        <p class="text-xl lg:text-3xl font-bold text-green-600">{{ $asistieron }}</p>
                    </div>
                    <div class="bg-red-50 p-2 lg:p-4 rounded-lg text-center">
                        <p class="text-xs lg:text-sm text-gray-600">Faltaron</p>
                        <p class="text-xl lg:text-3xl font-bold text-red-600">{{ $faltaron }}</p>
                    </div>
                    <div class="bg-blue-50 p-2 lg:p-4 rounded-lg text-center">
                        <p class="text-xs lg:text-sm text-gray-600">Total</p>
                        <p class="text-xl lg:text-3xl font-bold text-blue-600">{{ $total }}</p>
                    </div>
                    <div class="bg-purple-50 p-2 lg:p-4 rounded-lg text-center">
                        <p class="text-xs lg:text-sm text-gray-600">% Asist.</p>
                        <p class="text-xl lg:text-3xl font-bold text-moradoprin">{{ $porcentajeEvento }}%</p>
                    </div>
                </div>
            </div>

            <!-- VISTA MÓVIL: Lista de tarjetas -->
            <div class="lg:hidden bg-white rounded-b-2xl shadow-xl overflow-hidden p-4">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-bold text-gray-900">
                        <i class="fa-solid fa-list"></i> Participantes
                    </h2>
                    <div class="flex gap-2 text-xs">
                        <div class="flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-green-500"></span>
                            <span class="text-gray-600">Asistió</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-red-500"></span>
                            <span class="text-gray-600">Faltó</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    @forelse($usuarios as $item)
                        <div class="border-l-4 {{ $item['asistio'] ? 'border-green-500 bg-green-50' : 'border-red-500 bg-red-50' }} p-3 rounded-r-lg">
                            <div class="flex items-start gap-3">
                                <div class="bg-moradoprin text-white w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0">
                                    {{ substr($item['usuario']->name, 0, 1) }}{{ substr($item['usuario']->Apellidos ?? '', 0, 1) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <p class="font-bold text-gray-900 text-sm truncate">
                                            {{ $item['usuario']->name }} {{ $item['usuario']->Apellidos }}
                                        </p>
                                        @if($item['asistio'])
                                            <i class="fa-solid fa-check-circle text-green-600 flex-shrink-0"></i>
                                        @else
                                            <i class="fa-solid fa-times-circle text-red-600 flex-shrink-0"></i>
                                        @endif
                                    </div>
                                    <p class="text-xs text-gray-600 mb-2">
                                        {{ $item['usuario']->seccion->descripcion ?? 'Sin sección' }}
                                    </p>
                                    <div class="flex items-center justify-between text-xs">
                                        <span class="text-gray-700">
                                            <strong>{{ $item['totalAsistidos'] }}</strong>/{{ $item['totalEnsayos'] }} ensayos
                                        </span>
                                        <span class="px-2 py-1 rounded-full font-semibold
                                            {{ $item['porcentaje'] >= 75 ? 'bg-green-100 text-green-800' : ($item['porcentaje'] >= 50 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                            {{ $item['porcentaje'] }}%
                                        </span>
                                    </div>
                                    <a href="{{ route('asistencias.usuario', $item['usuario']->idUsuario) }}" 
                                       class="mt-2 inline-flex items-center text-moradoprin hover:text-orange-600 font-semibold text-xs">
                                        <i class="fa-solid fa-chart-line mr-1"></i>
                                        Ver historial
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 py-8">No hay participantes</p>
                    @endforelse
                </div>
            </div>

            <!-- VISTA PC: Tabla completa -->
            <div class="hidden lg:block bg-white rounded-b-2xl shadow-xl overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-bold text-gray-900">
                            <i class="fa-solid fa-list"></i> Lista de Participantes
                        </h2>
                        <div class="flex gap-4 text-sm">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-green-500"></span>
                                <span class="text-gray-600">Asistió</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-red-500"></span>
                                <span class="text-gray-600">Faltó</span>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                        <i class="fa-solid fa-circle-check"></i> Estado
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Cofrade</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Sección</th>
                                    <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Ensayos Asistidos</th>
                                    <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">% Asistencia Total</th>
                                    <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($usuarios as $item)
                                    <tr class="hover:bg-gray-50 transition-colors {{ $item['asistio'] ? 'bg-green-50/30' : 'bg-red-50/30' }}">
                                        <td class="px-6 py-4">
                                            @if($item['asistio'])
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                                    <i class="fa-solid fa-check-circle mr-2"></i>
                                                    Asistió
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-800">
                                                    <i class="fa-solid fa-times-circle mr-2"></i>
                                                    Faltó
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="bg-moradoprin text-white w-10 h-10 rounded-full flex items-center justify-center font-bold">
                                                    {{ substr($item['usuario']->name, 0, 1) }}{{ substr($item['usuario']->Apellidos ?? '', 0, 1) }}
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-gray-900">{{ $item['usuario']->name }} {{ $item['usuario']->Apellidos }}</p>
                                                    <p class="text-xs text-gray-500">{{ $item['usuario']->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-gray-700">
                                            {{ $item['usuario']->seccion->descripcion ?? 'Sin sección' }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="font-bold text-gray-900">{{ $item['totalAsistidos'] }}</span>
                                            <span class="text-gray-500">/ {{ $item['totalEnsayos'] }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                                                {{ $item['porcentaje'] >= 75 ? 'bg-green-100 text-green-800' : ($item['porcentaje'] >= 50 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                                {{ $item['porcentaje'] }}%
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="{{ route('asistencias.usuario', $item['usuario']->idUsuario) }}" 
                                               class="inline-flex items-center px-4 py-2 bg-moradoprin text-white rounded-lg hover:bg-orange-600 transition-all text-sm">
                                                <i class="fa-solid fa-chart-line mr-2"></i>
                                                Ver Historial
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                            <i class="fa-solid fa-inbox text-4xl mb-2"></i>
                                            <p>No hay participantes registrados</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>