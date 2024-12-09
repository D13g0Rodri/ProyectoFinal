<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    // Indicar la clave primaria personalizada
    protected $primaryKey = 'id_proveedor';

    // Si la clave primaria no es un incremento automático, establece esto como false
    public $incrementing = true;

    // Especificar el tipo de clave primaria si no es un entero
    protected $keyType = 'int';

    // Definir los campos rellenables
    protected $fillable = [
        "id_proveedor",
        "nombre_proveedor",
        "direccion_proveedor",
        "telefono_proveedor",
        "correo_proveedor",
        "descripcion_proveedor"
    ];
}