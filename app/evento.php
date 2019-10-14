<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'imagen','tablanombre'];

}
