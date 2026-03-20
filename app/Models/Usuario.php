<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'Apellidos',
        'Direccion',
        'Dni',
        'FechaNacimiento',
        'FechaAlta',
        'email',
        'Telefono',
        'Usuario',
        'password',
        'Activo',
        'Seccion',
        'Junta',
        'Atributo'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ✅ Castear Junta como integer
    protected $casts = [
        'Junta' => 'integer',
        'Seccion' => 'integer',
        'Atributo' => 'integer',

        'Telefono' => 'string',
    ];



    public function getRouteKeyName()
    {
        return 'idUsuario';
    }

    public function seccion()
    {
        return $this->belongsTo(Instrumento::class, 'Seccion', 'idInstrumento');
    }

    public function junta()
    {
        return $this->belongsTo(Gobierno::class, 'Junta', 'idJunta');
    }

    public function atributo()
    {
        return $this->belongsTo(Atributo::class, 'Atributo', 'idAtributo');
    }

    public function esAdmin()
    {
        $cargosAdmin = [2, 4, 13];
        return $this->Junta !== null && in_array($this->Junta, $cargosAdmin, true);
    }

    // Accessors y Mutators para Activo
public function getActivoAttribute($value)
{
    // Si ya es SI/NO, devolverlo tal cual
    if ($value === 'SI' || $value === 'NO') {
        return $value;
    }
    // Si es numérico, convertir
    return ($value == 1 || $value === true) ? 'SI' : 'NO';
}



// Accessors y Mutators para Participante
public function getParticipanteAttribute($value)
{
    // Si ya es SI/NO, devolverlo tal cual
    if ($value === 'SI' || $value === 'NO') {
        return $value;
    }
    // Si es numérico, convertir
    return ($value == 1 || $value === true) ? 'SI' : 'NO';
}


}