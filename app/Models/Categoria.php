<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $primaryKey = 'id_categoria';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        "nombre_categoria",
        "descripcion_categoria"];
}
