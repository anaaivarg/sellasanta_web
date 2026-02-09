<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    protected $table = 'instrumentos';
    protected $primaryKey = 'idInstrumento';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}