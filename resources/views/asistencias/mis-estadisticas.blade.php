<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-4 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header SIN botón volver -->
            <div class="bg-moradoprin p-4 lg:p-8 text-white rounded-t-2xl shadow-xl">
                <h1 class="text-xl lg:text-3xl font-bold mb-1">
                    <i class="fa-solid fa-chart-line"></i>
                    Mis Estadísticas
                </h1>
                <p class="text-white/90 text-xs lg:text-base">Control de asistencia</p>
            </div>

            <!-- Estadísticas del usuario -->
            <div class="bg-white p-3 lg:p-6 border-b-2 border-gray-200">
                @php
                    $minimoRequerido = ceil($totalEnsayos * 0.75);
                    $ensayosFaltantes = max(0, $minimoRequerido - $totalAsistidos);
                    $cumpleMínimo = $porcentaje >= 75;
                @endphp
                
                <!-- Tarjetas de estadísticas  -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 lg:gap-4">
                    <div class="bg-blue-50 p-2 lg:p-4 rounded-lg text-center">
                        <p class="text-xs text-gray-600 mb-1">Total</p>
                        <p class="text-xl lg:text-3xl font-bold text-blue-600">{{ $totalEnsayos }}</p>
                    </div>
                    <div class="bg-green-50 p-2 lg:p-4 rounded-lg text-center">
                        <p class="text-xs text-gray-600 mb-1">Asistido</p>
                        <p class="text-xl lg:text-3xl font-bold text-green-600">{{ $totalAsistidos }}</p>
                    </div>
                    <div class="bg-red-50 p-2 lg:p-4 rounded-lg text-center">
                        <p class="text-xs text-gray-600 mb-1">Faltado</p>
                        <p class="text-xl lg:text-3xl font-bold text-red-600">{{ $totalEnsayos - $totalAsistidos }}</p>
                    </div>
                    <div class="bg-purple-50 p-2 lg:p-4 rounded-lg text-center">
                        <p class="text-xs text-gray-600 mb-1">%</p>
                        <p class="text-xl lg:text-3xl font-bold text-moradoprin">{{ $porcentaje }}%</p>
                    </div>
                </div>

                <!-- Barra de progreso -->
                <div class="mt-3 lg:mt-6">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-xs lg:text-sm font-semibold text-gray-700">Progreso</span>
                        <span class="text-xs lg:text-sm font-semibold {{ $porcentaje >= 75 ? 'text-green-600' : ($porcentaje >= 50 ? 'text-yellow-600' : 'text-red-600') }}">
                            {{ $porcentaje }}%
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 lg:h-4 overflow-hidden">
                        <div class="h-2 lg:h-4 rounded-full transition-all {{ $porcentaje >= 75 ? 'bg-green-600' : ($porcentaje >= 50 ? 'bg-yellow-600' : 'bg-red-600') }}" 
                             style="width: {{ $porcentaje }}%">
                        </div>
                    </div>
                    <div class="flex justify-between mt-1 text-xs text-gray-500">
                        <span>0%</span>
                        <span class="font-semibold">75%</span>
                        <span>100%</span>
                    </div>
                </div>

                <!-- Indicador de cumplimiento -->
                <div class="mt-3 lg:mt-4 p-2 lg:p-4 rounded-lg {{ $cumpleMínimo ? 'bg-green-50 border-2 border-green-200' : 'bg-red-50 border-2 border-red-200' }}">
                    @if($cumpleMínimo)
                        <div class="flex items-start gap-2 text-green-800">
                            <i class="fa-solid fa-check-circle text-lg lg:text-2xl mt-0.5"></i>
                            <div>
                                <p class="font-bold text-xs lg:text-base">✓ Cumples el mínimo</p>
                                <p class="text-xs lg:text-sm">Puedes ir a la procesión</p>
                            </div>
                        </div>
                    @else
                        <div class="flex items-start gap-2 text-red-800">
                            <i class="fa-solid fa-exclamation-triangle text-lg lg:text-2xl mt-0.5"></i>
                            <div>
                                <p class="font-bold text-xs lg:text-base">✗ No cumples el mínimo</p>
                                <p class="text-xs lg:text-sm">Necesitas {{ $ensayosFaltantes }} ensayos más</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Historial de ensayos -->
            <div class="bg-white rounded-b-2xl shadow-xl overflow-hidden">
                <div class="p-3 lg:p-6">
                    <h2 class="text-lg lg:text-xl font-bold text-gray-900 mb-3 lg:mb-4">
                        <i class="fa-solid fa-history"></i> Historial
                    </h2>

                    @if($eventosAsistidos->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm lg:text-base">
                                <thead class="bg-gray-50 border-b-2 border-gray-200">
                                    <tr>
                                        <th class="px-2 lg:px-6 py-2 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700">Fecha</th>
                                        <th class="px-2 lg:px-6 py-2 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700 hidden lg:table-cell">Hora</th>
                                        <th class="px-2 lg:px-6 py-2 lg:py-4 text-left text-xs lg:text-sm font-semibold text-gray-700 hidden lg:table-cell">Descripción</th>
                                        <th class="px-2 lg:px-6 py-2 lg:py-4 text-center text-xs lg:text-sm font-semibold text-gray-700">Estado</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($eventosAsistidos as $evento)
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-2 lg:px-6 py-2 lg:py-4 text-gray-900 font-semibold text-xs lg:text-base">
                                                {{ \Carbon\Carbon::parse($evento->Fecha)->format('d/m/Y') }}
                                            </td>
                                            <td class="px-2 lg:px-6 py-2 lg:py-4 text-gray-700 text-xs lg:text-base hidden lg:table-cell">
                                                {{ $evento->hora ?? 'Sin hora' }}
                                            </td>
                                            <td class="px-2 lg:px-6 py-2 lg:py-4 text-gray-700 text-xs lg:text-base hidden lg:table-cell">
                                                {{ $evento->descripcion ?? 'Sin descripción' }}
                                            </td>
                                            <td class="px-2 lg:px-6 py-2 lg:py-4 text-center">
                                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                                    <i class="fa-solid fa-check-circle lg:mr-2"></i>
                                                    <span class="hidden lg:inline">Asistí</span>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8 lg:py-12 text-gray-500">
                            <i class="fa-solid fa-calendar-xmark text-3xl lg:text-4xl mb-2"></i>
                            <p class="text-sm lg:text-base">No has asistido a ningún ensayo aún</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

   
    <a href="{{ route('dashboard') }}" 
       class="fixed bottom-6 left-6 bg-moradoprin text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-orange-600 transition-all z-40">
        <i class="fa-solid fa-arrow-left text-xl"></i>
    </a>
</x-app-layout>