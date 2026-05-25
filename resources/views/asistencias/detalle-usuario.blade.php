<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header con info del usuario -->
            <div class="bg-moradoprin p-8 text-white rounded-t-2xl shadow-xl">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="bg-white/20 text-white w-20 h-20 rounded-full flex items-center justify-center text-3xl font-bold">
                            {{ substr($usuario->name, 0, 1) }}{{ substr($usuario->Apellidos ?? '', 0, 1) }}
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold mb-1">
                                {{ $usuario->name }} {{ $usuario->Apellidos }}
                            </h1>
                            <p class="text-white/90">{{ $usuario->email }}</p>
                            <p class="text-white/80 text-sm mt-1">
                                <i class="fa-solid fa-drum"></i>
                                {{ $usuario->seccion->descripcion ?? 'Sin sección' }}
                            </p>
                        </div>
                    </div>
                    <button onclick="history.back()" 
                       class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg transition-all">
                        <i class="fa-solid fa-arrow-left"></i> Volver
                    </button>
                </div>
            </div>

            <!-- Estadísticas del usuario -->
            <div class="bg-white p-6 border-b-2 border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="bg-green-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600">Ensayos Asistidos</p>
                        <p class="text-3xl font-bold text-green-600">{{ $totalAsistidos }}</p>
                    </div>
                    <div class="bg-red-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600">Ensayos Perdidos</p>
                        <p class="text-3xl font-bold text-red-600">{{ $totalEventos - $totalAsistidos }}</p>
                    </div>
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600">Total Ensayos</p>
                        <p class="text-3xl font-bold text-blue-600">{{ $totalEventos }}</p>
                    </div>
                    <div class="bg-purple-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600">% Asistencia</p>
                        <p class="text-3xl font-bold text-moradoprin">{{ $porcentaje }}%</p>
                    </div>
                </div>

                <!-- Barra de progreso -->
                <div class="mt-6">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-semibold text-gray-700">Progreso de Asistencia</span>
                        <span class="text-sm font-semibold {{ $porcentaje >= 75 ? 'text-green-600' : ($porcentaje >= 50 ? 'text-yellow-600' : 'text-red-600') }}">
                            {{ $porcentaje }}%
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4 overflow-hidden">
                        <div class="h-4 rounded-full transition-all {{ $porcentaje >= 75 ? 'bg-green-600' : ($porcentaje >= 50 ? 'bg-yellow-600' : 'bg-red-600') }}" 
                             style="width: {{ $porcentaje }}%">
                        </div>
                    </div>
                    <div class="flex justify-between mt-1 text-xs text-gray-500">
                        <span>0%</span>
                        <span>Mínimo: 75%</span>
                        <span>100%</span>
                    </div>
                </div>

                <!-- Indicador de cumplimiento -->
                <div class="mt-4 p-4 rounded-lg {{ $porcentaje >= 75 ? 'bg-green-50 border-2 border-green-200' : 'bg-red-50 border-2 border-red-200' }}">
                    @if($porcentaje >= 75)
                        <div class="flex items-center gap-2 text-green-800">
                            <i class="fa-solid fa-check-circle text-2xl"></i>
                            <div>
                                <p class="font-bold">✓ Cumple con el mínimo requerido</p>
                                <p class="text-sm">Este cofrade puede participar en la procesión</p>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center gap-2 text-red-800">
                            <i class="fa-solid fa-exclamation-triangle text-2xl"></i>
                            <div>
                                <p class="font-bold">✗ No cumple con el mínimo requerido</p>
                                <p class="text-sm">Necesita asistir a {{ ceil((0.75 * $totalEventos) - $totalAsistidos) }} ensayos más para alcanzar el 75%</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Historial de ensayos -->
            <div class="bg-white rounded-b-2xl shadow-xl overflow-hidden">
                <div class="p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">
                        <i class="fa-solid fa-history"></i> Historial de Ensayos
                    </h2>

                    @if($eventosAsistidos->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b-2 border-gray-200">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Fecha</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Hora</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Descripción</th>
                                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Estado</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($eventosAsistidos as $evento)
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-6 py-4 text-gray-900 font-semibold">
                                                {{ \Carbon\Carbon::parse($evento->Fecha)->format('d/m/Y') }}
                                            </td>
                                            <td class="px-6 py-4 text-gray-700">
                                                {{ $evento->hora ?? 'Sin hora' }}
                                            </td>
                                            <td class="px-6 py-4 text-gray-700">
                                                {{ $evento->descripcion ?? 'Sin descripción' }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                                    <i class="fa-solid fa-check-circle mr-2"></i>
                                                    Asistió
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-12 text-gray-500">
                            <i class="fa-solid fa-calendar-xmark text-4xl mb-2"></i>
                            <p>Este cofrade no ha asistido a ningún ensayo aún</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Botón Volver Flotante -->
    <a href="javascript:history.back()"
       class="fixed bottom-6 left-6 bg-moradoprin text-white w-12 h-12 lg:w-14 lg:h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-orange-600 transition-all z-40">
        <i class="fa-solid fa-arrow-left text-lg lg:text-xl"></i>
    </a>
</x-app-layout>