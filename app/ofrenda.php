<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ofrenda extends Model
{
    protected $fillable = ['nombre', 'apellido', 'telefono', 'correo','cedula','ocupacion','ofrenda','direccion','tablanombre'];

}
