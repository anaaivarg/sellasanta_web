<?php

namespace App\Http\Controllers;


use App\Models\Instrumento;
use App\Models\Usuario;
use App\Models\Gobierno;
use App\Models\Atributo;
use App\Models\Evento;
use App\Http\Requests\StoreUsuarioRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\UpdateUsuarioRequest;
use Illuminate\Support\Facades\Schema;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::with(['seccion', 'junta', 'atributo'])->get();
        $campos = ['Nombre', 'Apellido', 'Telefono', 'Fecha Alta', 'Activo', 'Participante', 'Seccion', 'Junta', 'Atributo'];
        $instrumentos = Instrumento::all();
        return view("usuarios.listado", compact('usuarios', 'campos', 'instrumentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener los datos necesarios para los select del formulario
        $instrumentos = \App\Models\Instrumento::all();
        $gobiernos = \App\Models\Gobierno::all();
        $atributos = \App\Models\Atributo::all();



        // Retornar la vista con los datos
        return view('usuarios.create', compact('instrumentos', 'gobiernos', 'atributos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {

        // Validar los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'dni' => 'required|string|max:20|unique:usuarios,dni',
            'fechaNacimiento' => 'nullable|date',
            'email' => 'required|email|unique:usuarios,email',
            'telefono' => 'nullable|string|max:20',
            'usuario' => 'required|string|max:50|unique:usuarios,usuario',
            'password' => 'required|string|min:6',
            'seccion' => 'nullable|integer',
            'junta' => 'nullable|integer',
            'atributo' => 'nullable|integer',
        ]);

        // Encriptar la contraseña
        $validated['password'] = bcrypt($validated['password']);

        // Establecer valores por defecto
        $validated['activo'] = 1;
        $validated['fechaAlta'] = now();

        // Crear el usuario
        $usuario = \App\Models\Usuario::create($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('usuarios.index')
            ->with('success', 'Cofrade añadido exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        $instrumentos = Instrumento::all();
        $juntas = Gobierno::all();
        $atributos = Atributo::all();
        return view('usuarios.edit', compact('usuario', 'instrumentos', 'juntas', 'atributos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        // Validar letra del DNI PRIMERO
        $dni = strtoupper($request->dni);
        $numero = substr($dni, 0, 8);
        $letra = substr($dni, -1);
        $letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
        $letraCorrecta = $letras[$numero % 23];

        if ($letra !== $letraCorrecta) {
            return back()->withErrors(['dni' => 'La letra del DNI no es correcta'])->withInput();
        }

        // AHORA SÍ validar el resto
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'fecha_alta' => 'required|date',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'usuario' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
            'activo' => 'required|in:SI,NO',
            'participante' => 'required|in:SI,NO',
            'Seccion' => 'nullable',
            'junta' => 'nullable',
            'atributo' => 'nullable',
        ]);

        // Asignar valores
        $usuario->name = $request->nombre;
        $usuario->Apellidos = $request->apellido;
        $usuario->Dni = $request->dni;
        $usuario->Direccion = $request->direccion;
        $usuario->FechaNacimiento = $request->fecha_nacimiento;
        $usuario->FechaAlta = $request->fecha_alta;
        $usuario->email = $request->email;
        $usuario->Telefono = $request->telefono;
        $usuario->Usuario = $request->usuario;
        $usuario->Activo = $request->activo;
        $usuario->Participante = $request->participante;

        // Convertir strings vacíos a 1 (ID de "Ninguno")
        $usuario->Seccion = $request->Seccion ?: 1;
        $usuario->Junta = $request->junta ?: 1;
        $usuario->Atributo = $request->atributo ?: 1;

        // Solo actualizar contraseña si se proporcionó una nueva
        if ($request->filled('password')) {
            $usuario->password = bcrypt($request->password);

        }



        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Cofrade actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        try {
            $nombre = $usuario->name . ' ' . $usuario->Apellidos;

            // En lugar de eliminar, marcar como inactivo
            $usuario->Activo = 'NO';
            $usuario->save();

            return redirect()->route('usuarios.index')
                ->with('success', "Cofrade {$nombre} marcado como inactivo");

        } catch (\Exception $e) {
            return redirect()->route('usuarios.index')
                ->with('error', 'Error al desactivar el cofrade');
        }
    }

    public function activar(Usuario $usuario)
{
    try {
        $nombre = $usuario->name . ' ' . $usuario->Apellidos;
        
        $usuario->Activo = 'SI';
        $usuario->save();
        
        return redirect()->route('usuarios.index')
            ->with('success', "Cofrade {$nombre} activado correctamente");
            
    } catch (\Exception $e) {
        return redirect()->route('usuarios.index')
            ->with('error', 'Error al activar el cofrade');
    }
}



}
