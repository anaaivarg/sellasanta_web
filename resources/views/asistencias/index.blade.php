<x-app-layout>
  <div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto">
      <!-- Header -->
      <div class="bg-moradoprin p-8 text-white rounded-t-2xl shadow-xl">
        <h1 class="text-3xl font-bold mb-2">
          <i class="fa-solid fa-chart-line"></i>
          Control de Asistencias
        </h1>
        <p class="text-white/90">Gestiona y consulta la asistencia a eventos de la cofradía</p>
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

      <!-- Tabla de eventos -->
      <div class="bg-white rounded-b-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
              <tr>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Evento</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Fecha</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Hora</th>
                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Asistieron</th>
                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">% Asistencia</th>
                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Acciones</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              @forelse($eventos as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                  <td class="px-6 py-4">
                    <div class="flex items-center gap-2">
                      <span class="w-3 h-3 rounded-full"
                        style="background-color: {{ ['Ensayo' => '#ea580c', 'Misa' => '#7c3aed', 'Procesión' => '#dc2626', 'Reunión' => '#2563eb', 'Acto' => '#16a34a'][$item['evento']->Nombre] ?? '#64748b' }}">
                      </span>
                      <span class="font-semibold text-gray-900">{{ $item['evento']->Nombre }}</span>
                    </div>
                  </td>
                  <td class="px-6 py-4 text-gray-700">
                    {{ \Carbon\Carbon::parse($item['evento']->Fecha)->format('d/m/Y') }}
                  </td>
                  <td class="px-6 py-4 text-gray-700">
                    {{ $item['evento']->hora ?? 'N/A' }}
                  </td>
                  <td class="px-6 py-4 text-center">
                    <span class="font-bold text-gray-900">{{ $item['asistentes'] }}</span>
                    <span class="text-gray-500">/ {{ $item['total'] }}</span>
                  </td>
                  <td class="px-6 py-4 text-center">
                    <span
                      class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                                                {{ $item['porcentaje'] >= 75 ? 'bg-green-100 text-green-800' : ($item['porcentaje'] >= 50 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                      {{ $item['porcentaje'] }}%
                    </span>
                  </td>
                  <td class="px-6 py-4 text-center">
                    <a href="{{ route('asistencias.evento', $item['evento']->idEvento) }}"
                      class="inline-flex items-center px-4 py-2 bg-moradoprin text-white rounded-lg hover:bg-purple-800 transition-all">
                      <i class="fa-solid fa-eye mr-2"></i>
                      Ver Detalles
                    </a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                    <i class="fa-solid fa-inbox text-4xl mb-2"></i>
                    <p>No hay eventos registrados</p>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <!-- Botón volver -->
      <div class="mt-6">
        <a href="{{ route('dashboard') }}"
          class="inline-block bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-gray-700 transition-all">
          ← Volver al Dashboard
        </a>
      </div>
    </div>
  </div>
</x-app-layout>