<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    /** @use HasFactory<\Database\Factories\UsuarioFactory> */
    use HasFactory;

    // Nombre de la tabla (opcional si sigue la convención)
    protected $table = 'usuarios';

    // Indicar cuál es la primary key
    protected $primaryKey = 'idUsuario';

    // Si la primary key es autoincremental
    public $incrementing = true;

    // Tipo de la primary key
    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'apellidos',
        'direccion',
        'dni',
        'fechaNacimiento',
        'fechaAlta',
        'email',
        'telefono',
        'usuario',
        'password',
        'activo',
        'seccion',
        'junta',
        'atributo'
    ];

    public function getRouteKeyName()
    {
        return 'idUsuario';
    }

     public function seccion()
    {
        return $this->belongsTo(Instrumento::class, 'Seccion');
    }

    public function junta()
    {
        return $this->belongsTo(Gobierno::class, 'Junta');
    }

    public function atributo()
    {
        return $this->belongsTo(Atributo::class, 'Atributo');
    }
}
