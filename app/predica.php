<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class predica extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'pastor', 'imagen','link','status'];

}
