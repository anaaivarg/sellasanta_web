<x-app-layout>
  <div class="min-h-screen bg-gray-100 p-4 lg:p-8">
    <div class="max-w-7xl mx-auto">
      <!-- Header -->
      <div class="bg-moradoprin p-4 lg:p-8 text-white rounded-t-2xl shadow-xl">
        <h1 class="text-xl lg:text-3xl font-bold mb-1 lg:mb-2">
          <i class="fa-solid fa-chart-line"></i>
          Control de Asistencias
        </h1>
        <p class="text-white/90 text-sm lg:text-base">Gestiona y consulta la asistencia a eventos de la cofradía</p>
      </div>

      <!-- Estadísticas generales -->
      <div class="bg-white p-6 border-b-2 border-gray-200">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div class="bg-blue-50 p-4 rounded-lg">
            <p class="text-sm text-gray-600">Total Ensayos</p>
            <p class="text-3xl font-bold text-blue-600">{{ $eventos->count() }}</p>
          </div>
          <div class="bg-green-50 p-4 rounded-lg">
            <p class="text-sm text-gray-600">Promedio Asistencia</p>
            <p class="text-3xl font-bold text-green-600">
              {{ $eventos->avg('porcentaje') ? round($eventos->avg('porcentaje'), 1) : 0 }}%
            </p>
          </div>
          <div class="bg-orange-50 p-4 rounded-lg">
            <p class="text-sm text-gray-600">Último Ensayo</p>
            @if($eventos->first())
              <p class="text-lg font-bold text-orange-600">
                {{ \Carbon\Carbon::parse($eventos->first()['evento']->Fecha)->format('d/m/Y') }}
              </p>
              <p class="text-sm text-orange-500">
                {{ $eventos->first()['evento']->hora ?? 'Hora no especificada' }}
              </p>
            @else
              <p class="text-lg font-bold text-orange-600">N/A</p>
            @endif
          </div>
        </div>
      </div>

      <!-- VISTA MÓVIL: Tarjetas -->
      <div class="lg:hidden bg-white rounded-b-2xl shadow-xl divide-y divide-gray-200">
        @forelse($eventos as $item)
          <div class="p-4 flex items-center justify-between gap-3">
            <div class="flex items-center gap-3 min-w-0">
              <span class="w-3 h-3 rounded-full flex-shrink-0"
                style="background-color: {{ ['Ensayo' => '#ea580c', 'Misa' => '#7c3aed', 'Procesión' => '#dc2626', 'Reunión' => '#2563eb', 'Acto' => '#16a34a'][$item['evento']->Nombre] ?? '#64748b' }}">
              </span>
              <div class="min-w-0">
                <p class="font-bold text-gray-900 text-sm">{{ $item['evento']->Nombre }}</p>
                <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($item['evento']->Fecha)->format('d/m/Y') }} · {{ $item['evento']->hora ?? 'Sin hora' }}</p>
              </div>
            </div>
            <div class="flex items-center gap-2 flex-shrink-0">
              <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-bold
                {{ $item['porcentaje'] >= 75 ? 'bg-green-100 text-green-800' : ($item['porcentaje'] >= 50 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                {{ $item['porcentaje'] }}%
              </span>
              <a href="{{ route('asistencias.evento', $item['evento']->idEvento) }}"
                class="inline-flex items-center gap-1 px-3 py-2 bg-moradoprin text-white text-xs font-semibold rounded-lg hover:bg-orange-600 transition-all">
                <i class="fa-solid fa-eye"></i>
                Ver
              </a>
            </div>
          </div>
        @empty
          <div class="p-12 text-center text-gray-500">
            <i class="fa-solid fa-inbox text-4xl mb-2"></i>
            <p>No hay eventos registrados</p>
          </div>
        @endforelse
      </div>

      <!-- VISTA ESCRITORIO: Tabla -->
      <div class="hidden lg:block bg-white rounded-b-2xl shadow-xl overflow-hidden">
        <table class="w-full">
          <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
              <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Evento</th>
              <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Fecha / Hora</th>
              <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">Asistieron</th>
              <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">% Asistencia</th>
              <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">Acciones</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            @forelse($eventos as $item)
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3">
                  <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full flex-shrink-0"
                      style="background-color: {{ ['Ensayo' => '#ea580c', 'Misa' => '#7c3aed', 'Procesión' => '#dc2626', 'Reunión' => '#2563eb', 'Acto' => '#16a34a'][$item['evento']->Nombre] ?? '#64748b' }}">
                    </span>
                    <span class="font-semibold text-gray-900">{{ $item['evento']->Nombre }}</span>
                  </div>
                </td>
                <td class="px-4 py-3">
                  <p class="text-sm text-gray-900 font-medium">{{ \Carbon\Carbon::parse($item['evento']->Fecha)->format('d/m/Y') }}</p>
                  <p class="text-xs text-gray-500">{{ $item['evento']->hora ?? 'Sin hora' }}</p>
                </td>
                <td class="px-4 py-3 text-center">
                  <span class="font-bold text-gray-900">{{ $item['asistentes'] }}</span>
                  <span class="text-gray-500">/ {{ $item['total'] }}</span>
                </td>
                <td class="px-4 py-3 text-center">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                    {{ $item['porcentaje'] >= 75 ? 'bg-green-100 text-green-800' : ($item['porcentaje'] >= 50 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                    {{ $item['porcentaje'] }}%
                  </span>
                </td>
                <td class="px-4 py-3 text-center">
                  <a href="{{ route('asistencias.evento', $item['evento']->idEvento) }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-moradoprin text-white rounded-lg hover:bg-orange-600 transition-all text-sm">
                    <i class="fa-solid fa-eye"></i>
                    Ver Detalles
                  </a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                  <i class="fa-solid fa-inbox text-4xl mb-2"></i>
                  <p>No hay eventos registrados</p>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

    </div>
  </div>

    <!-- Botón Volver Flotante -->
    <a href="{{ route('dashboard') }}"
       class="fixed bottom-6 left-6 bg-moradoprin text-white w-12 h-12 lg:w-14 lg:h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-orange-600 transition-all z-40">
        <i class="fa-solid fa-arrow-left text-lg lg:text-xl"></i>
    </a>
</x-app-layout>