<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $primaryKey = 'idEvento';
    public $timestamps = false;

    protected $fillable = [
        'Fecha',
        'Nombre',      // ← CAMBIO: era 'Tipo'
        'General',
        'hora',
        'descripcion'
    ];

    /**
     * Relación con usuarios que asistieron al evento
     */
    public function asistencias()
    {
        return $this->hasMany(UsuarioEvento::class, 'idEvento', 'idEvento');
    }

    /**
     * Usuarios que asistieron
     */
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuarioseventos', 'idEvento', 'idUsuario')
            ->withPivot('Fecha');
    }
}
