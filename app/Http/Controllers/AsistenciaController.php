<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsistenciaController extends Controller
{
/**
 * Lista de todos los ENSAYOS con estadísticas de asistencia
 */
public function index()
{
    // ✅ Solo filtrar ensayos
    $eventos = Evento::where('Nombre', 'Ensayo')
        ->orderBy('Fecha', 'desc')
        ->get()
        ->map(function ($evento) {
            // Contar asistentes
            $asistentes = DB::table('usuarioseventos')
                ->where('idEvento', $evento->idEvento)
                ->count();
            
            // ✅ Total de usuarios activos, participantes Y con sección asignada (no null)
            $totalUsuarios = Usuario::where('Activo', 'SI')
                ->where('Participante', 'SI')
                ->whereNotNull('Seccion')
                ->count();
            
            // Calcular porcentaje
            $porcentaje = $totalUsuarios > 0 ? round(($asistentes / $totalUsuarios) * 100, 1) : 0;
            
            return [
                'evento' => $evento,
                'asistentes' => $asistentes,
                'total' => $totalUsuarios,
                'porcentaje' => $porcentaje
            ];
        });
    
    return view('asistencias.index', compact('eventos'));
}
    
  /**
 * Detalle de asistencias de un evento específico
 */
public function detalleEvento($id)
{
    $evento = Evento::findOrFail($id);
    
    // Total de ensayos (para calcular % de cada usuario)
    $totalEnsayos = Evento::where('Nombre', 'Ensayo')->count();
    
    // ✅ Obtener solo usuarios activos, participantes Y con sección asignada
    $usuarios = Usuario::where('Activo', 'SI')
        ->where('Participante', 'SI')
        ->whereNotNull('Seccion')
        ->get()
        ->map(function ($usuario) use ($id, $totalEnsayos) {
            // ¿Asistió a ESTE evento?
            $asistioEsteEvento = DB::table('usuarioseventos')
                ->where('idUsuario', $usuario->idUsuario)
                ->where('idEvento', $id)
                ->exists();
            
            // Total de ensayos a los que ha asistido (de todos)
            $totalAsistidos = DB::table('usuarioseventos')
                ->join('eventos', 'usuarioseventos.idEvento', '=', 'eventos.idEvento')
                ->where('usuarioseventos.idUsuario', $usuario->idUsuario)
                ->where('eventos.Nombre', 'Ensayo')
                ->count();
            
            // Calcular porcentaje
            $porcentaje = $totalEnsayos > 0 ? round(($totalAsistidos / $totalEnsayos) * 100, 1) : 0;
            
            return [
                'usuario' => $usuario,
                'asistio' => $asistioEsteEvento,
                'totalAsistidos' => $totalAsistidos,
                'totalEnsayos' => $totalEnsayos,
                'porcentaje' => $porcentaje
            ];
        })
        // Ordenar: primero los que asistieron, luego por nombre
        ->sortByDesc('asistio')
        ->sortBy(function ($item) {
            return $item['usuario']->name;
        });
    
    return view('asistencias.detalle-evento', compact('evento', 'usuarios', 'totalEnsayos'));
}
    
    /**
     * Historial de asistencias de un usuario específico
     */
    public function detalleUsuario($id)
    {
        $usuario = Usuario::findOrFail($id);
        
        // Eventos a los que asistió
        $eventosAsistidos = Evento::whereIn('idEvento', function ($query) use ($id) {
            $query->select('idEvento')
                  ->from('usuarioseventos')
                  ->where('idUsuario', $id);
        })->orderBy('Fecha', 'desc')->get();
        
        // Total de eventos
        $totalEventos = Evento::count();
        $totalAsistidos = $eventosAsistidos->count();
        $porcentaje = $totalEventos > 0 ? round(($totalAsistidos / $totalEventos) * 100, 1) : 0;
        
        return view('asistencias.detalle-usuario', compact('usuario', 'eventosAsistidos', 'totalEventos', 'totalAsistidos', 'porcentaje'));
    }

    /**
 * Mostrar estadísticas del usuario autenticado
 */
public function misEstadisticas()
{
    $usuario = auth()->user();
    
    // Verificar que el usuario tenga sección asignada
    if (!$usuario->Seccion || $usuario->Participante !== 'SI') {
        return redirect()->route('dashboard')->with('error', 'No tienes una sección asignada');
    }
    
    // Total de ensayos
    $totalEnsayos = Evento::where('Nombre', 'Ensayo')->count();
    
    // Ensayos a los que asistió el usuario
    $eventosAsistidos = Evento::where('Nombre', 'Ensayo')
        ->whereIn('idEvento', function ($query) use ($usuario) {
            $query->select('idEvento')
                  ->from('usuarioseventos')
                  ->where('idUsuario', $usuario->idUsuario);
        })
        ->orderBy('Fecha', 'desc')
        ->get();
    
    $totalAsistidos = $eventosAsistidos->count();
    $porcentaje = $totalEnsayos > 0 ? round(($totalAsistidos / $totalEnsayos) * 100, 1) : 0;
    
    return view('asistencias.mis-estadisticas', compact('usuario', 'eventosAsistidos', 'totalEnsayos', 'totalAsistidos', 'porcentaje'));
}
}