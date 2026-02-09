<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gobierno extends Model
{
    protected $table = 'gobierno';
    protected $primaryKey = 'idJunta';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}