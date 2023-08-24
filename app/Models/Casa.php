<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'tipo_oferta',
        'tipo_inmueble',
        'direccion',
        'ciudad',
        'estrato',
        'descripcion',
        'baños',
        'parqueaderos',
        'pisos'

    ];
}
