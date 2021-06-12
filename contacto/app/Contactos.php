<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    protected $table = 'contactos';

    protected $fillable = [
        'nombre', 'telefono','direccion','foto',
    ];

    //para ocultar los campos created_at y updated_at
    protected $hidden =[
        'created_at' , 'updated_at'
    ];
}
