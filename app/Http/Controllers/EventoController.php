<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;  
use Illuminate\Support\Facades\Crypt;         
use Illuminate\Support\Facades\DB; 

class EventoController extends Controller
{

 /**
 * Generar QR para que el usuario registre su asistencia
 */
public function generarQR($id)
{
    $evento = Evento::findOrFail($id);
    $usuario = auth()->user();
    
    // ✅ VERIFICAR: Solo permitir QR si es un ensayo
    if ($evento->Nombre !== 'Ensayo') {
        abort(403, 'Solo puedes generar QR para ensayos');
    }
    
    // ✅ VERIFICAR: Solo permitir QR si el usuario tiene sección asignada
    if (!$usuario->Seccion || $usuario->Participante !== 'SI') {
        abort(403, 'Solo los participantes con instrumento asignado pueden generar QR');
    }
    
    // Crear un token seguro con información encriptada
    $data = [
        'usuario_id' => $usuario->idUsuario,
        'evento_id' => $evento->idEvento,
        'timestamp' => now()->timestamp,
    ];
    
    // Encriptar los datos
    $token = Crypt::encryptString(json_encode($data));
    
    // URL a la que apuntará el QR
    $url = route('eventos.registrar', ['token' => $token]);
    
    // Generar el QR como SVG
    $qr = QrCode::size(250)
        ->style('round')
        ->eye('circle')
        ->gradient(124, 58, 237, 234, 88, 12, 'diagonal') // Morado a naranja
        ->generate($url);
    
    // Retornar HTML con el QR
    return view('eventos.qr', [
        'qr' => $qr,
        'evento' => $evento,
        'usuario' => $usuario
    ]);
}

/**
 * Registrar asistencia al escanear el QR
 */
public function registrarAsistencia(Request $request)
{
    try {
        // Desencriptar el token
        $token = $request->get('token');
        $data = json_decode(Crypt::decryptString($token), true);
        
        $usuarioId = $data['usuario_id'];
        $eventoId = $data['evento_id'];
        $timestamp = $data['timestamp'];
        
        // Verificar que el token no sea muy antiguo (válido por 24 horas)
        if (now()->timestamp - $timestamp > 86400) {
            return view('eventos.asistencia-resultado', [
                'success' => false,
                'message' => 'El código QR ha expirado. Genera uno nuevo.'
            ]);
        }
        
        // Buscar usuario y evento
        $usuario = \App\Models\Usuario::findOrFail($usuarioId);
        $evento = Evento::findOrFail($eventoId);
        
        // Verificar si ya está registrado
        $yaRegistrado = \DB::table('usuarioseventos')
            ->where('idUsuario', $usuarioId)
            ->where('idEvento', $eventoId)
            ->exists();
        
        if ($yaRegistrado) {
            return view('eventos.asistencia-resultado', [
                'success' => false,
                'message' => 'Esta asistencia ya fue registrada anteriormente.',
                'usuario' => $usuario,
                'evento' => $evento
            ]);
        }
        
        // Registrar asistencia
        \DB::table('usuarioseventos')->insert([
            'idUsuario' => $usuarioId,
            'idEvento' => $eventoId,
            
        ]);
        
        return view('eventos.asistencia-resultado', [
            'success' => true,
            'message' => '¡Asistencia registrada exitosamente!',
            'usuario' => $usuario,
            'evento' => $evento
        ]);
        
    } catch (\Exception $e) {
        return view('eventos.asistencia-resultado', [
            'success' => false,
            'message' => 'Error al registrar asistencia: ' . $e->getMessage()
        ]);
    }
}
    /**
     * Mostrar la vista del calendario
     */
    public function index()
    {
        return view('eventos.index');
    }
    /**
 * Vista del calendario para usuarios normales (solo lectura)
 */
public function calendarioUsuario()
{
    return view('eventos.usuario');
}

    /**
     * Obtener eventos en formato JSON para FullCalendar
     */
    public function getEventos()
    {
        try {
            $eventos = Evento::all()->map(function ($evento) {
                return [
                    'id' => $evento->idEvento,
                    'title' => $evento->Nombre ?? 'Sin título',
                    'start' => $evento->Fecha,
                    'backgroundColor' => $this->getColorPorTipo($evento->Nombre),
                    'borderColor' => $this->getColorPorTipo($evento->Nombre),
                    'extendedProps' => [
                        'tipo' => $evento->Nombre,
                        'hora' => $evento->hora,         
                        'descripcion' => $evento->descripcion, 
                        'general' => $evento->General
                    ]
                ];
            });

            return response()->json($eventos);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Guardar nuevo evento
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'fecha' => 'required|date',
                'tipo' => 'required|string|max:255',
                'hora' => 'required',  
                'descripcion' => 'nullable|string|max:100',  
                'general' => 'required|in:SI,NO'
            ]);

            $evento = Evento::create([
                'Fecha' => $validated['fecha'],
                'Nombre' => $validated['tipo'],
                'hora' => $validated['hora'],          
                'descripcion' => $validated['descripcion'] ?? '', 
                'General' => $validated['general']
            ]);

            return response()->json([
                'success' => true,
                'evento' => $evento,
                'message' => 'Evento creado exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Actualizar evento
     */
    public function update(Request $request, $id)
    {
        try {
            $evento = Evento::findOrFail($id);

            $validated = $request->validate([
                'fecha' => 'required|date',
                'tipo' => 'required|string|max:255',
                'hora' => 'required',        
                'descripcion' => 'nullable|string|max:100',  
                'general' => 'required|in:SI,NO'
            ]);

            $evento->update([
                'Fecha' => $validated['fecha'],
                'Nombre' => $validated['tipo'],
                'hora' => $validated['hora'],          
                'descripcion' => $validated['descripcion'] ?? '', 
                'General' => $validated['general']
            ]);

            return response()->json([
                'success' => true,
                'evento' => $evento,
                'message' => 'Evento actualizado exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar evento
     */
    public function destroy($id)
    {
        try {
            $evento = Evento::findOrFail($id);
            $evento->delete();

            return response()->json([
                'success' => true,
                'message' => 'Evento eliminado exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener colores según tipo de evento
     */
    private function getColorPorTipo($tipo)
    {
        $colores = [
            'Ensayo' => '#ea580c',      // Naranja
            'Misa' => '#7c3aed',        // Morado
            'Procesión' => '#dc2626',   // Rojo
            'Reunión' => '#2563eb',     // Azul
            'Acto' => '#16a34a',        // Verde
            'General' => '#64748b'      // Gris
        ];

        return $colores[$tipo] ?? '#64748b';
    }
}