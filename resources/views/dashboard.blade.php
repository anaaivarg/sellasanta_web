<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-4 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="bg-moradoprin p-4 lg:p-8 text-white rounded-2xl shadow-xl mb-4 lg:mb-8">
                <h1 class="text-xl lg:text-3xl font-bold mb-1 lg:mb-2">
                    Bienvenido, {{ auth()->user()->name }}
                </h1>
                <p class="text-white/90 text-sm lg:text-base">
                    @if(auth()->user()->esAdmin())
                        Panel de Administración
                    @else
                        Panel de Usuario
                    @endif
                </p>
            </div>

            <!-- ✅ PRÓXIMO EVENTO (solo móvil para usuarios normales) -->
            @if(!auth()->user()->esAdmin())
                @php
                    try {
                        $proximoEvento = \App\Models\Evento::where('Fecha', '>=', now()->format('Y-m-d'))
                            ->orderBy('Fecha', 'asc')
                            ->orderBy('hora', 'asc')
                            ->first();
                    } catch (\Exception $e) {
                        $proximoEvento = null;
                    }
                @endphp

                @if($proximoEvento)
                    <div class="lg:hidden bg-white p-4 rounded-2xl shadow-lg mb-4 border-l-4 border-orange-600">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base font-bold text-gray-900">
                                <i class="fa-solid fa-calendar-check text-orange-600"></i>
                                Próximo Evento
                            </h3>
                            <span class="bg-orange-50 text-orange-600 px-3 py-1 rounded-full text-xs font-bold">
                                {{ $proximoEvento->Nombre }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <div class="flex-1 grid grid-cols-2 gap-3">
                                <div>
                                    <p class="text-xs text-gray-500 mb-1">Fecha</p>
                                    <p class="text-sm font-semibold text-gray-900">
                                        @php
                                            $fecha = \Carbon\Carbon::parse($proximoEvento->Fecha);
                                            if ($fecha->isToday())
                                                echo 'Hoy';
                                            elseif ($fecha->isTomorrow())
                                                echo 'Mañana';
                                            else
                                                echo $fecha->locale('es')->isoFormat('D MMM');
                                        @endphp
                                    </p>
                                </div>
                                @if($proximoEvento->hora)
                                    <div>
                                        <p class="text-xs text-gray-500 mb-1">Hora</p>
                                        <p class="text-sm font-semibold text-gray-900">
                                            {{ substr($proximoEvento->hora, 0, 5) }}
                                        </p>
                                    </div>
                                @endif
                            </div>

                            @if($proximoEvento->Nombre === 'Ensayo' && auth()->user()->Seccion && auth()->user()->Participante === 'SI')
                                <a href="{{ route('eventos.qr', $proximoEvento->idEvento) }}"
                                    class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-3 rounded-xl font-semibold transition-all flex items-center gap-2 shadow-md">
                                    <i class="fa-solid fa-qrcode text-lg"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="lg:hidden bg-gray-50 p-4 rounded-xl text-center mb-4">
                        <i class="fa-solid fa-calendar-xmark text-2xl text-gray-400 mb-2"></i>
                        <p class="text-sm text-gray-600">No hay eventos próximos</p>
                    </div>
                @endif
            @endif

            <!-- Tarjetas de acciones -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
                @if(auth()->user()->esAdmin())
                    <!-- Tarjetas de Admin -->
                    <a href="{{ route('eventos.index') }}"
                        class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105 overflow-hidden">
                        <div class="p-4 lg:p-6">
                            <div class="flex items-center justify-between mb-3 lg:mb-4">
                                <h2 class="text-base lg:text-xl font-bold text-moradoprin">
                                    <i class="fa-solid fa-calendar-plus"></i>
                                    Gestionar Eventos
                                </h2>
                            </div>
                            <p class="text-gray-600 text-sm lg:text-base">Crear, editar y eliminar eventos del calendario
                            </p>
                        </div>
                    </a>

                    <a href="{{ route('usuarios.index') }}"
                        class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105 overflow-hidden">
                        <div class="p-4 lg:p-6">
                            <div class="flex items-center justify-between mb-3 lg:mb-4">
                                <h2 class="text-base lg:text-xl font-bold text-moradoprin">
                                    <i class="fa-solid fa-users"></i>
                                    Gestionar Cofrades
                                </h2>
                            </div>
                            <p class="text-gray-600 text-sm lg:text-base">Administrar miembros de la cofradía</p>
                        </div>
                    </a>

                    <a href="{{ route('asistencias.index') }}"
                        class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105 overflow-hidden">
                        <div class="p-4 lg:p-6">
                            <div class="flex items-center justify-between mb-3 lg:mb-4">
                                <h2 class="text-base lg:text-xl font-bold text-moradoprin">
                                    <i class="fa-solid fa-chart-line"></i>
                                    Control de Asistencias
                                </h2>
                            </div>
                            <p class="text-gray-600 text-sm lg:text-base">Ver estadísticas y gestionar asistencias</p>
                        </div>
                    </a>
                @endif

                <!-- Tarjetas para TODOS los usuarios -->

                <!-- ✅ Mis Estadísticas (solo usuarios con sección) -->
                @if(auth()->user()->Seccion && auth()->user()->Seccion != 1)
                    <a href="{{ route('mis.estadisticas') }}"
                        class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105 overflow-hidden">
                        <div class="p-4 lg:p-6">
                            <div class="flex items-center justify-between mb-3 lg:mb-4">
                                <h2 class="text-base lg:text-xl font-bold text-moradoprin">
                                    <i class="fa-solid fa-chart-bar"></i>
                                    Mis Estadísticas
                                </h2>
                            </div>
                            <p class="text-gray-600 text-sm lg:text-base">Consulta tu asistencia y progreso</p>
                        </div>
                    </a>
                @endif

                @if(auth()->user()->Seccion && auth()->user()->Seccion != 1)
                <a href="{{ route('eventos.usuario') }}"
                    class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105 overflow-hidden">
                    <div class="p-4 lg:p-6">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <h2 class="text-base lg:text-xl font-bold text-moradoprin">
                                <i class="fa-solid fa-calendar"></i>
                                Ver Calendario
                            </h2>
                        </div>
                        <p class="text-gray-600 text-sm lg:text-base">Consulta eventos y genera tu QR</p>
                    </div>
                </a>
                @endif

                <a href="{{ route('profile.edit') }}"
                    class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105 overflow-hidden">
                    <div class="p-4 lg:p-6">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <h2 class="text-base lg:text-xl font-bold text-moradoprin">
                                <i class="fa-solid fa-user"></i>
                                Mi Perfil
                            </h2>
                        </div>
                        <p class="text-gray-600 text-sm lg:text-base">Actualiza tu información personal</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- ✅ Botón Volver Flotante (solo para usuarios normales) -->
    @if(!auth()->user()->esAdmin())
        <a href="{{ url('/') }}"
            class="fixed bottom-6 left-6 bg-moradoprin text-white w-12 h-12 lg:w-14 lg:h-14 rounded-full shadow-2xl flex items-center justify-center hover:bg-orange-600 transition-all z-40">
            <i class="fa-solid fa-home text-lg lg:text-xl"></i>
        </a>
    @endif
</x-app-layout>