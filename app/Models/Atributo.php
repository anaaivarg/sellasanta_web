<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atributo extends Model
{
    protected $table = 'atributo';
    protected $primaryKey = 'idAtributo';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}