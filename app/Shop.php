<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'comercio',
        'cliente',
        'correo',
        'telefono',
        'pais',
        'estado',
        'ciudad',
        'direccion',
        'social',
        'estado'
    ];
}
